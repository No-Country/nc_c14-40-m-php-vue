export default {
  name: "restaurants",
  component: () => import("@/modules/restaurants/views/RestaurantsView.vue"),
  children: [
    // {
    //   path: "",
    //   name: "reserves",
    //   component: () => import("@/modules/restaurants/views/ReservesRest.vue"),
    // },
  ],
};
