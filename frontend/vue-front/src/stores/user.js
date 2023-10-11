import { ref } from 'vue'
import { defineStore } from 'pinia'

export const useUserStore = defineStore('user', () => {
  const isAuthenticated = ref(true)
  const fullname = "Cosme Fulanito"

  return { isAuthenticated, fullname }
})
