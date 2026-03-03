<!-- pagina Empresas en ruta /empresas -->
<template>
  <section class="section">
    <div class="container">
      <div class="grid grid-2">
        <div class="card soft glow" v-glow>
          <div class="badge">Empresas y PYMES</div>
          <h1 class="h1">Reducción de costes, mejora contractual y control continuo del suministro.</h1>
          <p class="p">
            Analizamos contratos, facturas y consumo para detectar ineficiencias y riesgos que suelen pasar desapercibidos.
          </p>

          <h2 class="h2" style="margin-top:14px;">Enfoque</h2>
          <p class="p">
            No nos limitamos a recomendar un cambio de tarifa o comercializadora. Entendemos cómo consumes, cómo estás contratado y qué impacto real
            tiene cada decisión en el corto, medio y largo plazo.
          </p>

          <div class="cta-row">
            <router-link to="/contacto" class="btn primary glow" v-glow>Pedir diagnóstico</router-link>
            <router-link to="/servicios" class="btn glow" v-glow>Ver servicios</router-link>
          </div>
        </div>

        <div class="card glow" v-glow>
          <h2 class="h2">Qué hacemos</h2>
          <div class="grid grid-2" style="margin-top:12px;">
            <FeatureCard icon="🧾" title="Auditoría de facturas"
              text="Detección de sobrecostes, errores y riesgos contractuales."
            />
            <FeatureCard icon="⚙️" title="Optimización de potencia"
              text="Ajuste por periodos para evitar capacidad ociosa o penalizaciones."
            />
            <FeatureCard icon="📈" title="Control y seguimiento"
              text="Revisión periódica para mantener el ahorro y anticipar desviaciones."
            />
            <FeatureCard icon="🧠" title="Decisiones justificadas"
              text="Medidas priorizadas con impacto económico estimado."
            />
          </div>

          <div class="hr"></div>

          <h2 class="h2">Metodología</h2>
          <ol class="bullets">
            <li>Facturas, contrato, datos de consumo y objetivos.</li>
            <li>Identificación de costes, riesgos, penalizaciones y oportunidades de optimización.</li>
            <li>Medidas priorizadas con impacto económico estimado.</li>
            <li>Gestión de cambios y comprobación de facturación.</li>
            <li>Seguimiento para mantener objetivos y adaptarse al mercado.</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { onMounted } from "vue";
import { setSeo } from "../seo.js";
import FeatureCard from "../components/FeatureCard.vue";

onMounted(() => {
  setSeo({
    title: "Empresas y PYMES | Reducción de costes energéticos | Reglado Energy",
    description: "Auditoría de facturas, optimización contractual y seguimiento continuo del suministro para reducir costes sin afectar a la actividad.",
    canonical: "/#/empresas"
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
