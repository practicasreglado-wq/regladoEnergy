<!-- pagina Clientes en ruta /clientes -->
<template>
  <section class="section">
    <div class="container">
      <div class="card soft glow" v-glow>
        <div class="badge">Clientes</div>
        <h1 class="h1">Cada cliente tiene un consumo distinto.</h1>
        <p class="p">
          Realizamos estudios adaptados a tu perfil y necesidades reales para reducir costes, mejorar la contratación y mantener el control del suministro.
        </p>
        <div class="cta-row">
          <router-link to="/contacto" class="btn primary glow" v-glow>Solicitar análisis gratuito</router-link>
          <router-link to="/servicios" class="btn glow" v-glow>Ver servicios</router-link>
        </div>
      </div>

      <div class="section-tight">
        <div class="grid grid-3">
          <ProfileCard
            to="/particulares"
            label="Particulares"
            name="Hogares"
            problem="Facturas elevadas, tarifas mal contratadas y falta de claridad."
            solution="Analizamos tu factura, optimizamos tu tarifa y te explicamos con claridad qué estás pagando y cómo reducirlo."
          />
          <ProfileCard
            to="/empresas"
            label="PYMES"
            name="Negocios"
            problem="Sobrecostes, falta de control y poco tiempo para revisar contratos."
            solution="Optimizamos potencias, tarifas y condiciones contractuales para reducir costes sin afectar a la actividad."
          />
          <ProfileCard
            to="/empresas"
            label="Grandes empresas"
            name="Alto consumo"
            problem="Contratos complejos, alto consumo y riesgo económico."
            solution="Análisis técnico avanzado, comparativa entre comercializadoras y seguimiento continuo del contrato."
          />
        </div>

        <div class="grid grid-2" style="margin-top:18px;">
          <ProfileCard
            to="/administradores-fincas"
            label="Administradores de fincas"
            name="Comunidades"
            problem="Múltiples suministros, reclamaciones y falta de control."
            solution="Gestión energética centralizada, optimización de contratos y soporte continuo para comunidades."
          />
          <ProfileCard
            to="/sector-publico"
            label="Organismos públicos"
            name="Entornos regulados"
            problem="Rigidez contractual, cumplimiento normativo y control presupuestario."
            solution="Asesoramiento técnico en contratos energéticos y apoyo en licitación y revisión de suministros."
          />
        </div>
      </div>

      <div class="section-tight">
        <div class="card glow" v-glow>
          <h2 class="h2">¿No encajas en una categoría?</h2>
          <p class="p p_centrado">
            Con una factura y tu objetivo (ahorro, estabilidad o control) te diremos el plan de acción.
          </p>
          <div class="clients-cta-center">
            <router-link to="/contacto" class="btn primary glow" v-glow>Cuéntanos tu caso</router-link>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { onMounted } from "vue";
import { setSeo } from "../seo.js";
import ProfileCard from "../components/ProfileCard.vue";

onMounted(() => {
  setSeo({
    title: "Clientes | Soluciones por perfil de consumo | Reglado Energy",
    description: "Soluciones energéticas para particulares, PYMES, grandes empresas, administradores de fincas y sector público.",
    canonical: "/#/clientes"
  });
});
</script>

<style scoped>
.badge{
  display:inline-flex; align-items:center; border-radius:999px; padding:10px 14px;
  border:1px solid rgba(242,197,61,.26); background: rgba(242,197,61,.08); width: fit-content;
  margin-bottom: 10px;
}
.cta-row{ display:flex; gap:12px; flex-wrap:wrap; margin-top: 14px; }
.clients-cta-center{ display:flex; justify-content:center; margin-top: 14px; }
.p_centrado{ text-align: center; }
</style>
