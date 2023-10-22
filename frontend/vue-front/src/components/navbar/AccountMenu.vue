<script setup>
import { ref, computed } from "vue";
// import { storeToRefs } from "pinia";
import { useRouter } from "vue-router";
import { useDisplay, useTheme } from "vuetify";
// import { mdiAccount } from "@mdi/js";
// import { useUserStore } from "../../stores/user";
import { useAuthStore } from "@/modules/auth/store/auth.js";

const router = useRouter();
const storeAuth = useAuthStore();
const { clearValues } = storeAuth;
// const { getUsername } = storeToRefs(storeAuth);

// const user = useUserStore();
const { mobile } = useDisplay();
const theme = useTheme();
const menu = ref(null); // false or null when closed
const primaryColor = ref(theme.current.value.colors.primary);

const onLogout = () => {
  router.push({ name: "auth" });
  clearValues();
};

const text = computed(() => {
  if (mobile.value) return null;
  else return storeAuth.getUsername();
});
</script>

<template>
  <v-btn
    v-if="!storeAuth.status && mobile"
    icon="fas fa-lock"
    :to="{ name: 'login' }"
    class="account-button text-body-1"
  ></v-btn>
  <v-btn
    v-else-if="!storeAuth.status && !mobile"
    prepend-icon="fas fa-lock"
    :to="{ name: 'login' }"
    class="account-button text-body-1"
    >Iniciar sesión</v-btn
  >
  <v-btn
    v-else
    prepend-icon="fas fa-user-circle"
    class="account-button text-body-1"
  >
    <template v-if="menu === false || menu === null" v-slot:prepend>
      <v-icon color="white"></v-icon>
    </template>
    <template v-else v-slot:prepend>
      <v-icon :color="primaryColor"></v-icon>
    </template>
    <v-menu
      activator="parent"
      background-color="#FFFFFF"
      class="account-menu"
      v-model="menu"
    >
      <v-list-item :to="{ name: 'restaurants' }">Perfil</v-list-item>
      <v-list-item :to="{ name: 'restaurants' }">Calificaciones</v-list-item>
      <v-list-item :to="{ name: 'restaurants' }">Reservaciones</v-list-item>
      <v-list-item @click="onLogout" :to="{ name: 'home' }"
        >Cerrar sesión</v-list-item
      >
    </v-menu>
    {{ text }}</v-btn
  >
</template>

<style scoped>
.v-menu .v-list-item:nth-child(even) {
  background-color: #ffe0b2;
}

.v-menu .v-list-item:nth-child(odd) {
  background-color: #fff;
}

.account-button[aria-expanded="true"] {
  background: #fff;
  color: black;
}
</style>
