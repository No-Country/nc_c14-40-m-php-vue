import { defineStore } from "pinia";
import { ref, computed } from "vue";
import authApi from "@/api/authApi.js";

export const useAuthStore = defineStore("auth", () => {
  const status = ref("authenticating");
  const user = ref(null);
  const idTokenUser = ref(null);
  const refreshTokenUser = ref(null);

  const currentState = computed(() => () => {
    return status.value;
  });

  const getUsername = computed(() => () => {
    const userName = user.value?.name || "";
    return userName;
  });

  const saveTokens = (idToken, refreshToken) => {
    if (idToken) {
      localStorage.setItem("idToken", idToken);
      idTokenUser.value = idToken;
    }
    if (refreshToken) {
      localStorage.setItem("refreshToken", refreshToken);
      refreshTokenUser.value = refreshToken;
    }
  };

  const createNewUser = async (newUser) => {
    const { name, email, password } = newUser;

    try {
      const { data } = await authApi.post(":signUp", {
        email,
        password,
        returnSecureToken: true,
      });
      const { idToken, refreshToken } = data;

      const resp = await authApi.post(":update", {
        idToken,
        displayName: name,
      });

      saveTokens(idToken, refreshToken);

      delete newUser.password;
      status.value = "authenticated";
      user.value = newUser;

      return resp;
    } catch (error) {
      return { ok: false, message: error.response.data.error.message };
    }
  };

  const changeDisplayName = (displayName, activeUser) => {
    if (displayName) {
      activeUser.name = displayName;
    }
  };

  const loginUser = async (activeUser) => {
    const { email, password } = activeUser;
    try {
      const resp = await authApi.post(":signInWithPassword", {
        email,
        password,
        returnSecureToken: true,
      });
      const { displayName, idToken, refreshToken } = resp.data;

      changeDisplayName(displayName, activeUser);

      saveTokens(idToken, refreshToken);

      status.value = "authenticated";
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
    refreshTokenUser.value = null;
    localStorage.removeItem("idToken");
    localStorage.removeItem("refreshToken");
    return { ok: true };
  };

  const checkAuth = async () => {
    const idToken = localStorage.getItem("idToken");
    const refreshToken = localStorage.getItem("refreshToken");

    if (!idToken) {
      clearValues();
      return { ok: true, message: "No hay token" };
    }

    try {
      const { data } = await authApi.post(":lookup", { idToken });
      const { displayName, email } = data.users[0];
      const activeUser = {
        name: displayName,
        email,
      };

      changeDisplayName(displayName, activeUser);

      saveTokens(idToken, refreshToken);

      status.value = "authenticated";
      user.value = activeUser;

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
    refreshTokenUser,
    status,
    user,
  };
});
