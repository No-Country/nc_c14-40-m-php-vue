import "vuetify/styles";
import "@fortawesome/fontawesome-free/css/all.css";
import { createVuetify } from "vuetify";
// import * as components from "vuetify/components";
import * as directives from "vuetify/directives";
import { VSkeletonLoader } from "vuetify/labs/VSkeletonLoader";
import { aliases, fa } from "vuetify/iconsets/fa";

const vuetify = createVuetify({
  components: {
    VSkeletonLoader,
  },
  directives,
  display: {
    mobileBreakpoint: "md",
  },
  icons: {
    defaultSet: "fa",
    aliases,
    sets: {
      fa,
    },
  },
  theme: {
    defaultTheme: "customTheme",
    themes: {
      customTheme: {
        dark: false,
        colors: {
          background: "#FFFFFF",
          surface: "#FFFFFF",
          primary: "#FB8C00",
          "primary-darken-1": "#EF6C00",
          secondary: "#FFE0B2",
          "secondary-darken-1": "#FFB74D",
          error: "#B00020",
          info: "#2196F3",
          success: "#4CAF50",
          warning: "#FB8C00",
        },
      },
    },
  },
});

export default vuetify;
