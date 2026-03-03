<!-- componente de CTA flotante en toda la web (App principal) -->
<template>
  <div class="sticky">
    <div class="container inner glow" v-glow>
      <div class="left">
        <div class="dot"></div>
        <div>
          <div class="t">¿Quieres saber si estás pagando de más?</div>
          <div class="s">Análisis gratuito de facturas · Respuesta rápida</div>
        </div>
      </div>
      <div class="right">
        <router-link to="/contacto" class="btn primary glow" v-glow>Solicitar análisis</router-link>
        <a class="btn glow whatsapp" v-glow href="https://wa.me/34600000000" target="_blank" rel="noopener">WhatsApp</a>
      </div>
    </div>
  </div>
</template>

<style scoped>
.sticky{ position: fixed; left:0; right:0; bottom: 14px; z-index: 60; pointer-events: none; }
/* increased borders and layout */
.inner{ pointer-events: all; display:flex; align-items:center; justify-content:space-between; gap: 12px;
  position: relative; /* for pseudo-elements */
  background: rgba(11,13,16,.78);
  border: 4px solid rgba(242,197,61,.5);  /* increased opacity for more visibility */
  backdrop-filter: blur(12px);
  border-radius: 20px;
  padding: 12px 12px;
  box-shadow: 0 18px 60px rgba(0,0,0,.55), inset 0 0 0 2px #fff; /* inset white border visible inside */
}

.inner::before{
  display: none;
}

/* moving golden rays effect */
.inner::after{
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(45deg, transparent 25%, rgba(242,197,61,.15) 25%, rgba(242,197,61,.15) 50%, transparent 50%, transparent 75%, rgba(242,197,61,.15) 75%, rgba(242,197,61,.15));
  background-size: 60px 60px;
  animation: moveRays 5s linear infinite;
  border-radius: inherit;
  pointer-events: none;
}

@keyframes moveRays{
  from{background-position:0 0;}
  to{background-position:60px 60px;}
}
.left{ display:flex; align-items:center; gap: 12px; }
.dot{ width: 10px; height: 10px; border-radius: 999px; background: var(--gold); box-shadow: 0 0 0 6px rgba(242,197,61,.12); }
.t{ font-weight: 800; }
.s{ color: rgba(233,238,246,.72); font-size: 13px; }
.right{ display:flex; gap: 10px; }
/* special style for whatsapp button */
.whatsapp{
  background: rgba(37, 211, 102, 0.85); /* whatsapp green with transparency */
  color: #fff;
  border-color: rgba(37, 211, 102, 0.85);
}
.whatsapp:hover{
  background: rgba(37, 211, 102, 0.85) !important;
  color: #fff !important;
  border-color: rgba(37, 211, 102, 0.85) !important;
}
@media (max-width: 980px){ .inner{ flex-direction: column; align-items: stretch; } .right .btn{ width: 100%; } }
@media (max-width: 980px){ .inner{ flex-direction: column; align-items: stretch; } .right .btn{ width: 100%; } }
</style>
