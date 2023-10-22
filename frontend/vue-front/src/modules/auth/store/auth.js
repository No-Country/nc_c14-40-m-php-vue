import { defineStore } from "pinia";
import { ref, computed } from "vue";
import authApi from "@/api/authApi.js";

export const useAuthStore = defineStore("auth", () => {
  const status = ref("authenticating");
  const user = ref(null);
  const idTokenUser = ref(null);
  // const refreshTokenUser = ref(null);

  const currentState = computed(() => () => {
    return status.value;
  });

  const getUsername = computed(() => () => {
    const userName = user.value?.name || "";
    return userName;
  });

  const saveTokens = (token) => {
    if (token) {
      localStorage.setItem("idToken", token);
      idTokenUser.value = token;
    }
  };

  const createNewUser = async (newUser) => {
    const { name, email, password } = newUser;

    try {
      const resp = await authApi.post("/register", {
        name,
        email,
        password,
      });
      const { token } = resp.data;

      saveTokens(token);

      delete newUser.password;
      status.value = "authenticated";
      user.value = newUser;

      return resp;
    } catch (error) {
      return { ok: false, message: error.response.data.error.message };
    }
  };

  const loginUser = async (activeUser) => {
    const { email, password } = activeUser;
    try {
      const resp = await authApi.post("/login", {
        email,
        password,
      });
      const { token } = resp.data;

      saveTokens(token);

      status.value = "authenticated";
      delete activeUser.password;
      user.value = activeUser;

      return resp;
    } catch (error) {
      return { ok: false, message: error.response.data.error.message };
    }
  };

  const clearValues = () => {
    status.value = "no-authenticated";
    user.value = null;
    idTokenUser.value = null;
    localStorage.removeItem("idToken");
    localStorage.removeItem("refreshToken");
    return { ok: true };
  };

  const checkAuth = async () => {
    const idToken = localStorage.getItem("idToken");

    if (!idToken) {
      clearValues();
      return { ok: true, message: "No hay token" };
    }

    try {
      status.value = "authenticated";

      return { ok: true };
    } catch (error) {
      clearValues();
      return { ok: false, message: error.response.data.error.message };
    }
  };

  return {
    checkAuth,
    clearValues,
    createNewUser,
    currentState,
    getUsername,
    idTokenUser,
    loginUser,
    status,
    user,
  };
});
