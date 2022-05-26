<template>
  <div class="main">
    <Parameters @submit="updateTickets" />
    <div class="routes">
      <Route v-for="(route, index) in routes" :key="index" :route="route" />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Route from "../components/route/Route.vue";
import Parameters from "../components/search/Parameters.vue";

export default {
  name: "MainView",

  components: { Route, Parameters },

  data() {
    return {
      routes: [],
    };
  },

  methods: {
    async updateTickets(eventData) {
      const response = await axios.get(
        "http://localhost:8000/endpoints/getRoutes.php",
        {
          params: {
            departureDate: eventData.date,
            passengers: eventData.passengers,
          },
        }
      );
      this.routes = response.data;
    },
  },
};
</script>

<style lang="scss" scoped>
.routes {
  width: 830px;
  margin: 0px auto;
}
</style>