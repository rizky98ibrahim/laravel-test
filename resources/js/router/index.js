import { createRouter, createWebHistory } from "vue-router";
import Home from "../pages/Home.vue";
import Dashboard from "../pages/Dashboard.vue";

const routes = [
    {
        path: "/",
        name: "home",
        component: Home,
    },
    {
        path: "/dashboard",
        name: "dashboard",
        component: Dashboard,
    },
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});

export default router;
