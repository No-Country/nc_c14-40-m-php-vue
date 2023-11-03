<template>
  <div>
    <div class="relative">
      <v-img :src="restaurant.photo" max-height="400" cover></v-img>
      <div class="absolute top-0 left-0 w-full h-full bg-black opacity-40 z-10"></div>
      <div
        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-20"
      >
        <h2 class="text-white text-3xl text-[3rem] font-bold">
          Restaurante {{ restaurant.name }}
        </h2>
        <p class="text-white text-[1rem] text-center my-2">
          {{ restaurant.city }} | {{ restaurant.country }}
        </p>
        <div class="flex gap-4 justify-center items-center">
          <button
            class="bg-white text-black px-5 py-2 mt-7 rounded-full text-[1rem] font-[600]"
          >
            Delivery
          </button>
          <button
            class="bg-white text-black px-5 py-2 mt-7 rounded-full text-[1rem] font-[600]"
          >
            Para recoger
          </button>
          <button
            class="bg-white text-black px-5 py-2 mt-7 rounded-full text-[1rem] font-[600]"
          >
            Delivery 20 - 60 min
          </button>
        </div>
      </div>
    </div>
    <div class="bg-orange-100">
      <div class="pt-5">
        <h2 class="text-h4 text-center">
          Haz tu reserva para el restaurante {{ restaurant.name }}
        </h2>
      </div>
      <div class="ma-6">
        <h3 class="my-2 font-bold text-[1.2rem] text-center">
          Elige la cantidad de personas
        </h3>
        <div class="mt-2 flex justify-center">
          <v-btn
            v-for="person in persons"
            :key="person"
            class="button focus:bg-orange-300 ma-2"
            >{{ person }}</v-btn
          >
        </div>
      </div>
      <div class="ma-6 p-2">
        <h2 class="my-2 font-bold text-[1.2rem] text-center">Escoge tu horario</h2>
        <div class="max-w-[700px] bg-gray-300 my-2 mx-auto">
          <VDatePicker v-model="date" mode="date" expanded />
        </div>
      </div>
      <div class="ma-6 p-2">
        <h2 class="my-2 font-bold text-[1.2rem] text-center">Escoge la hora</h2>
        <div class="flex justify-center">
          <v-btn
            v-for="hour in hours"
            :key="hour"
            class="button focus:bg-orange-300 ma-2"
            >{{ hour }}</v-btn
          >
        </div>
      </div>
      <div class="ma-6 p-2 text-center">
        <button
          class="text-[1.2rem] text-white rounded-full py-2 bg-gradient-to-r from-orange-600 to-orange-500 px-6 shadow-sm shadow-orange-500"
          @click="redirigirARuta()"
        >
          Reservar
        </button>
      </div>

      <div class="ma-6 flex flex-col sm:flex-row justify-around">
        <div class="w-full sm:w-[40%]">
          <h2 class="text-2xl font-semibold text-center bg-orange-200 rounded-lg">
            Deja una reseña
          </h2>
          <form
            @submit.prevent="submitReview"
            class="max-w-[1000px] bg-orange-200 p-6 rounded-lg rounded-t-none"
          >
            <div class="mb-4">
              <label for="rating" class="block text-gray-700 font-bold text-sm mb-2"
                >Calificación</label
              >
              <div class="flex items-center">
                <span
                  v-for="i in 5"
                  :key="i"
                  @click="setRating(i)"
                  class="cursor-pointer"
                >
                  <i
                    :class="[
                      'fa',
                      'fa-star',
                      i <= userRating ? 'text-[#F68326]' : 'text-gray-400',
                      'text-2xl',
                    ]"
                  ></i>
                </span>
              </div>
            </div>

            <div class="mb-4">
              <label for="description" class="block text-gray-700 font-bold text-sm mb-2"
                >Descripción</label
              >
              <textarea
                v-model="description"
                id="description"
                name="description"
                rows="6"
                class="w-full border rounded-lg p-2"
              ></textarea>
            </div>

            <button
              type="submit"
              class="bg-[#F68326] text-white py-2 px-4 rounded-lg hover:bg-[#D96B1F]"
            >
              Enviar reseña
            </button>
          </form>
        </div>
        <div class="max-w-[700px] bg-orange-200 p-2 my-2 rounded-lg">
          <h2 class="text-2xl font-semibold mb-2 text-center">
            Algunas reviews del restaurante
          </h2>
          <div
            v-for="review in reviews"
            :key="review.id"
            class="mb-4 p-4 bg-white rounded-lg shadow-lg"
          >
            <div class="flex items-center mb-2">
              <img
                v-if="review.userImage"
                :src="review.userImage"
                alt="Foto de usuario"
                class="w-8 h-8 rounded-full mr-2"
              />
              <h3 class="text-lg font-semibold">{{ review.userName }}</h3>
            </div>
            <h3 class="text-lg font-semibold">
              <span
                v-for="i in 5"
                :key="i"
                :class="[
                  'fa',
                  { 'fa-star': i <= review.score, 'fa-star-o': i > review.score },
                  'text-[#F68326]',
                ]"
              ></span>
            </h3>
            <p class="text-gray-600 text-sm">{{ formatDate(review.created_at) }}</p>
            <p class="text-gray-800 mt-2">{{ review.comment }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onBeforeMount, watch } from "vue";
