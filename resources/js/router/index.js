import { createRouter, createWebHistory } from "vue-router";
import Layout from "../Layout/Layout.vue";
import Dashboard from "../Pages/Dashboard.vue";
import Transaksi from "../Pages/Transaksi.vue";

const routes = [
    {
        path: "/",
        component: Layout,
        children: [
            {
                path: "/",
                component: Dashboard,
                meta: {
                    title: "Dashboard",
                },
            },
            {
                path: "/transaksi",
                component: Transaksi,
                meta: {
                    title: "Transaksi",
                },
            },
        ],
    },
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});

router.beforeEach((to, from, next) => {
    document.title = `${to.meta.title} | Rizky Ibrahim`;
    next();
});

export default router;
