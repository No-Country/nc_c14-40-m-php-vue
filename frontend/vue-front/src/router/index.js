import { createRouter, createWebHistory } from 'vue-router'
// user store to verify authentication
import { useUserStore } from '../stores/user'
// Lazy loading views
const HomeView = () => import('@/views/HomeView.vue')
const LoginView = () => import('@/views/LoginView.vue')
const RegisterView = () => import('@/views/RegisterView.vue')
const RestaurantsView = () => import('@/views/RestaurantsView.vue')
const RestaurantView = () => import('@/views/RestaurantView.vue')
const TopView = () => import('@/views/TopView.vue')
const NearMeView = () => import('@/views/NearMeView.vue')
const AboutView = () => import('@/views/AboutView.vue')
const AccountView = () => import('@/views/AccountView.vue')
const RatingsView = () => import('@/views/RatingsView.vue')
const ReservationsView = () => import('@/views/ReservationsView.vue')

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView,
      meta: { requiresUnauth: true }
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView,
      meta: { requiresUnauth: true }
    },
    {
      path: '/restaurants',
      name: 'restaurants',
      component: RestaurantsView
    },
    {
      path: '/restaurant/:id',
      name: 'restaurant',
      props: true,
      component: RestaurantView
    },
    {
      path: '/top',
      name: 'top',
      component: TopView
    },
    {
      path: '/nearme',
      name: 'nearme',
      component: NearMeView
    },
    {
      path: '/about',
      name: 'about',
      component: AboutView
    },
    {
      path: '/account',
      name: 'account',
      component: AccountView,
      meta: { requiresAuth: true }

    },
    {
      path: '/myratings',
      name: 'ratings',
      component: RatingsView,
      meta: { requiresAuth: true }
    },
    {
      path: '/myreservations',
      name: 'reservations',
      component: ReservationsView,
      meta: { requiresAuth: true }
    },
  ]
})

router.beforeEach((to, from, next) => {
  const user = useUserStore()
  if (to.meta.requiresAuth && !user.isAuthenticated) {
    // if its not logged in and page requires it, redirects to login
    next({ name: 'login' })
  } else if (to.meta.requiresUnauth && user.isAuthenticated) {
    // if its logged in and the page doesnt work if it is (like /login), redirects to home
    next({ name: 'home' })
  } else {
    next()
  }
})

export default router
