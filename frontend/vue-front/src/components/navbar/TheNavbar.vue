<script setup>
import { mdiMagnify, mdiDotsVertical } from "@mdi/js";
import { useDisplay } from "vuetify";
import AccountMenu from "./AccountMenu.vue";
import { ref } from "vue";

const { mobile } = useDisplay();
const drawer = ref(false);
</script>

<template>
  <!-- <v-app> -->
  <v-toolbar color="primary">
    <v-toolbar-items>
      <v-btn
        v-if="mobile"
        :icon="mdiDotsVertical"
        @click.stop="drawer = !drawer"
      ></v-btn>
      <v-btn icon :to="{ name: 'home' }"> R </v-btn>
    </v-toolbar-items>
    <v-spacer></v-spacer>
    <v-toolbar-items>
      <v-btn icon>
        <v-icon :icon="mdiMagnify"></v-icon>
      </v-btn>
      <v-list-item v-if="!mobile" :to="{ name: 'top' }"
        >Más Populares</v-list-item
      >
      <v-list-item v-if="!mobile" :to="{ name: 'nearme' }"
        >Cercanos</v-list-item
      >
      <v-list-item v-if="!mobile" :to="{ name: 'about' }">Nosotros</v-list-item>
      <v-list-item v-if="!mobile" :to="{ name: 'auth' }">Ingresar</v-list-item>
      <AccountMenu />
    </v-toolbar-items>
  </v-toolbar>
  <v-navigation-drawer v-if="mobile" v-model="drawer" location="bottom">
    <v-list-item :to="{ name: 'top' }">Más Populares</v-list-item>
    <v-list-item :to="{ name: 'nearme' }">Cercanos</v-list-item>
    <v-list-item :to="{ name: 'about' }">Nosotros</v-list-item>
    <v-list-item :to="{ name: 'auth' }">Ingresar</v-list-item>
  </v-navigation-drawer>
  <!-- </v-app> -->
</template>

<style scoped></style>
