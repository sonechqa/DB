import Vue from "vue";
import VueRouter from "vue-router";
import MainView from "../views/MainView.vue";
import SoldTickets from "../views/SoldTickets.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "home",
    component: MainView,
  },

  {
    path: "/sold",
    name: "sold tickets",
    component: SoldTickets,
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
