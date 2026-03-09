<template>
  <section class="section">
    <div class="container">
      <div class="card soft auth-card">
        <h1 class="h2new">Acceso confirmado</h1>
        <p class="p" v-if="loading">Validando sesion...</p>
        <p class="p" v-else-if="error">{{ error }}</p>
        <p class="p" v-else>
          Tu sesion esta activa. Te redirigimos a inicio en {{ countdown }} segundos...
        </p>
        <router-link to="/" class="btn primary">Ir ahora</router-link>
      </div>
    </div>
  </section>
</template>

<script setup>
import { onMounted, onUnmounted, ref } from "vue";
import { useRoute, useRouter } from "vue-router";
import { auth } from "../services/auth";

const route = useRoute();
const router = useRouter();
const loading = ref(true);
const error = ref("");
const countdown = ref(4);

let countdownInterval;
let redirectTimeout;

function startRedirect() {
  countdownInterval = setInterval(() => {
    if (countdown.value > 1) {
      countdown.value -= 1;
    }
  }, 1000);

  redirectTimeout = setTimeout(() => {
    router.replace("/");
  }, 4000);
}

onMounted(async () => {
  const token = typeof route.query.token === "string" ? route.query.token : "";

  if (!token) {
    loading.value = false;
    error.value = "No se encontro el token de acceso.";
    return;
  }

  try {
    auth.setSession(token, null);
    await auth.initialize();

    if (!auth.state.user) {
      throw new Error("No se pudo validar la sesion");
    }

    startRedirect();
  } catch (err) {
    auth.clearSession();
    error.value = err instanceof Error ? err.message : "No se pudo iniciar sesion";
  } finally {
    loading.value = false;
  }
});

onUnmounted(() => {
  clearInterval(countdownInterval);
  clearTimeout(redirectTimeout);
});
</script>

<style scoped>
.auth-card {
  max-width: 680px;
  margin: 0 auto;
  text-align: center;
  display: grid;
  gap: 14px;
}
</style>
