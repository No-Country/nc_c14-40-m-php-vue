<script setup>
import { RouterView } from "vue-router";
import { mdiMagnify, mdiAccount } from "@mdi/js";
</script>

<template>
  <v-app>
    <v-toolbar color="primary">
      <v-btn icon>
        R
      </v-btn>
      <v-item-group class="justify-self-right">
        <v-btn icon>
          <v-icon :icon="mdiMagnify"></v-icon>
        </v-btn>
        <v-btn> Más Populares </v-btn>
        <v-btn> Cerca de Mí </v-btn>
        <v-btn> Nosotros </v-btn>
        <v-btn :prepend-icon="mdiAccount"> Iniciar sesión </v-btn>
      </v-item-group>
    </v-toolbar>
    <v-container>
      <RouterView />
    </v-container>
  </v-app>
</template>
