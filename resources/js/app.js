import { createApp } from "vue";
import App from "./App.vue";

// Import Router
import router from "./router";

// Import CSS ApexCharts
import "apexcharts/dist/apexcharts.css";

// Mount App
const app = createApp(App);
app.use(router);
app.mount("#app");
