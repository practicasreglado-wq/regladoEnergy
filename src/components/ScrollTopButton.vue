<!-- componente de botón redondo para subir al inicio de la página. -->
<template>
  <button class="scroll-top glow" :class="{ 'cta-closed': isCTAClosed }" v-glow type="button" aria-label="Volver arriba" @click="scrollToTop">
    <span class="arrow" aria-hidden="true">&uarr;</span>
  </button>
</template>

<script setup>
const props = defineProps({
  isCTAClosed: {
    type: Boolean,
    default: false
  }
});

function scrollToTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}
</script>

<style scoped>
.scroll-top {
  position: fixed;
  right: 30px;
  bottom: 27px;
  z-index: 70;
  width: 45px;
  height: 45px;
  border-radius: 999px;
  border: 2px solid rgba(255, 255, 255, .92);
  background: rgba(242, 197, 61, .48);
  color: #ffffff;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  box-shadow: 0 14px 34px rgba(0, 0, 0, .34);
  backdrop-filter: blur(6px);
}

.scroll-top::before {
  content: "";
  position: absolute;
  inset: 1px;
  border-radius: inherit;
  border: 1px solid rgba(242, 197, 61, .95);
  pointer-events: none;
}

.scroll-top:hover {
  background: rgba(242, 197, 61, .62);
}

.scroll-top.cta-closed {
  right: 10px;
  bottom: 10px;
}

.arrow {
  font-size: 22px;
  line-height: 1;
  font-weight: 800;
  transform: translateY(-1px);
}

@media (max-width: 980px) {
  .scroll-top {
    right: 14px;
    bottom: 125px;
    width: 50px;
    height: 50px;
  }

}

@media (min-width: 768px) and (max-width: 1356px) {
  .scroll-top {
    right: 20px;
    bottom: 90px;
    width: 48px;
    height: 48px;
  }
}

@media (min-width: 768px) and (max-width: 980px) {
  .scroll-top {
    right: 20px;
    bottom: 125px;
    width: 48px;
    height: 48px;
  }
}
</style>
