<script setup>
import { RouterView } from "vue-router";
import TheNavbar from "./components/navbar/TheNavbar.vue";
</script>

<template>
  <v-app>
    <TheNavbar />
    <h1 class="text-center">Veutify 3</h1>
    <RouterView />
  </v-app>
</template>
