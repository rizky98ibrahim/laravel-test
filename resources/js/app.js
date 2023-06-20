import { createApp } from "vue";
import App from "./App.vue";

// Import your components and define routes
import router from "./router";

// Import CSS ApexCharts
import "apexcharts/dist/apexcharts.css";

const app = createApp(App);
app.use(router);
app.mount("#app");
