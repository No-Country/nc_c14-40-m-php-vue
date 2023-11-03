<template>
  <div>
    <v-carousel
      cycle
      height="650"
      hide-delimiter-background
      show-arrows="hover"
    >
      <v-carousel-item
        v-for="(restaurant, i) in props.restaurants"
        :key="i"
        :src="props.restaurants[i].photo"
        cover
      >
        <v-progress-circular
          v-if="props.isLoading"
          class="progress"
          :size="70"
          :width="7"
          color="primary"
          indeterminate
        ></v-progress-circular>
      </v-carousel-item>
    </v-carousel>
  </div>
</template>

<script setup>
const props = defineProps({
  restaurants: {
    type: Array,
  },
  isLoading: {
    type: Boolean,
  },
});
</script>

<style scoped>
.progress {
  left: 48%;
  top: 48%;
}
</style>
