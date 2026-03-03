<!-- componente de Tarjeta de Perfil en pag Home y pag Clientes -->
<template>
  <router-link :to="to" class="card link glow" v-glow v-reveal="reveal">
    <div class="pill">{{ label }}</div>
    <div class="row">
      <div class="name">{{ name }}</div>
      <div class="arrow">→</div>
    </div>
    <p class="p"><strong>Problema:</strong> {{ problem }}</p>
    <p class="p"><strong>Solución:</strong> {{ solution }}</p>
  </router-link>
</template>

<script setup>
defineProps({
  to: { type: String, required: true },
  label: { type: String, default: "Perfil" },
  name: { type: String, required: true },
  problem: { type: String, required: true },
  solution: { type: String, required: true },
  reveal: { type: Object, default: () => ({}) }
});
</script>

<style scoped>
.link{ display:block; }
.pill{ display:inline-flex; padding: 8px 12px; border-radius: 999px; font-size: 12px; border: 1px solid rgba(242,197,61,.26); background: linear-gradient(180deg, rgba(242,197,61,.14), rgba(242,197,61,.06)); margin-bottom: 10px; font-weight: 800; }
.row{ display:flex; align-items:center; justify-content:space-between; gap: 10px; margin-bottom: 10px; }
.name{ font-weight: 900; font-size: 18px; }
.arrow{ color: rgba(242,197,61,.9); font-weight: 900; }
</style>
