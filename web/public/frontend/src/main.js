import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import dayjs from 'dayjs';
import 'dayjs/locale/ru'
import relativeTime from 'dayjs/plugin/relativeTime';

dayjs.extend(relativeTime);
dayjs.locale('ru')

Object.defineProperties(Vue.prototype, {
  $dayjs: {
    get() {
      return dayjs
    }
  }
});

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: (h) => h(App),
}).$mount("#app");
