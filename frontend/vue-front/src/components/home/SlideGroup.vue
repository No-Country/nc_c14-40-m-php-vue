<script setup>
import { ref } from "vue";

const props = defineProps({
  restaurants: {
    type: Array,
  },
  isLoading: {
    type: Boolean,
  },
});

const selection = ref(1);
const loading = ref(false);

// const reserve = () => {
//   loading.value = true;
//   setTimeout(() => (loading.value = false), 2000);
// };
</script>

<template>
  <div class="ma-12">
    <h2 class="text-h4 text-center font-weight-bold">
      Últimas calificaciones cinco estrellas
    </h2>
  </div>

  <div>
    <v-slide-group
      v-model="model"
      class="pa-0"
      selected-class="bg-success"
      show-arrows
    >
      <v-slide-group-item v-for="(restaurant, i) in props.restaurants" :key="i">
        <v-skeleton-loader
          :loading="isLoading"
          class="mx-auto border"
          width="268"
          type="card-avatar, article, actions"
        >
          <v-card :loading="loading" class="ma-2 my-12" max-width="268">
            <template v-slot:loader="{ isActive }">
              <v-progress-linear
                :active="isActive"
                color="deep-purple"
                height="4"
                indeterminate
              ></v-progress-linear>
            </template>

            <v-img cover height="250" :src="props.restaurants[i].photo"></v-img>

            <v-card-item>
              <v-card-title>{{ props.restaurants[i].name }}</v-card-title>

              <v-card-subtitle>
                <span class="me-1">Local Favorite</span>

                <v-icon color="error" icon="fas fa-fire" size="small"></v-icon>
              </v-card-subtitle>
            </v-card-item>

            <v-card-text>
              <v-row align="center" class="mx-0">
                <v-rating
                  :model-value="4.5"
                  color="amber"
                  density="compact"
                  half-increments
                  readonly
                  size="small"
                ></v-rating>

                <div class="text-grey ms-4">4.5 (413)</div>
              </v-row>

              <div class="my-4 text-subtitle-1">
                $ • {{ props.restaurants[i].cuisine }}
              </div>

              <div>
                Small plates, salads & sandwiches - an intimate setting with 12
                indoor seats plus patio seating.
              </div>
            </v-card-text>

            <v-divider class="mx-4 mb-1"></v-divider>

            <v-card-title>Tonight's availability</v-card-title>

            <div class="px-4">
              <v-chip-group v-model="selection">
                <v-chip>5:30PM</v-chip>

                <v-chip>7:30PM</v-chip>

                <v-chip>8:00PM</v-chip>

                <v-chip>9:00PM</v-chip>
              </v-chip-group>
            </div>

            <v-card-actions>
              <v-btn
                color="deep-purple-lighten-2"
                variant="text"
                @click="$router.push({ name: 'reserves' })"
              >
                Reserve
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-skeleton-loader>
      </v-slide-group-item>
    </v-slide-group>
  </div>
</template>
