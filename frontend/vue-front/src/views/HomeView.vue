<script setup>
import { ref, onMounted } from "vue";
import { useHomeStore } from "@/store/home";
import { storeToRefs } from "pinia";
import { defineAsyncComponent } from "vue";

const isLoading = ref(true);

const homeStore = useHomeStore();
const { getMixedRestaurants } = homeStore;
const { getStateRest1, getStateRest2 } = storeToRefs(homeStore);

getMixedRestaurants();

onMounted(() => {
  setTimeout(() => {
    isLoading.value = false;
  }, 5000);
});

const Carousel = defineAsyncComponent(() =>
  import("@/components/home/CarouselV.vue")
);

const Slides = defineAsyncComponent(() =>
  import("@/components/home/SlideGroup.vue")
);
</script>

<template>
  <Carousel :restaurants="getStateRest1" :isLoading="isLoading" />
  <Slides :restaurants="getStateRest2" :isLoading="isLoading" />
</template>

<style scoped>
.slide-group {
  padding: 0 !important;
}
</style>
