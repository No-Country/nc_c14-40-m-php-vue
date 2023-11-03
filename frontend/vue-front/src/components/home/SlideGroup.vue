<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
const props = defineProps({
  restaurants: {
    type: Array,
  },
  isLoading: {
    type: Boolean,
  },
});
const router = useRouter();
const loading = ref(false);

// const reserve = () => {
//   loading.value = true;
//   setTimeout(() => (loading.value = false), 2000);
// };
const reservarRestaurante = (restauranteId) => {
  console.log(restauranteId); // Obtiene el enrutador
  router.push({ name: "reserves", params: { restaurantId: restauranteId } });
};
</script>

<template>
  <div class="py-[2px]">
    <h2
      class="text-h4 text-center font-weight-bold text-orange-400 shadow-sm shadow-black py-5"
      style="text-shadow: 1px 1px 1px black"
    >
      Últimas calificaciones cinco estrellas
    </h2>
  </div>

  <div class="bg-gradient-to-l from-orange-200 via-orange-100 to-neutral-100 py-3">
    <v-slide-group
      v-model="model"
      class="pa-0 mx-4"
      selected-class="bg-success"
      show-arrows
    >
      <v-slide-group-item v-for="(restaurant, i) in props.restaurants" :key="i">
        <v-skeleton-loader
          :loading="isLoading"
          class="mx-auto border mb-7"
          width="400"
          type="card-avatar, article, actions"
        >
          <v-card
            :loading="loading"
            style="border: 2px solid rgb(234, 88, 12)"
            max-width="400"
          >
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
              <v-card-title class="text-[#EA580C]">{{
                props.restaurants[i].name
              }}</v-card-title>
            </v-card-item>

            <v-card-text>
              <v-row align="center" class="mx-0">
                <v-rating
                  :model-value="5"
                  color="amber"
                  density="compact"
                  half-increments
                  readonly
                  size="small"
                ></v-rating>

                <div class="text-grey ms-4">5 (100)</div>
              </v-row>

              <div class="mt-2 pt-4 text-subtitle-1 max-w-[400px] flex flex-row gap-4">
                <font-awesome-icon
                  :icon="['fas', 'utensils']"
                  style="color: orange; margin-top: 5px"
                />
                <span class="text-orange-600">{{ props.restaurants[i].cuisine }}</span>
              </div>
              <div class="flex gap-5">
                <font-awesome-icon
                  :icon="['fas', 'location-dot']"
                  style="color: orange"
                  class="text-[1rem]"
                />
                <h2 class="text-orange-500">
                  {{ props.restaurants[i].city }} | {{ props.restaurants[i].country }}
                </h2>
              </div>
              <div class="p-3 flex flex-col gap-1">
                <div class="flex justify-between">
                  <span class="font-bold text-orange-600">Opening hour: </span
                  ><span>{{ props.restaurants[i].opening_hour }}</span>
                </div>
                <div class="flex justify-between">
                  <span class="font-bold text-orange-600">Closing hour: </span
                  ><span>{{ props.restaurants[i].closing_hour }}</span>
                </div>
              </div>
              <div class="flex gap-5 py-3">
                <font-awesome-icon
                  :icon="['fas', 'phone']"
                  style="padding-top: 3px; color: orange"
                />
                <h2>{{ props.restaurants[i].telephone }}</h2>
              </div>
            </v-card-text>

            <v-divider class="mx-4 mb-1"></v-divider>

            <v-card-actions>
              <v-btn
                color="white"
                variant="text"
                @click="reservarRestaurante(props.restaurants[i].id)"
                style="
                  color: white;
                  margin: 0px auto;
                  background: linear-gradient(
                    to right,
                    rgb(234, 88, 12),
                    rgb(249, 115, 22)
                  );
                "
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
