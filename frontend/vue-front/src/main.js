import App from "./App.vue";
import { createApp } from "vue";
import { registerPlugins } from "@/plugins";
import "./index.css"
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { library } from '@fortawesome/fontawesome-svg-core';
import { fas } from '@fortawesome/free-solid-svg-icons';
import { setupCalendar, Calendar, DatePicker } from 'v-calendar';
import 'v-calendar/style.css';

// Use plugin defaults (optional)



library.add(fas);

const app = createApp(App);
app.use(setupCalendar, {})
app.component('font-awesome-icon', FontAwesomeIcon);
// Use the components
app.component('VCalendar', Calendar)
app.component('VDatePicker', DatePicker)

registerPlugins(app);

app.mount("#app");
