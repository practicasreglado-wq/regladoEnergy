<?php

declare(strict_types=1);

// Devuelve en JSON el listado de solicitudes guardadas, ordenadas por fecha para el panel de admin.
require_once __DIR__ . '/db.php';

applyCors();

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'GET') {
    respondJson(405, ['ok' => false, 'message' => 'Metodo no permitido.']);
}

try {
    $pdo = getPdo();
    $statement = $pdo->query(
        'SELECT
            id,
            nombre,
            telefono,
            email,
            mensaje,
            pdf_nombre_original,
            pdf_ruta,
            pdf_mime,
            pdf_tamano_bytes,
            creado_en
        FROM facturas
        ORDER BY creado_en DESC, id DESC'
    );

    $rows = $statement->fetchAll();

    foreach ($rows as &$row) {
        $row['has_pdf'] = $row['pdf_ruta'] !== null && $row['pdf_ruta'] !== '';
    }
    unset($row);

    respondJson(200, ['ok' => true, 'items' => $rows]);
} catch (Throwable $exception) {
    respondJson(500, ['ok' => false, 'message' => 'No se pudieron cargar las solicitudes.']);
}

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
    header('Content-Type: application/json; charset=utf-8');
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
    echo json_encode($payload, JSON_UNESCAPED_UNICODE);
    exit;
}
