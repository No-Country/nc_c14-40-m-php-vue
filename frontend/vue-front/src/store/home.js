import { defineStore } from "pinia";
import { ref, computed } from "vue";
import authApi from "@/api/authApi.js";

export const useHomeStore = defineStore("home", () => {
  const restaurants = ref([]);

  const getRestaurantsState = computed(() => () => {
    return restaurants.value;
  });

  const getMixedRestaurants = async () => {
    const resp = await authApi.get("/restaurants");
    const { data } = resp;
    let mixedRest = data.sort(() => Math.random() - 0.5);
    mixedRest = mixedRest.splice(0, 4);
    restaurants.value = mixedRest;

    return { ok: true };
  };

  return { getMixedRestaurants, restaurants, getRestaurantsState };
});
