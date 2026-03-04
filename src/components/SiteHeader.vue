<!-- componente de Cabecera global en toda la web (App principal) -->
<template>
  <header class="header">
    <div class="container header-inner">
      <router-link class="brand" to="/">
        <img class="logo" :src="logo" alt="Reglado Energy" />
        <div class="brand-text">
          <div class="brand-name">REGLADO ENERGY</div>
          <div class="brand-sub">Consultoría energética independiente</div>
        </div>
      </router-link>

      <nav class="nav">
        <router-link to="/servicios" class="nav-link">Servicios</router-link>
        <router-link to="/clientes" class="nav-link">Clientes</router-link>
        <router-link to="/recursos" class="nav-link">Recursos</router-link>
        <router-link to="/sobre-nosotros" class="nav-link">Sobre nosotros</router-link>
        <router-link to="/contacto" class="btn primary glow" v-glow>Análisis gratuito</router-link>
      </nav>

      <button class="burger" @click="open = !open" aria-label="Abrir menú">
        <span></span><span></span><span></span>
      </button>
    </div>

    <div v-if="open" class="mobile">
      <div class="container mobile-inner">
        <router-link @click="open=false" to="/servicios" class="m-link">Servicios</router-link>
        <router-link @click="open=false" to="/clientes" class="m-link">Clientes</router-link>
        <router-link @click="open=false" to="/particulares" class="m-link">Particulares</router-link>
        <router-link @click="open=false" to="/empresas" class="m-link">Empresas</router-link>
        <router-link @click="open=false" to="/sector-publico" class="m-link">Sector público</router-link>
        <router-link @click="open=false" to="/administradores-fincas" class="m-link">Administradores de fincas</router-link>
        <router-link @click="open=false" to="/recursos" class="m-link">Recursos</router-link>
        <router-link @click="open=false" to="/sobre-nosotros" class="m-link">Sobre nosotros</router-link>
        <router-link @click="open=false" to="/area-clientes" class="m-link">Área de clientes</router-link>
        <router-link @click="open=false" to="/contacto" class="btn primary glow" v-glow style="width:100%">Análisis gratuito</router-link>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref } from "vue";
import logo from "../assets/reglado-energy-logo.svg";
const open = ref(false);
</script>

<style scoped>
.header{ position: sticky; top:0; z-index: 50; backdrop-filter: blur(12px); background: rgba(11,13,16,.65); border-bottom: 1px solid rgba(255,255,255,.08); }
.header-inner{ display:flex; align-items:center; justify-content:space-between; padding: 14px 0; gap: 14px; }
.brand{ display:flex; align-items:center; gap: 12px; }
.logo{ width: 44px; height: 44px; object-fit: contain; }
.brand-name{ font-weight: 800; letter-spacing: .8px; }
.brand-sub{ font-size: 12px; color: rgba(233,238,246,.70); }
.nav{ display:flex; align-items:center; gap: 14px; }
.nav-link{ color: rgba(233,238,246,.82); font-size: 14px; padding: 10px 10px; border-radius: 12px; border: 1px solid transparent; }
.nav-link:hover{ border-color: rgba(242,197,61,.25); background: rgba(255,255,255,.03); }
.burger{ display:none; background: transparent; border:none; cursor:pointer; width: 44px; height: 44px; border-radius: 14px; border: 1px solid rgba(255,255,255,.10); }
.burger span{ display:block; height:2px; margin:6px 10px; background: rgba(233,238,246,.85); }
.mobile{ border-top: 1px solid rgba(255,255,255,.08); background: rgba(11,13,16,.85); }
.mobile-inner{ padding: 14px 0 18px; display:flex; flex-direction:column; gap: 10px; }
.m-link{ padding: 12px 12px; border-radius: 14px; border: 1px solid rgba(255,255,255,.10); background: rgba(255,255,255,.03); }
@media (max-width: 980px){ .nav{ display:none; } .burger{ display:block; } }
</style>
