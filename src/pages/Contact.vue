<!-- pagina Contacto en ruta /contacto -->
<template>
  <section class="section">
    <div class="container">
      <div class="grid grid-2">
        <div class="card soft glow" v-glow>
          <div class="badge">Contacto</div>
          <h1 class="h1">Realizamos un análisis gratuito de facturas.</h1>
          <p class="p">
            Completa el formulario o sube tu factura en PDF y te llamamos con los resultados.
          </p>

          <div class="card" style="margin-top:14px;">
            <h2 class="h2" style="margin-bottom:10px;">Estudios personalizados</h2>
            <p class="p">
              Cada cliente tiene un consumo distinto. Realizamos estudios personalizados en función del perfil y las necesidades reales.
            </p>

            <h2 class="h2" style="margin:14px 0 10px;">Subida de facturas</h2>
            <p class="p">
              Sube tu factura en PDF. Realizaremos un análisis previo y te contactaremos para comentarte los resultados y las opciones de mejora.
            </p>
          </div>
        </div>

        <div class="card glow" v-glow>
          <h2 class="h2">Formulario (demo)</h2>
          <p class="p">En esta demo el envío es simulado. En producción se conecta a tu backend/CRM o servicio de formularios.</p>

          <form class="form" @submit.prevent="submit">
            <div class="grid grid-2">
              <div class="field">
                <label>Nombre *</label>
                <input v-model="f.name" required placeholder="Tu nombre" />
              </div>
              <div class="field">
                <label>Teléfono *</label>
                <input v-model="f.phone" required placeholder="+34 ..." />
              </div>
            </div>

            <div class="field">
              <label>Email *</label>
              <input v-model="f.email" required type="email" placeholder="tu@email.com" />
            </div>

            <div class="field">
              <label>Mensaje (opcional)</label>
              <textarea v-model="f.msg" placeholder="Cuéntanos tu caso (tarifa, potencia, incidencias, etc.)"></textarea>
            </div>

            <div class="field">
              <label>Factura PDF (opcional en demo)</label>
              <input type="file" accept="application/pdf" @change="onFile" class="file"/>
            </div>

            <button class="btn primary glow" v-glow type="submit">Enviar solicitud</button>
          </form>

          <div v-if="sent" class="sent">
            <strong>Solicitud recibida (demo).</strong> Te contactaremos lo antes posible.
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { onMounted } from "vue";
import { setSeo } from "../seo.js";
import { reactive, ref } from "vue";
const f = reactive({ name:"", phone:"", email:"", msg:"", file:null });
const sent = ref(false);

function onFile(e){ f.file = e.target.files?.[0] || null; }
function submit(){
  sent.value = true;
  setTimeout(()=> (sent.value = false), 4200);
  f.name=""; f.phone=""; f.email=""; f.msg=""; f.file=null;
}

onMounted(() => {
  setSeo({
    title: "Contacto | Análisis gratuito de facturas | Reglado Energy",
    description: "Solicita un análisis gratuito de facturas. Completa el formulario o sube tu PDF y te llamamos con resultados y opciones de mejora.",
    canonical: "/#/contacto"
  });
});
</script>

<style scoped>
.badge{
  display:inline-flex; align-items:center; border-radius:999px; padding:10px 14px;
  border:1px solid rgba(242,197,61,.26); background: rgba(242,197,61,.08); width: fit-content;
  margin-bottom: 10px;
}
.form{ display:grid; gap: 12px; margin-top: 12px; }
.field{ display:grid; gap: 7px; }
label{ font-weight: 800; font-size: 14px; color: rgba(233,238,246,.92); }
input, textarea{
  padding: 12px 12px;
  border-radius: var(--radius-sm);
  border: 1px solid rgba(255,255,255,.14);
  background: rgba(8,10,13,.65);
  color: var(--text);
  outline: none;
}
textarea{ min-height: 110px; resize: vertical; }
input:focus, textarea:focus{ border-color: rgba(242,197,61,.35); box-shadow: 0 0 0 4px rgba(242,197,61,.10); }
.sent{ margin-top: 14px; padding: 14px; border-radius: var(--radius-md); border:1px solid rgba(242,197,61,.32); background: rgba(242,197,61,.08); }

.file::file-selector-button{
  display: none;
}
.file:hover{
  cursor: pointer;
}
</style>
