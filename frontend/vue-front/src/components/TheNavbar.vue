<script setup>
import { RouterView } from "vue-router";
</script>

<template>
  <v-app>
    <v-app-bar color="orange darken-1">
      <v-btn icon>
        <v-icon>mdi-magnify</v-icon>
      </v-btn>
      <v-btn>
        Más Populares
      </v-btn>
      <v-btn>
        Cerca de Mí
      </v-btn>
      <v-btn>
        Nosotros
      </v-btn>
      <v-btn prepend-icon="mdi-account">
        <v-icon>mdi-heart</v-icon>
        Iniciar sesión
      </v-btn>
    </v-app-bar>
    <v-container>
      <RouterView />
    </v-container>
  </v-app>
</template>
