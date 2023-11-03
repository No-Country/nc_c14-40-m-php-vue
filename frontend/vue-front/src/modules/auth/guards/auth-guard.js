import { useAuthStore } from "../store/auth.js";

const isAuthenticatedGuard = (to, from, next) => {
  const store = useAuthStore();
  const status = store.currentState();
  console.log(status);
  if (status === "authenticated" || status === "authenticating") next();
  if (status === "no-authenticated") next({ name: "auth" });
};

export default isAuthenticatedGuard;
