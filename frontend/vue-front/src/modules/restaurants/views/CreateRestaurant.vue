<template>
  <div class="bg-orange-100 shadow-lg p-8 rounded-lg">
    <h1
      class="text-[2rem] font-semibold mb-6 text-center text-red-600"
      style="text-shadow: 1px 1px 1px black"
    >
      Agregar un restaurante
    </h1>
    <form
      @submit.prevent="createRestaurant"
      class="space-y-4 max-w-[500px] mx-auto border-solid border-[2px] border-orange-400 p-3 rounded-lg shadow-md shadow-slate-400 bg-orange-50"
    >
      <div>
        <label for="name" class="block text-sm font-medium text-orange-700"
          >Nombre del Restaurante:</label
        >
        <input
          type="text"
          id="name"
          v-model="newRestaurant.name"
          required
          class="mt-1 p-3 w-full border-solid border-orange-300 border-[2px] rounded focus:outline-none focus:border-orange-300"
        />
      </div>

      <div>
        <label for="photo" class="block text-sm font-medium text-orange-700"
          >URL de la Foto:</label
        >
        <input
          type="text"
          id="photo"
          v-model="newRestaurant.photo"
          required
          class="mt-1 p-3 w-full border-solid border-orange-300 border-[2px] rounded focus:outline-none focus:border-orange-300"
        />
      </div>

      <div>
        <label for="street" class="block text-sm font-medium text-orange-700"
          >Dirección:</label
        >
        <input
          type="text"
          id="street"
          v-model="newRestaurant.street"
          required
          class="mt-1 p-3 w-full border-solid border-orange-300 border-[2px] rounded focus:outline-none focus:border-orange-300"
        />
      </div>

      <div>
        <label for="web" class="block text-sm font-medium text-orange-700"
          >Sitio web:</label
        >
        <input
          type="url"
          id="web"
          v-model="newRestaurant.web"
          required
          class="mt-1 p-3 w-full border-solid border-orange-300 border-[2px] rounded focus:outline-none focus:border-orange-300"
        />
      </div>

      <div>
        <label for="cuisine" class="block text-sm font-medium text-orange-700"
          >Cocina:</label
        >
        <input
          type="text"
          id="cuisine"
          v-model="newRestaurant.cuisine"
          required
          class="mt-1 p-3 w-full border-solid border-orange-300 border-[2px] rounded focus:outline-none focus:border-orange-300"
        />
      </div>

      <div>
        <label for="tables_number" class="block text-sm font-medium text-orange-700"
          >Número de Mesas:</label
        >
        <input
          type="number"
          id="tables_number"
          v-model="newRestaurant.tables_number"
          required
          class="mt-1 p-3 w-full border-solid border-orange-300 border-[2px] rounded focus:outline-none focus:border-orange-300"
        />
      </div>

      <div>
        <label for="telephone" class="block text-sm font-medium text-orange-700"
          >Teléfono:</label
        >
        <input
          type="tel"
          id="telephone"
          v-model="newRestaurant.telephone"
          required
          class="mt-1 p-3 w-full border-solid border-orange-300 border-[2px] rounded focus:outline-none focus:border-orange-300"
        />
      </div>

      <div>
        <label for="city" class="block text-sm font-medium text-orange-700"
          >Ciudad:</label
        >
        <input
          type="text"
          id="city"
          v-model="newRestaurant.city"
          required
          class="mt-1 p-3 w-full border-solid border-orange-300 border-[2px] rounded focus:outline-none focus:border-orange-300"
        />
      </div>

      <div>
        <label for="country" class="block text-sm font-medium text-orange-700"
          >País:</label
        >
        <input
          type="text"
          id="country"
          v-model="newRestaurant.country"
          required
          class="mt-1 p-3 w-full border-solid border-orange-300 border-[2px] rounded focus:outline-none focus:border-orange-300"
        />
      </div>

      <div>
        <label for="opening_hour" class="block text-sm font-medium text-orange-700"
          >Hora de Apertura:</label
        >
        <input
          type="time"
          id="opening_hour"
          v-model="newRestaurant.opening_hour"
          required
          class="mt-1 p-3 w-full border-solid border-orange-300 border-[2px] rounded focus:outline-none focus:border-orange-300"
        />
      </div>

      <div>
        <label for="closing_hour" class="block text-sm font-medium text-orange-700"
          >Hora de Cierre:</label
        >
        <input
          type="time"
          id="closing_hour"
          v-model="newRestaurant.closing_hour"
          required
          class="mt-1 p-3 w-full border-solid border-orange-300 border-[2px] rounded focus:outline-none focus:border-orange-300"
        />
      </div>

      <div class="text-center">
        <button
          type="submit"
          class="bg-orange-600 text-white px-4 py-2 rounded-md hover:bg-orange-700 focus:outline-none focus:ring focus:border-orange-300"
        >
          Crear Restaurante
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { ref } from "vue";

const newRestaurant = ref({
  name: "",
  photo: "",
  street: "",
  web: "",
  cuisine: "",
  tables_number: null,
  telephone: "",
  city: "",
  country: "",
  opening_hour: "",
  closing_hour: "",
  user_id: 1,
});

async function createRestaurant() {
  try {
    const response = await fetch("https://no-country-c40.onrender.com/api/restaurant", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(newRestaurant.value),
    });

    if (response.ok) {
      console.log("Restaurante creado con éxito");
      newRestaurant.value = {}; // Reinicia el formulario
    } else {
      console.log("Error al crear el restaurante");
      newRestaurant.value = {};
    }
  } catch (error) {
    console.error("Error al crear el restaurante", error);
    newRestaurant.value = {};
  }
}
</script>

<style scoped>
/* Estilos específicos del componente si los necesitas */
</style>
