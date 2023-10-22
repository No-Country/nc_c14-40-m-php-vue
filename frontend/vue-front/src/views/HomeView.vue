<script setup>
import { ref, onMounted } from "vue";
import authApi from "@/api/authApi.js";

const restaurants1 = ref([{}, {}, {}, {}, {}, {}]);

const restaurants2 = ref([{}, {}, {}, {}, {}, {}]);
const isLoading = ref(true);

const getMixedRestaurants = async () => {
  const resp = await authApi.get("/restaurants");
  const { data } = resp;
  let mixedRest = data.sort(() => Math.random() - 0.5);
  const mixedRest1 = mixedRest.splice(0, 6);
  restaurants1.value = mixedRest1;
  const mixedRest2 = mixedRest.splice(6, 6);
  restaurants2.value = mixedRest2;
  // isLoading.value = false;
  console.log(mixedRest);
  console.log(isLoading.value);

  return { ok: true };
};

getMixedRestaurants();

onMounted(() => {
  setTimeout(() => {
    isLoading.value = false;
  }, 5000);
});
</script>

<template>
  <v-carousel cycle height="650" hide-delimiter-background show-arrows="hover">
    <v-carousel-item
      v-for="(restaurant, i) in restaurants1"
      :key="i"
      :src="restaurants1[i].photo"
      cover
    >
      <v-progress-circular
        v-if="isLoading"
        class="progress"
        :size="70"
        :width="7"
        color="primary"
        indeterminate
      ></v-progress-circular>
    </v-carousel-item>
  </v-carousel>

  <v-container>
    <v-row align="center" justify="center">
      <v-col v-for="(restaurant, i) in restaurants2" :key="i" cols="auto">
        <v-skeleton-loader
          :loading="isLoading"
          class="mx-auto border"
          width="300"
          type="list-item, image, list-item, button"
        >
          <v-card class="mx-auto" max-width="344">
            <v-responsive>
              <v-card-item>
                <div class="text-subtitle-1 mb-1">
                  {{ restaurants2[i].name }}
                </div>
                <div class="mb-1">
                  <v-img
                    :src="restaurants2[i].photo"
                    alt="restaurant"
                    height="200"
                    cover
                  />
                </div>
                <div class="text-caption">
                  Greyhound divisely hello coldly fonwderfully
                </div>
              </v-card-item>
              <v-card-actions>
                <v-btn> Button </v-btn>
              </v-card-actions>
            </v-responsive>
          </v-card>
        </v-skeleton-loader>
      </v-col>
    </v-row>
  </v-container>
</template>

<style scoped>
.progress {
  left: 48%;
  top: 48%;
}
</style>
