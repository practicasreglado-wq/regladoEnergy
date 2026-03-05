<!-- componente de Footer global en toda la web (App principal) -->
<template>
  <footer class="footer">
    <div class="container footer-inner">
      <div class="col">
        <div class="title">REGLADO ENERGY</div>
        <p class="small">Optimizamos contratos de luz y gas, reducimos costes y te acompañamos en toda la gestión energética.</p>
      </div>
      <div class="col">
        <div class="title">Navegación</div>
        <div class="links">
          <router-link to="/servicios">Servicios</router-link>
          <router-link to="/clientes">Clientes</router-link>
          <router-link to="/recursos">Recursos</router-link>
          <router-link to="/sobre-nosotros">Sobre nosotros</router-link>
          <router-link to="/contacto">Contacto</router-link>
        </div>
      </div>
      <div class="col">
        <div class="title">Contacto</div>
        <div class="small">
          <div><strong>Tel:</strong> +34 XXX XXX XXX</div>
          <div><strong>Email:</strong> contacto@regladoenergy.com</div>
          <div><strong>LinkedIn:</strong> /company/reglado-energy</div>
        </div>
      </div>
    </div>
    <div class="container bottom">
      <div class="small">© {{ year }} Reglado Energy. Todos los derechos reservados.</div>
      <div class="small">Transparencia · Rigor técnico · Acompañamiento</div>
    </div>
  </footer>
</template>

<script setup>
const year = new Date().getFullYear();
</script>

<style scoped>
.footer{
  position: relative;
  z-index: 2;
  border-top: 1px solid rgba(255,255,255,.08);
  background: #2b2716;
  padding: 40px 0 140px;
}
.footer-inner{ display:grid; grid-template-columns: 1.4fr 1fr 1fr; gap: 18px; align-items: start; }
.title{ font-weight: 800; margin-bottom: 10px; letter-spacing: .6px; display: inline-block; padding: 8px 12px; border: 1px solid rgba(242,197,61,.6); border-radius: 6px; background: rgba(242,197,61,.08); }
.links{ display:flex; flex-direction:column; gap: 10px; }
.links a{ color: rgba(233,238,246,.78); }
.links a:hover{ color: #fff; }
.bottom{ margin-top: 22px; padding-top: 18px; border-top: 1px solid rgba(255,255,255,.08); display:flex; justify-content:space-between; gap: 12px; flex-wrap: wrap; }
@media (max-width: 980px){ .footer-inner{ grid-template-columns: 1fr; } }
</style>
