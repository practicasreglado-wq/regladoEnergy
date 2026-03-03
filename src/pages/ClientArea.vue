<!-- pagina Area de clientes en ruta /area-clientes -->
<template>
  <section class="section">
    <div class="container">
      <div class="grid grid-2">
        <div class="card soft glow" v-glow>
          <div class="badge" v-reveal>Área de clientes</div>
          <h1 class="h1" v-reveal="{delay:80}">Zona privada (demo) para facturas, consumo y solicitudes.</h1>
          <p class="p" v-reveal="{delay:140}">
            En producción podrás visualizar consumo, histórico de facturas y gestionar solicitudes
            (cambio de potencia, titularidad, incidencias), con trazabilidad.
          </p>
          <div class="box" v-reveal="{delay:190}">
            <div class="t">Roadmap típico</div>
            <ul class="bullets">
              <li>Backend + base de datos</li>
              <li>Carga segura de PDFs</li>
              <li>Panel de consumo</li>
              <li>Notificaciones + CRM</li>
            </ul>
          </div>
        </div>

        <div class="card glow" v-glow v-reveal>
          <div class="h2">Acceso (simulación)</div>
          <form class="form" @submit.prevent="login">
            <div class="field">
              <label>Email *</label>
              <input v-model="email" required type="email" placeholder="cliente@empresa.com" />
            </div>
            <div class="field">
              <label>Contraseña *</label>
              <input v-model="pass" required type="password" placeholder="••••••••" />
            </div>
            <button class="btn primary glow" v-glow type="submit">Entrar (demo)</button>
          </form>

          <div v-if="ok" class="sent" v-reveal>
            <strong>Acceso correcto (demo).</strong> Pantalla solo de maquetación.
          </div>

          <div class="hr"></div>

          <div class="h2" style="margin-bottom:10px;">Qué incluirá</div>
          <ul class="bullets">
            <li>Histórico de facturas y documentos.</li>
            <li>Panel de consumo por periodos.</li>
            <li>Solicitudes y seguimiento.</li>
            <li>Objetivos y alertas.</li>
          </ul>

          <router-link to="/contacto" class="btn glow" v-glow style="margin-top:12px;">Quiero activarlo</router-link>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { onMounted } from "vue";
import { setSeo } from "../seo.js";
import { ref } from "vue";
const email = ref("");
const pass = ref("");
const ok = ref(false);
function login(){
  ok.value = true;
  setTimeout(()=> (ok.value = false), 4200);
  email.value = ""; pass.value = "";
}

onMounted(() => {
  setSeo({
    title: "Área de clientes | Reglado Energy",
    description: "Zona privada (demo) para facturas, consumo y solicitudes con trazabilidad. Preparada para integración con backend/CRM.",
    canonical: "/#/area-clientes"
  });
});
</script>

<style scoped>
.badge{ display:inline-flex; align-items:center; border-radius:999px; padding:10px 14px; border:1px solid rgba(242,197,61,.26); background: rgba(242,197,61,.08); width: fit-content; }
.form{ display:grid; gap: 12px; margin-top: 12px; }
.field{ display:grid; gap: 7px; }
label{ font-weight: 800; font-size: 14px; color: rgba(233,238,246,.92); }
input{
  padding: 12px 12px;
  border-radius: var(--radius-sm);
  border: 1px solid rgba(255,255,255,.14);
  background: rgba(8,10,13,.65);
  color: var(--text);
  outline: none;
}
input:focus{ border-color: rgba(242,197,61,.35); box-shadow: 0 0 0 4px rgba(242,197,61,.10); }
.hr{ height:1px; background: linear-gradient(90deg, transparent, var(--line), transparent); margin: 18px 0; }
.bullets{ margin:0; padding-left:18px; color: var(--muted); line-height:1.9; }
.box{ margin-top:14px; padding:14px; border-radius: var(--radius-md); border:1px solid rgba(255,255,255,.12); background: rgba(255,255,255,.03); }
.t{ font-weight: 900; margin-bottom: 6px; }
.sent{ margin-top: 14px; padding: 14px; border-radius: var(--radius-md); border:1px solid rgba(242,197,61,.32); background: rgba(242,197,61,.08); }
</style>
