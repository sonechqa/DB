<template>
  <div class="main">
    <div class="routes">
      <Route v-for="(route, index) in routes" :key="index" :route="route" />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Route from "../components/route/Route.vue";

export default {
  name: "MainView",
  components: { Route },
  data() {
    return {
      routes: [],
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

<style lang="scss" scoped>
.routes {
  width: 830px;
  margin: 0px auto;
}
</style>