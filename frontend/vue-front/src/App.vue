<script setup>
import { defineAsyncComponent } from "vue";
import { RouterView } from "vue-router";
import { storeToRefs } from "pinia";
import { useAuthStore } from "./modules/auth/store/auth.js";

const store = useAuthStore();
const { checkAuth } = store;
const { currentState } = storeToRefs(store);

checkAuth();

const TheNavbar = defineAsyncComponent(() =>
  import("@/components/navbar/TheNavbar.vue")
);
</script>

<template>
  <v-app>
    <TheNavbar />
    <h1 v-if="currentState === 'authenticating'">{{ currentState }}</h1>
    <router-view v-slot="{ Component }">
      <keep-alive>
        <component :is="Component" />
      </keep-alive>
    </router-view>
  </v-app>
</template>
