<!-- pagina Sector publico en ruta /sector-publico -->
<template>
  <section class="section">
    <div class="container">
      <div class="grid grid-2">
        <div class="card soft glow" v-glow>
          <div class="badge">Sector público</div>
          <h1 class="h1">Gestión energética para administraciones en entornos regulados.</h1>
          <p class="p">
            Servicio orientado a la correcta gestión energética de las administraciones, combinando criterios técnicos, económicos y de cumplimiento normativo.
          </p>

          <div class="cta-row">
            <router-link to="/contacto" class="btn primary glow" v-glow>Solicitar propuesta</router-link>
            <router-link to="/servicios" class="btn glow" v-glow>Ver servicios</router-link>
          </div>
        </div>

        <div class="card glow" v-glow>
          <h2 class="h2">Qué hacemos</h2>
          <ul class="bullets">
            <li><strong>Análisis técnico de contratos:</strong> potencias, precios, penalizaciones y condiciones contractuales.</li>
            <li><strong>Apoyo en licitación:</strong> comparativas objetivas y criterios de decisión técnico‑económicos.</li>
            <li><strong>Revisión económica y técnica:</strong> supervisión de la correcta aplicación de condiciones adjudicadas.</li>
            <li><strong>Seguimiento y revisiones periódicas:</strong> evitar desviaciones presupuestarias y mejorar eficiencia.</li>
          </ul>

          <div class="hr"></div>

          <h2 class="h2">Qué necesitas para iniciar</h2>
          <ul class="bullets">
            <li>Pliegos / contrato vigente o documentación del suministro.</li>
            <li>Facturas recientes y datos de consumo (si están disponibles).</li>
            <li>Objetivos: ahorro, estabilidad presupuestaria, cumplimiento, eficiencia.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { onMounted } from "vue";
import { setSeo } from "../seo.js";

onMounted(() => {
  setSeo({
    title: "Sector público | Gestión energética y licitación | Reglado Energy",
    description: "Gestión energética para administraciones: análisis de contratos, apoyo en licitación, verificación de condiciones y control presupuestario.",
    canonical: "/#/sector-publico"
  });
});
</script>

<style scoped>
.badge{
  display:inline-flex; align-items:center; border-radius:999px; padding:10px 14px;
  border:1px solid rgba(242,197,61,.26); background: rgba(242,197,61,.08); width: fit-content;
  margin-bottom: 10px;
}
.bullets{ margin:0; padding-left:18px; color: var(--muted); line-height:1.9; }
.hr{ height:1px; background: linear-gradient(90deg, transparent, var(--line), transparent); margin: 18px 0; }
.cta-row{ display:flex; gap:12px; flex-wrap:wrap; margin-top: 14px; }
</style>
