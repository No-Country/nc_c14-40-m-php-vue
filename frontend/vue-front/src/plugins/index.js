// Plugins
import { createPinia } from "pinia";
import vuetify from "./vuetify";
import router from "../router";

export function registerPlugins(app) {
  app.use(createPinia());
  app.use(vuetify);
  app.use(router);
}
