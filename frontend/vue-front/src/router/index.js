import { createRouter, createWebHistory } from "vue-router";
// user store to verify authentication
// import { useUserStore } from "../stores/user";
import authRouter from "@/modules/auth/router";
import restaurantsRouter from "@/modules/restaurants/router";
// import isAuthenticatedGuard from "@/modules/auth/guards/auth-guard.js";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: () => import("@/views/HomeView.vue"),
    },
    {
      path: "/auth",
      ...authRouter,
      // meta: { requiresUnauth: true },
    },
    {
      path: "/restaurants",
      // beforeEnter: [isAuthenticatedGuard],
      ...restaurantsRouter,
      // meta: { requiresUnauth: true },
    },
    {
      path: "/restaurants/:restaurantId",
      name: "reserves",
      component: () => import("@/modules/restaurants/views/ReservesRest.vue"),
    },
    {
      path: "/restaurantsRecent",
      name: "restaurantsRecent",
      component: () => import("@/modules/restaurants/views/RestaurantsRecentView.vue"),
    },
    {
      path: "/createRestaurant",
      name: "createRestaurant",
      component: () => import("@/modules/restaurants/views/CreateRestaurant.vue"),
    },
    {
      path: "/reservation",
      name: "reservation",
      component: () => import("@/modules/restaurants/views/CreateReservation.vue"),
    },
    // {
    //   path: "/nearme",
    //   beforeEnter: [isAuthenticatedGuard],
    //   name: "nearme",
    //   component: () => import("@/views/NearMeView.vue"),
    // },
    // {
    //   path: "/about",
    //   beforeEnter: [isAuthenticatedGuard],
    //   name: "about",
    //   component: () => import("@/views/AboutView.vue"),
    // },
    // {
    //   path: "/account",
    //   beforeEnter: [isAuthenticatedGuard],
    //   name: "account",
    //   component: () => import("@/views/AccountView.vue"),
    //   meta: { requiresAuth: true },
    // },
    // {
    //   path: "/myratings",
    //   beforeEnter: [isAuthenticatedGuard],
    //   name: "ratings",
    //   component: () => import("@/views/RatingsView.vue"),
    //   meta: { requiresAuth: true },
    // },
    // {
    //   path: "/myreservations",
    //   beforeEnter: [isAuthenticatedGuard],
    //   name: "reservations",
    //   component: () => import("@/views/ReservationsView.vue"),
    //   meta: { requiresAuth: true },
    // },
  ],
});

// router.beforeEach((to, from, next) => {
//   const user = useUserStore();
//   if (to.meta.requiresAuth && !user.isAuthenticated) {
//     // if its not logged in and page requires it, redirects to login
//     next({ name: "login" });
//   } else if (to.meta.requiresUnauth && user.isAuthenticated) {
//     // if its logged in and the page doesnt work if it is (like /login), redirects to home
//     next({ name: "home" });
//   } else {
//     next();
//   }
// });

export default router;
