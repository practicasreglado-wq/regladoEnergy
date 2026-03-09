<?php

declare(strict_types=1);

// Genera y descarga un ZIP con CSV de solicitudes seleccionadas y sus PDFs asociados (si existen).
require_once __DIR__ . '/db.php';

applyCors();

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    respondJson(405, ['ok' => false, 'message' => 'Metodo no permitido.']);
}

$rawInput = file_get_contents('php://input');
$payload = json_decode($rawInput ?: '', true);

$ids = [];
if (is_array($payload) && isset($payload['ids']) && is_array($payload['ids'])) {
    foreach ($payload['ids'] as $id) {
        $intId = (int) $id;
        if ($intId > 0) {
            $ids[] = $intId;
        }
    }
}

$ids = array_values(array_unique($ids));

if (count($ids) === 0) {
    respondJson(422, ['ok' => false, 'message' => 'Selecciona al menos una solicitud.']);
}

if (count($ids) > 200) {
    respondJson(422, ['ok' => false, 'message' => 'Has seleccionado demasiadas solicitudes.']);
}

if (!class_exists('ZipArchive')) {
    respondJson(500, ['ok' => false, 'message' => 'ZipArchive no esta disponible en PHP.']);
}

try {
    $pdo = getPdo();
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $statement = $pdo->prepare(
        'SELECT
            id,
            nombre,
            telefono,
            email,
            mensaje,
            pdf_nombre_original,
            pdf_ruta,
            creado_en
        FROM facturas
        WHERE id IN (' . $placeholders . ')
        ORDER BY creado_en DESC, id DESC'
    );
    $statement->execute($ids);
    $rows = $statement->fetchAll();
} catch (Throwable $exception) {
    respondJson(500, ['ok' => false, 'message' => 'No se pudieron cargar las solicitudes seleccionadas.']);
}

if (count($rows) === 0) {
    respondJson(404, ['ok' => false, 'message' => 'No se encontraron solicitudes para descargar.']);
}

$tmpZipPath = tempnam(sys_get_temp_dir(), 'reglado_admin_');
if ($tmpZipPath === false) {
    respondJson(500, ['ok' => false, 'message' => 'No se pudo crear el archivo temporal del ZIP.']);
}

$zip = new ZipArchive();
if ($zip->open($tmpZipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
    @unlink($tmpZipPath);
    respondJson(500, ['ok' => false, 'message' => 'No se pudo crear el ZIP.']);
}

$csvHandle = fopen('php://temp', 'r+');
if ($csvHandle === false) {
    $zip->close();
    @unlink($tmpZipPath);
    respondJson(500, ['ok' => false, 'message' => 'No se pudo generar el CSV.']);
}

fputcsv($csvHandle, ['id', 'fecha', 'nombre', 'telefono', 'email', 'mensaje', 'pdf_ruta'], ';');

$uploadsRoot = realpath(__DIR__ . DIRECTORY_SEPARATOR . 'uploads');
$pdfAdded = 0;

foreach ($rows as $row) {
    fputcsv($csvHandle, [
        (string) $row['id'],
        (string) $row['creado_en'],
        (string) $row['nombre'],
        (string) $row['telefono'],
        (string) $row['email'],
        (string) ($row['mensaje'] ?? ''),
        (string) ($row['pdf_ruta'] ?? ''),
    ], ';');

    $pdfRelativePath = (string) ($row['pdf_ruta'] ?? '');
    if ($pdfRelativePath === '' || $uploadsRoot === false) {
        continue;
    }

    $absolutePdfPath = realpath(__DIR__ . DIRECTORY_SEPARATOR . $pdfRelativePath);
    if ($absolutePdfPath === false || !str_starts_with($absolutePdfPath, $uploadsRoot) || !is_file($absolutePdfPath)) {
        continue;
    }

    $originalName = (string) ($row['pdf_nombre_original'] ?? '');
    $safeOriginal = sanitizeFileName($originalName !== '' ? $originalName : basename($absolutePdfPath));
    $zipName = sprintf('pdfs/%d_%s', (int) $row['id'], $safeOriginal);
    $zip->addFile($absolutePdfPath, $zipName);
    $pdfAdded++;
}

rewind($csvHandle);
$csvContent = stream_get_contents($csvHandle);
fclose($csvHandle);

if (!is_string($csvContent)) {
    $zip->close();
    @unlink($tmpZipPath);
    respondJson(500, ['ok' => false, 'message' => 'No se pudo leer el CSV generado.']);
}

$summary = sprintf("Solicitudes: %d\nPDFs incluidos: %d\nGenerado: %s\n", count($rows), $pdfAdded, date('Y-m-d H:i:s'));
$zip->addFromString('resumen.txt', $summary);
$zip->addFromString('solicitudes.csv', $csvContent);
$zip->close();

$downloadName = 'solicitudes_' . date('Ymd_His') . '.zip';
$zipSize = filesize($tmpZipPath);

if ($zipSize === false) {
    @unlink($tmpZipPath);
    respondJson(500, ['ok' => false, 'message' => 'No se pudo leer el tamaño del ZIP.']);
}

header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="' . $downloadName . '"');
header('Content-Length: ' . (string) $zipSize);
readfile($tmpZipPath);
@unlink($tmpZipPath);
exit;

function applyCors(): void
{
    $origin = $_SERVER['HTTP_ORIGIN'] ?? null;
    if (is_string($origin) && isAllowedOrigin($origin)) {
        header('Access-Control-Allow-Origin: ' . $origin);
    }

    header('Vary: Origin');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Access-Control-Expose-Headers: Content-Disposition');
}

function isAllowedOrigin(string $origin): bool
{
    $parts = parse_url($origin);
    if (!is_array($parts)) {
        return false;
    }

    $scheme = strtolower((string) ($parts['scheme'] ?? ''));
    $host = strtolower((string) ($parts['host'] ?? ''));

    if (!in_array($scheme, ['http', 'https'], true)) {
        return false;
    }

    return in_array($host, ['localhost', '127.0.0.1', '::1'], true);
}

function respondJson(int $status, array $payload): void
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($payload, JSON_UNESCAPED_UNICODE);
    exit;
}

function sanitizeFileName(string $value): string
{
    $sanitized = preg_replace('/[^A-Za-z0-9._-]/', '_', $value);
    $sanitized = is_string($sanitized) ? trim($sanitized, '._') : '';

    if ($sanitized === '') {
        return 'factura.pdf';
    }

    return $sanitized;
}
