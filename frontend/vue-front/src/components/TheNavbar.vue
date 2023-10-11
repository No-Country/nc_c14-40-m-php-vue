<script setup>
import { RouterView } from "vue-router";
import { mdiMagnify, mdiAccount } from "@mdi/js";
// import { ref } from 'vue';
import { useDisplay, useTheme } from 'vuetify';

const { mobile } = useDisplay();
const theme = useTheme();
const secondaryColor = theme.current.value.colors.secondary;

console.log(secondaryColor);
console.log(mobile.value);
</script>

<template>
  <v-app>
    <v-toolbar color="primary" class="justify-space-between">
      <v-btn icon>
        R
      </v-btn>
      <div v-if="mobile">
        is mobile
      </div>
      <div class="nav-link-group">
        <v-btn icon>
          <v-icon :icon="mdiMagnify"></v-icon>
        </v-btn>
        <v-list-item :to="{ name: 'top' }">Más Populares</v-list-item>
        <v-list-item :to="{ name: 'nearme' }">Cercanos</v-list-item>
        <v-list-item :to="{ name: 'about' }">Nosotros</v-list-item>
        <v-btn :prepend-icon="mdiAccount">
          <v-menu activator="parent" background-color="#FFFFFF" class="account-menu">
            <v-list-item :to="{ name: 'account' }">Perfil</v-list-item>
            <v-list-item :to="{ name: 'ratings' }">Calificaciones</v-list-item>
            <v-list-item :to="{ name: 'reservations' }">Reservaciones</v-list-item>
            <v-list-item :to="{ name: 'home' }">Cerrar sesión</v-list-item>
          </v-menu>
          Iniciar sesión </v-btn>
      </div>
    </v-toolbar>
    <v-container>
      <RouterView />
    </v-container>
  </v-app>
</template>

<style scoped>
div.nav-link-group {
  display: flex;
  flex-direction: row;
  align-items: center;
}
.v-menu .v-list-item:nth-child(even) {
  background-color: v-bind(secondaryColor);
}

.v-menu .v-list-item:nth-child(odd) {
  background: #FFF;
}
</style>