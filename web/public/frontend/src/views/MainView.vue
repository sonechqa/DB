<template>
  <div class="main">
    <div class="params">
      <h1 class="heading">Поиск железнодорожных билетов</h1>
      <h3 class="method">Лёгкий способ купить железнодорожные билеты дёшево</h3>
      <Parameters @submit="onSubmit" />
    </div>

    <div v-show="routes.length !== 0" class="routes">
      <Route
        v-for="(route, index) in routes"
        :key="index"
        :route="route"
        @submit="updateTickets"
      />
    </div>

    <AddRoute v-if="buttonPressed" @routeSent="press" />

    <div v-else class="button">
      <UiButton class="add" @click="press">Добавить</UiButton>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Route from "../components/route/Route.vue";
import Parameters from "../components/search/Parameters.vue";
import UiButton from "../components/ui/UiButton.vue";
import AddRoute from "../components/route/AddRoute.vue";

export default {
  name: "MainView",

  components: { Route, Parameters, UiButton, AddRoute },

  data() {
    return {
      routes: [],
      buttonPressed: false,
      departureDate: "",
      passengers: "",
      fromCityId: "",
      toCityId: "",
    };
  },

  methods: {
    onSubmit(eventData) {
      this.departureDate = eventData.date;
      this.passengers = eventData.passengers;
      this.fromCityId = eventData.fromCityId;
      this.toCityId = eventData.toCityId;
      this.updateTickets();
    },

    async updateTickets() {
      const response = await axios.get(
        "http://localhost:8000/endpoints/getRoutes.php",
        {
          params: {
            departureDate: this.departureDate,
            passengers: this.passengers,
            fromCityId: this.fromCityId,
            toCityId: this.toCityId,
          },
        }
      );
      this.routes = response.data;
    },

    press() {
      this.buttonPressed = !this.buttonPressed;
    },
  },
};
</script>

<style lang="scss" scoped>
.params {
  background-color: #2060ff;
  padding-bottom: 160px;
}

.heading {
  font-weight: 400;
  font-size: 48px;
  color: #ffffff;
  text-align: center;
  margin-top: 0;
  padding-top: 160px;
}

.method {
  font-weight: 400;
  font-size: 20px;
  color: #ffffff;
  text-align: center;
  margin-bottom: 70px;
}

.routes {
  width: 830px;
  margin: 0px auto;
  margin-top: -100px;
}

.button {
  display: flex;
  justify-content: center;
  margin-top: 30px;
}

.add {
  font-size: 20px;
  line-height: 15px;
}
</style>
