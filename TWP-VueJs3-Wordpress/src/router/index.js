import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import CreateCategory from "../views/CreateCategory.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
 
  {
    path: "/create_category",
    name: "CreateCategory",
    component: CreateCategory,
  },
  
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
