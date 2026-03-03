<!-- pagina Inicio en ruta / -->
<template>
  <section class="section">
    <div class="container">
      <div class="hero card soft glow" v-glow>
        <div class="badge">REGLADO ENERGY</div>
        <h1 class="h1">Optimizamos contratos de luz y gas, reducimos costes y te acompañamos en toda la gestión energética.</h1>
        <p class="p">
          Tomamos decisiones con criterio técnico y económico, explicando cada paso con transparencia y manteniendo el control del
          suministro con revisiones periódicas.
        </p>

        <div class="cta-row">
          <router-link to="/contacto" class="btn primary glow" v-glow>Solicitar análisis gratuito</router-link>
          <router-link to="/servicios" class="btn glow" v-glow>Ver servicios</router-link>
        </div>
      </div>
    </div>
  </section>

  <section class="section-tight">
    <div class="container">
      <h2 class="h2">A quién ayudamos</h2>
      <p class="p">
        Cada tipo de cliente tiene problemas energéticos distintos. Por eso adaptamos nuestros análisis, herramientas y recomendaciones
        a la realidad de cada consumo.
      </p>

      <div class="grid grid-3" style="margin-top:18px;">
        <ProfileCard
          to="/particulares"
          label="Particulares"
          name="Hogares"
          problem="Facturas elevadas, tarifas mal contratadas, falta de claridad."
          solution="Optimización y explicación sencilla y comprensible."
        />
        <ProfileCard
          to="/empresas"
          label="PYMES"
          name="Negocios"
          problem="Sobrecostes y falta de tiempo para revisar contratos."
          solution="Optimización de potencias, tarifas y condiciones sin afectar a la actividad."
        />
        <ProfileCard
          to="/empresas"
          label="Grandes empresas"
          name="Alto consumo"
          problem="Contratos complejos, alto consumo y riesgo económico."
          solution="Análisis técnico avanzado, comparativa objetiva y seguimiento continuo."
        />
      </div>

      <div class="grid grid-2" style="margin-top:18px;">
        <ProfileCard
          to="/sector-publico"
          label="Organismos públicos"
          name="Entornos regulados"
          problem="Rigidez contractual, cumplimiento normativo y control presupuestario."
          solution="Asesoramiento técnico y apoyo en licitación y revisión de suministros."
        />
        <ProfileCard
          to="/administradores-fincas"
          label="Administradores de fincas"
          name="Comunidades"
          problem="Múltiples suministros, incidencias y reclamaciones."
          solution="Gestión centralizada, optimización de contratos y soporte continuo para comunidades."
        />
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <h2 class="h2">Beneficios clave</h2>
      <p class="p">
        Buscamos ahorro sostenible y control real del suministro: decisiones explicadas, trazables y mantenidas en el tiempo.
      </p>

      <div class="grid grid-3" style="margin-top:18px;">
        <FeatureCard icon="💶" title="Ahorro económico"
          text="Optimización técnica de contratos, potencias y condiciones (no cambios indiscriminados de comercializadora)."
        />
        <FeatureCard icon="🔎" title="Transparencia"
          text="Impacto económico claro antes de ejecutar cambios, sin letra pequeña."
        />
        <FeatureCard icon="🌱" title="Energías renovables"
          text="Priorizamos soluciones sostenibles cuando son técnica y económicamente viables."
        />
        <FeatureCard icon="🎯" title="Seguimiento de objetivos"
          text="Revisiones periódicas para sostener ahorros y corregir desviaciones."
        />
        <FeatureCard icon="🤝" title="Acompañamiento continuo"
          text="Soporte durante toda la vida del contrato."
        />
        <FeatureCard icon="🛡️" title="Independencia"
          text="Actuamos como asesores, defendiendo los intereses del cliente frente al mercado."
        />
      </div>
    </div>
  </section>

  <section class="section-tight">
    <div class="container">
      <h2 class="h2">Metodología de trabajo</h2>
      <p class="p">
        Aplicamos una metodología estructurada que garantiza decisiones correctas hoy y revisiones periódicas en el futuro.
      </p>

      <div class="grid grid-3" style="margin-top:18px;">
        <FeatureCard icon="🧾" title="Análisis de facturas y consumo"
          text="Detección de ineficiencias, sobrecostes y riesgos contractuales."
        />
        <FeatureCard icon="⚙️" title="Optimización de potencias y tarifas"
          text="Adecuación a consumo real para evitar pagar de más o incurrir en penalizaciones."
        />
        <FeatureCard icon="📊" title="Comparativa objetiva de opciones"
          text="Evaluación sin conflicto de interés y con criterios técnico‑económicos."
        />
        <FeatureCard icon="✅" title="Contratación y seguimiento"
          text="Acompañamiento en la ejecución y verificación de la correcta aplicación en facturación."
        />
        <FeatureCard icon="🔁" title="Soporte y revisión periódica"
          text="Mantenimiento del control del suministro y adaptación a cambios del mercado."
        />
        <div class="card glow" v-glow>
          <div class="h2" style="margin-bottom:10px;">¿Quieres saber si estás pagando de más?</div>
          <p class="p">
            Realizamos un análisis gratuito de facturas. Déjanos tus datos o sube tu factura en PDF y te llamamos con los resultados.
          </p>
          <router-link to="/contacto" class="btn primary glow" v-glow>Empezar ahora</router-link>
        </div>
      </div>
    </div>
  </section>

  <section class="section-tight">
    <div class="container">
      <div class="card soft glow" v-glow>
        <h2 class="h2">Quiénes somos</h2>
        <p class="p">
          Reglado Energy es una consultoría energética independiente especializada en la optimización y gestión de contratos de luz y gas
          para particulares, empresas y sector público.
        </p>
        <router-link to="/sobre-nosotros" class="btn glow" v-glow>Conocer más</router-link>
      </div>
    </div>
  </section>
</template>

<script setup>
import { onMounted } from "vue";
import { setSeo } from "../seo.js";
import FeatureCard from "../components/FeatureCard.vue";
import ProfileCard from "../components/ProfileCard.vue";

onMounted(() => {
  setSeo({
    title: "Reglado Energy | Consultoría energética independiente",
    description: "Optimizamos contratos de luz y gas con criterio técnico y económico. Análisis gratuito de facturas y seguimiento periódico.",
    canonical: "/#/"
  });
});
</script>

<style scoped>
.hero{ padding: 34px; }
.badge{
  display:inline-flex; align-items:center; border-radius:999px; padding:10px 14px;
  border:1px solid rgba(242,197,61,.26); background: rgba(242,197,61,.08); width: fit-content;
  margin-bottom: 10px;
}
.cta-row{ display:flex; gap:12px; flex-wrap:wrap; margin-top: 16px; }
</style>
