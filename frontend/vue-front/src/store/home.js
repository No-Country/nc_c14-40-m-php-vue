import { defineStore } from "pinia";
import { ref, computed } from "vue";
import authApi from "@/api/authApi.js";

export const useHomeStore = defineStore("home", () => {
  const restaurants1 = ref([{}, {}, {}, {}, {}, {}]);

  const restaurants2 = ref([{}, {}, {}, {}, {}, {}, {}, {}, {}, {}]);

  const getStateRest1 = computed(() => {
    return restaurants1.value;
  });

  const getStateRest2 = computed(() => {
    return restaurants1.value;
  });

  const getMixedRestaurants = async () => {
    const resp = await authApi.get("/restaurants");
    const { data } = resp;
    let mixedRest = data.sort(() => Math.random() - 0.5);
    const mixedRest1 = mixedRest.splice(0, 6);
    restaurants1.value = mixedRest1;
    const mixedRest2 = mixedRest.splice(7, 10);
    restaurants2.value = mixedRest2;
    console.log(data);

    return { ok: true };
  };

  return { getStateRest1, getStateRest2, getMixedRestaurants };
});
