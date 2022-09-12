<template>
  <div v-show="tickets.length !== 0" class="tickets">
    <Route
      v-for="(ticket, index) in tickets"
      :key="index"
      :route="ticket"
      :button="false"
    />
  </div>
</template>

<script>
import axios from "axios";
import Route from "../components/route/Route.vue";

export default {
  name: "SoldTickets",

  components: { Route },

  data() {
    return {
      tickets: [],
    };
  },

  async mounted() {
    const response = await axios.get(
      "http://localhost:8000/endpoints/getTickets.php"
    );
    this.tickets = response.data;
  },
};
</script>

<style lang="scss" scoped>
.tickets {
  width: 830px;
  margin: 0px auto;
  margin-top: 50px;
}
</style>
