<script setup>
import { RouterView } from "vue-router";
import TheNavbar from "./components/TheNavbar.vue";
</script>

<template>
  <v-app>
    <TheNavbar />
    <h1 class="text-center">Veutify 3</h1>

    <v-container>
      <RouterView />
    </v-container>
  </v-app>
</template>
