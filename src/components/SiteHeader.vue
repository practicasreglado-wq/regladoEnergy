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
        <router-link to="/" class="nav-link">Inicio</router-link>
        <router-link to="/servicios" class="nav-link">Servicios</router-link>
        <div class="nav-dropdown">
          <router-link to="/clientes" class="nav-link nav-drop-trigger" aria-haspopup="menu">
            Clientes
            <span class="caret" aria-hidden="true">▾</span>
          </router-link>
          <div class="dropdown-menu" role="menu" aria-label="Submenú clientes">
            <router-link to="/particulares" class="dropdown-link" role="menuitem">Particulares</router-link>
            <router-link to="/empresas" class="dropdown-link" role="menuitem">Empresas y Pymes</router-link>
            <router-link to="/administradores-fincas" class="dropdown-link" role="menuitem">Comunidades y Fincas</router-link>
            <router-link to="/sector-publico" class="dropdown-link" role="menuitem">Organismos públicos</router-link>
          </div>
        </div>
        <router-link to="/recursos" class="nav-link">Recursos</router-link>
        <router-link to="/sobre-nosotros" class="nav-link">Sobre nosotros</router-link>
        <!-- login button replaces free analysis link -->
        <button
          class="btn primary glow"
          v-glow
          @click="showLogin = true"
          aria-label="Iniciar sesión"
        >
          Iniciar sesión
        </button>
      </nav>

      <button class="burger" @click="toggleMobileMenu" aria-label="Abrir menú">
        <span></span><span></span><span></span>
      </button>
    </div>

    <!-- Menú mobile -->
    <LoginModal v-model="showLogin" />
    <div v-if="open" class="mobile">
      <div class="container mobile-inner">
        <router-link @click="closeMobileMenu" to="/servicios" class="m-link">Servicios</router-link>

        <div class="m-group">
          <router-link @click="closeMobileMenu" to="/clientes" class="m-link m-link-caret">
            Clientes
            <span
              class="m-caret m-caret-inline"
              :class="{ open: mobileClientsOpen }"
              @click.stop.prevent="mobileClientsOpen = !mobileClientsOpen"
              aria-hidden="true"
            >▾</span>
          </router-link>

          <div v-if="mobileClientsOpen" class="m-submenu">
            <router-link @click="closeMobileMenu" to="/particulares" class="m-sublink">Particulares</router-link>
            <router-link @click="closeMobileMenu" to="/empresas" class="m-sublink">Empresas y Pymes</router-link>
            <router-link @click="closeMobileMenu" to="/administradores-fincas" class="m-sublink">Comunidades y Fincas</router-link>
            <router-link @click="closeMobileMenu" to="/sector-publico" class="m-sublink">Organismos públicos</router-link>
          </div>
        </div>

        <router-link @click="closeMobileMenu" to="/recursos" class="m-link">Recursos</router-link>
        <router-link @click="closeMobileMenu" to="/sobre-nosotros" class="m-link">Sobre nosotros</router-link>
        <router-link @click="closeMobileMenu" to="/area-clientes" class="m-link">Área de clientes</router-link>
        <!-- mobile login button -->
        <button
          @click="(closeMobileMenu(), showLogin = true)"
          class="btn primary glow" v-glow style="width:100%"
        >
          Iniciar sesión
        </button>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref } from "vue";
import logo from "../assets/reglado-energy-logo.svg";
import LoginModal from "./LoginModal.vue";

const open = ref(false);
const mobileClientsOpen = ref(false);
const showLogin = ref(false);

function closeMobileMenu() {
  open.value = false;
  mobileClientsOpen.value = false;
}

function toggleMobileMenu() {
  open.value = !open.value;
  if (!open.value) mobileClientsOpen.value = false;
}

