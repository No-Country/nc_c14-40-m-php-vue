<template>
  <h1
    class="text-center text-[2rem] text-orange-400 p-3 font-bold"
    style="text-shadow: 1px 1px 1px black"
  >
    Los restaurantes más recientes"
  </h1>
  <div
    class="mx-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 my-2"
  >
    <div v-for="restaurant in orderedRestaurants" :key="restaurant.id">
      <div
        class="bg-white rounded-lg shadow-md border-solid border-orange-400 border-b-[6px] border-r-[4px] border-t-[1px] border-l-[1px]"
      >
        <img
          :src="
            restaurant.photo ||
            'https://us.123rf.com/450wm/pavelstasevich/pavelstasevich1811/pavelstasevich181101027/112815900-no-hay-icono-de-imagen-disponible-vector-plano.jpg'
          "
          alt="Restaurant Photo"
          class="w-full h-40 object-cover rounded-lg mb-4"
        />
        <div class="p-4 pt-0">
          <h2 class="text-xl font-semibold">{{ restaurant.name }}</h2>
          <p class="text-gray-600">{{ restaurant.cuisine }}</p>
          <p class="text-gray-600 h-[25px] overflow-y-scroll">
            {{ restaurant.street }}, {{ restaurant.city }}, {{ restaurant.country }}
          </p>
          <p class="mt-2 text-orange-600">{{ restaurant.telephone }}</p>
          <div class="mt-4 flex justify-between items-center">
            <a
              :href="restaurant.web"
              class="text-orange-400"
              target="_blank"
              rel="noopener"
              >Website</a
            >
            <p class="text-gray-800">{{ restaurant.telephone }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from "vue";

const restaurants = ref([]);

onMounted(async () => {
  try {
    const response = await fetch("https://no-country-c40.onrender.com/api/restaurants");
    const data = await response.json();
    restaurants.value = data;
  } catch (error) {
    console.error("Error fetching data from the API", error);
  }
});

const orderedRestaurants = computed(() => {
  return orderRestaurantsByDate(restaurants.value);
});

function orderRestaurantsByDate(restaurants) {
  return restaurants.slice().sort((a, b) => {
    const dateA = new Date(a.created_at);
    const dateB = new Date(b.created_at);
    return dateB - dateA;
  });
}
</script>

<style scoped>
/* Puedes agregar estilos de Tailwind personalizados aquí si lo deseas */
</style>
