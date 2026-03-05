<template>
  <div class="app-shell">
    <SiteHeader />
    <main class="main">
      <div class="page-wrapper">
    <router-view v-slot="{ Component, route }">
        <component v-if="Component" :is="Component" :key="route.fullPath" />
        <section v-else class="section">
          <div class="container">
            <div class="card glow" v-glow>
              <h1 class="h1">Cargando…</h1>
              <p class="p">Si ves esto de forma permanente, hay un error en la ruta o en la carga del componente.</p>
            </div>
          </div>
        </section>
      </router-view>
      </div>
</main>
    <SiteFooter />
    <CTASticky @close="isCTAClosed = true" />
    <ScrollTopButton :isCTAClosed="isCTAClosed" />
  </div>
</template>

<script setup>
import { ref } from "vue";
import SiteHeader from "./components/SiteHeader.vue";
import SiteFooter from "./components/SiteFooter.vue";
import CTASticky from "./components/CTASticky.vue";
import ScrollTopButton from "./components/ScrollTopButton.vue";

const isCTAClosed = ref(false);
</script>

<style>
/* Layout fix: ensure router-view area has height and footer sits at bottom */
.app-shell{
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}
.main{
  flex: 1;
  min-height: 0;
  padding-top: 42px; /* desktop: reduced by ~1/3 */
  padding-bottom: 40px; /* desktop: reduced by ~1/3 */
}

@media (max-width: 980px){
  .main{
    padding-top: 0;   /* keep mobile unchanged at top */
    padding-bottom: 40px; /* mobile: less empty space before footer */
  }
}

.page-wrapper{
  position: relative;
  flex: 1;
  min-height: 0;
}
</style>