function closeLogin() {
  showLogin.value = false;
}
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
.nav-dropdown{ position: relative; }
.nav-drop-trigger{
  display: inline-flex;
  align-items: center;
  gap: 7px;
  cursor: pointer;
  font-family: inherit;
}
.caret{
  font-size: 12px;
  color: rgba(242,197,61,.85);
  transition: transform .18s ease;
}
.dropdown-menu{
  position: absolute;
  top: 100%;
  left: 0;
  min-width: 235px;
  margin-top: 0;
  padding: 8px;
  border-radius: 14px;
  border: 1px solid rgba(242,197,61,.24);
  background: #0f1318;
  box-shadow: 0 20px 46px rgba(0,0,0,.42);
  opacity: 0;
  transform: translateY(8px) scale(.985);
  pointer-events: none;
  transition: opacity .16s ease, transform .16s ease;
  z-index: 60;
}
.dropdown-link{
  display: block;
  padding: 10px 12px;
  border-radius: 10px;
  border: 1px solid transparent;
  color: rgba(233,238,246,.86);
  font-size: 14px;
}
.dropdown-link:hover{
  border-color: rgba(242,197,61,.25);
  background: rgba(255,255,255,.05);
  color: rgba(255,255,255,.96);
}
.dropdown-link.router-link-active{
  border-color: rgba(242,197,61,.38);
  background: rgba(242,197,61,.12);
  color: rgba(255,255,255,.98);
}
.nav-dropdown:hover .dropdown-menu,
.nav-dropdown:focus-within .dropdown-menu{
  opacity: 1;
  transform: translateY(0) scale(1);
  pointer-events: auto;
}
.nav-dropdown:hover .caret,
.nav-dropdown:focus-within .caret{
  transform: rotate(180deg);
}
.burger{ display:none; background: transparent; border:none; cursor:pointer; width: 44px; height: 44px; border-radius: 14px; border: 1px solid rgba(255,255,255,.10); }
.burger span{ display:block; height:2px; margin:6px 10px; background: rgba(233,238,246,.85); }
.mobile{ border-top: 1px solid rgba(255,255,255,.08); background: rgba(15, 16, 11, 0.85); }
.mobile-inner{ padding: 14px 0 18px; display:flex; flex-direction:column; gap: 10px; }
.m-group{ display:flex; flex-direction:column; gap: 8px; }
.m-caret{ display:inline-block; transition: transform .18s ease; }
.m-caret.open{ transform: rotate(180deg); }
.m-link-caret{
  position: relative;
  padding-right: 40px;
}
.m-caret-inline{
  position: absolute;
  right: 12px;
  top: 50%;
  transform: translateY(-50%);
  display: inline-block;
  color: rgba(242,197,61,.95);
}
.m-caret-inline.open{
  transform: translateY(-50%) rotate(180deg);
}
.m-submenu{
  display:flex;
  flex-direction:column;
  gap: 8px;
  padding-left: 12px;
}
.m-sublink{
  padding: 10px 12px;
  border-radius: 12px;
  border: 1px solid rgba(242,197,61,.20);
  border-bottom: 2px solid transparent;
  background:
    radial-gradient(220px 90px at 8% 0%, rgba(242,197,61,.18), transparent 70%),
    rgba(242,197,61,.05);
  color: rgba(233,238,246,.9);
  font-size: 14px;
}
.m-sublink.router-link-active{
  color: rgba(233,238,246,.9);
  border-color: rgba(242,197,61,.20);
  border-bottom-color: rgba(242,197,61,.82);
  background:
    radial-gradient(220px 90px at 8% 0%, rgba(242,197,61,.18), transparent 70%),
    rgba(242,197,61,.05);
}
.m-link{
  padding: 12px 12px;
  border-radius: 14px;
  border: 1px solid rgba(242,197,61,.20);
  border-bottom: 2px solid transparent;
  background:
    radial-gradient(220px 90px at 8% 0%, rgba(242,197,61,.18), transparent 70%),
    rgba(242,197,61,.05);
}
.m-link:hover{
  border-color: rgba(242,197,61,.30);
}
.m-link.router-link-active{
  color: rgba(233,238,246,.9);
  border-color: rgba(242,197,61,.20);
  border-bottom-color: rgba(242,197,61,.84);
  background:
    radial-gradient(220px 90px at 8% 0%, rgba(242,197,61,.18), transparent 70%),
    rgba(242,197,61,.05);
}
@media (max-width: 980px){ .nav{ display:none; } .burger{ display:block; } }
</style>