import { useRoute, useRouter } from "vue-router";
import authApi from "@/api/authApi.js";
import { format } from "date-fns";

const router = useRouter();
const userRating = ref(0);
const description = ref("");

const setRating = (rating) => {
  userRating.value = rating;
};
const redirigirARuta = () => {
  // Utiliza Vue Router para redirigir a la ruta deseada
  router.push({ name: "reservation" });
};

const submitReview = async () => {
  try {
    const restaurantId = route.params.restaurantId; // Obtén el ID del restaurante de la ruta

    const reviewData = {
      score: userRating.value, // Utiliza el valor de userRating
      comment: description.value, // Utiliza la descripción ingresada
    };

    const response = await authApi.post(`/restaurant/${restaurantId}/review`, reviewData);

    // Verifica si la revisión se envió con éxito
    if (response.status === 200) {
      console.log("Revisión enviada con éxito");
      // Puedes realizar alguna acción adicional aquí, como actualizar las revisiones en la página
    } else {
      console.error("Error al enviar la revisión");
      // Restablece los valores de userRating y description en caso de error
      userRating.value = 0;
      description.value = "";
    }
  } catch (error) {
    console.error("Error al enviar la revisión:", error);
    // Restablece los valores de userRating y description en caso de error
    userRating.value = 0;
    description.value = "";
  }
};

const route = useRoute();
const persons = ref([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
const hours = ref([
  "10:30-11:30",
  "11:30-12:00",
  "12:00-12:45",
  "13:00-14:00",
  "14:30-15:30",
  "15:40-16:40",
  "17:00-19:00",
]);
const restaurant = ref(null);
const reviews = ref([]);

const formatDate = (date) => {
  return format(new Date(date), "dd/MM/yyyy");
};

onBeforeMount(async () => {
  // Obtén el valor del parámetro 'restaurantId' de la ruta
  const restaurantId = route.params.restaurantId;
  try {
    // Realiza la solicitud a la API y asigna el nombre a 'restaurantName'
    // Ejemplo:
    const response = await authApi.get("/restaurants");
    const allReviews = await authApi.get(`/restaurant/${restaurantId}/reviews/all`);
    console.log(allReviews);
    reviews.value = allReviews.data.restaurant_all_reviews_desc.slice(0, 4);
    console.log(reviews);
    restaurant.value = response.data.find((b) => b.id == restaurantId);
  } catch (error) {
    console.error("Error al obtener detalles del restaurante:", error);
  }
});

// Observa cambios en las revisiones y carga las imágenes de los usuarios
watch(reviews, async (newReviews) => {
  newReviews.forEach(async (review) => {
    const userId = review.user_id;
    const userResponse = await authApi.get(`/user/${userId}`);
    review.userName = userResponse.data.user.name;
    review.userImage = userResponse.data.user.photo;
  });
});
</script>

<style scoped></style>
