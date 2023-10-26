<template>
  <v-img
    src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
    max-height="650"
    cover
  ></v-img>
  <div class="ma-5">
    <h2 class="text-h4 text-center">Haz tu reserva</h2>
  </div>
  <div class="ma-6">
    <h3>Elige la cantidad de personas</h3>
    <div class="mt-2">
      <v-btn v-for="(person, i) in persons" :key="i" class="button ma-2">{{
        persons[i]
      }}</v-btn>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";

const persons = ref([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
</script>

<style scoped></style>
