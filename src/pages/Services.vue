<!-- pagina Servicios en ruta /servicios -->
<template>
  <section class="section">
    <div class="container">
      <div class="grid grid-2">
        <div class="card soft glow" v-glow>
          <div class="badge">Servicios</div>
          <h1 class="h1">Analizamos, optimizamos y gestionamos tus suministros energéticos con criterios técnicos y económicos.</h1>
          <p class="p">
            No vendemos tarifas: proponemos decisiones justificadas y verificamos su aplicación con seguimiento periódico.
          </p>
          <div class="cta-row">
            <router-link to="/contacto" class="btn primary glow" v-glow>Solicitar análisis gratuito</router-link>
            <router-link to="/clientes" class="btn glow" v-glow>Ver perfiles</router-link>
          </div>
        </div>

        <div class="card glow" v-glow>
          <div class="h2">Consultoría energética</div>
          <p class="p">
            Servicio orientado a la reducción de costes, la mejora contractual y el control continuo del suministro, actuando desde un enfoque
            independiente y técnico.
          </p>
          <div class="grid grid-2" style="margin-top:12px;">
            <FeatureCard icon="src/assets/Auditorias.svg" title="Auditoría de facturas" text="Eléctricas y de gas, para detectar sobrecostes e ineficiencias." />
            <FeatureCard icon="src/assets/Continue.svg" title="Optimización de potencia" text="Adecuación al consumo real para evitar pagar de más o penalizaciones." />
            <FeatureCard icon="src/assets/Correction.svg" title="Reactiva y penalizaciones" text="Análisis y medidas correctoras cuando aplique." />
            <FeatureCard icon="src/assets/Analytic.svg" title="Control del consumo" text="Seguimiento para anticipar desviaciones y sostener el ahorro." />
            <FeatureCard icon="src/assets/Compare.svg" title="Comparativa objetiva" text="Alternativas sin conflicto de interés y con criterios técnico‑económicos." />
            <FeatureCard icon="src/assets/DoubleTick.svg" title="Acompañamiento" text="Ejecución y verificación de la correcta aplicación en facturación." />
          </div>
        </div>
      </div>

      <div class="section-tight">
        <div class="card soft glow" v-glow>
          <h2 class="h2">Cómo trabajamos</h2>
          <div class="grid grid-2" style="margin-top:10px;">
            <ul class="bullets">
              <li>Revisión integral de contrato, facturas y consumo.</li>
              <li>Medidas priorizadas por impacto económico y viabilidad técnica.</li>
              <li>Ejecución con control de calidad: verificación en facturación.</li>
              <li>Revisiones periódicas y seguimiento de objetivos.</li>
            </ul>
            <div>
              <p class="p">
                Si necesitas un enfoque de control continuo (empresa, cartera de suministros o sector público), definimos un plan de revisiones
                y alertas para evitar desviaciones.
              </p>
              <router-link to="/contacto" class="btn primary glow" v-glow>Hablar con un técnico</router-link>
            </div>
          </div>
        </div>
      </div>

      <div class="section-tight">
        <div class="card glow" v-glow>
          <h2 class="h2">Servicios para el sector público</h2>
          <p class="p">
            Acompañamos a las administraciones en la correcta gestión energética, combinando criterios técnicos, económicos y de cumplimiento normativo.
          </p>
          <div class="grid grid-2" style="margin-top:12px;">
            <FeatureCard icon="src/assets/Search.svg" title="Análisis técnico de contratos"
              text="Potencias, precios, penalizaciones y condiciones."
            />
            <FeatureCard icon="src/assets/Balance.svg" title="Apoyo técnico en licitación"
              text="Comparativas objetivas y criterios de decisión técnico‑económicos."
            />
            <FeatureCard icon="src/assets/Constan.svg" title="Revisión de suministros"
              text="Supervisión de la correcta aplicación de condiciones adjudicadas."
            />
            <FeatureCard icon="src/assets/Repeat.svg" title="Seguimiento presupuestario"
              text="Revisiones periódicas para evitar desviaciones y mejorar eficiencia."
            />
          </div>

          <div class="cta-row" style="margin-top:14px;">
            <router-link to="/sector-publico" class="btn glow" v-glow>Ver detalle</router-link>
            <router-link to="/contacto" class="btn primary glow" v-glow>Solicitar propuesta</router-link>
          </div>
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
    title: "Servicios de consultoría energética | Reglado Energy",
    description: "Auditoría de facturas, optimización de potencias y tarifas, comparativa objetiva y seguimiento. Luz y gas.",
    canonical: "/#/servicios"
  });

  // Schema.org Service
  const s = document.createElement("script");
  s.type = "application/ld+json";
  s.text = JSON.stringify({
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "Consultoría energética",
    "provider": { "@type": "Organization", "name": "Reglado Energy" },
    "serviceType": "Optimización y gestión de contratos de luz y gas",
    "areaServed": "ES"
  });
  document.head.appendChild(s);
});

</script>

<style scoped>
.badge{
  display:inline-flex; align-items:center; border-radius:999px; padding:10px 14px;
  border:1px solid rgba(242,197,61,.26); background: rgba(242,197,61,.08); width: fit-content;
  margin-bottom: 10px;
}
.bullets{ margin:0; padding-left:18px; color: var(--muted); line-height:1.9; }
.cta-row{ display:flex; gap:12px; flex-wrap:wrap; margin-top: 14px; }
</style>
