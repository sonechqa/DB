<template>
  <div class="main">
  <RouteVue :route="routes"/>
  </div>
</template>

<script>
import axios from "axios";
import RouteVue from '../components/Route.vue';

export default {
  name: "MainView",
  components: {RouteVue},
  data() {
    return {
      routes: {},
    };
  },
  async mounted() {
    const { data } = await axios.post(
      "http://localhost:8000/endpoints/getRoutes.php"
    );
    this.routes = data;
  },
};
</script>

<style lang="scss" scoped></style>