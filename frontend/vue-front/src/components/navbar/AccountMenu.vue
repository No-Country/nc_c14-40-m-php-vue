<script setup>
import { ref } from 'vue';
import { useDisplay, useTheme } from 'vuetify';
import { mdiAccount } from '@mdi/js';
import { computed } from 'vue';
import { useUserStore } from '../../stores/user';

const user = useUserStore();
const { mobile } = useDisplay();
const theme = useTheme();
const menu = ref(null); // false or null when closed
const primaryColor = ref(theme.current.value.colors.primary);
const text = computed(() => {
  if (mobile.value) return null;
  else return user.fullname;
})
</script>

<template>
  <v-btn v-if="!user.isAuthenticated && mobile" :icon="mdiAccount" :to="{ name: 'login' }"
    class="account-button text-body-1"></v-btn>
  <v-btn v-else-if="!user.isAuthenticated && !mobile" :prepend-icon="mdiAccount" :to="{ name: 'login' }"
    class="account-button text-body-1">Iniciar sesión</v-btn>
  <v-btn v-else :prepend-icon="mdiAccount" class="account-button text-body-1">
    <template v-if="menu === false || menu === null" v-slot:prepend>
      <v-icon color="white"></v-icon>
    </template>
    <template v-else v-slot:prepend>
      <v-icon :color="primaryColor"></v-icon>
    </template>
    <v-menu activator="parent" background-color="#FFFFFF" class="account-menu" v-model="menu">
      <v-list-item :to="{ name: 'account' }">Perfil</v-list-item>
      <v-list-item :to="{ name: 'ratings' }">Calificaciones</v-list-item>
      <v-list-item :to="{ name: 'reservations' }">Reservaciones</v-list-item>
      <v-list-item :to="{ name: 'home' }">Cerrar sesión</v-list-item>
    </v-menu>
    {{ text }}</v-btn>
</template>

<style scoped>
.v-menu .v-list-item:nth-child(even) {
  background-color: #FFE0B2;
}

.v-menu .v-list-item:nth-child(odd) {
  background-color: #FFF;
}

.account-button[aria-expanded="true"] {
  background: #FFF;
  color: black;
}
</style>