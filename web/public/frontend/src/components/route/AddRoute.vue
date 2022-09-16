<template>
  <div class="addRoute">
    <UiInput
      v-model="params.number"
      class="input"
      type="text"
      placeholder="Номер маршрута"
    />

    <CitySelect
      class="desiredCity"
      placeholder="Откуда"
      @cityChoose="fromCitySave"
    />

    <CitySelect
      class="desiredCity"
      placeholder="Куда"
      @cityChoose="toCitySave"
    />

    <UiInput
      v-model="params.departureTime"
      class="input"
      type="datetime-local"
      placeholder="Время отправления"
    />

    <UiInput
      v-model="params.arrivalTime"
      class="input"
      type="datetime-local"
      placeholder="Время прибытия"
    />

    <UiInput
      v-model="params.trainNumber"
      class="input"
      type="number"
      placeholder="Поезд"
    />

    <UiInput
      v-model="params.freeSpaces"
      class="input"
      type="number"
      placeholder="Свободные места"
    />

    <UiInput
      v-model="params.price"
      class="input"
      type="number"
      placeholder="Цена"
    />

    <UiButton class="button" @click="addRoute">Отправить</UiButton>

    <div v-html="error"></div>
  </div>
</template>

<script>
import axios from "axios";
import UiInput from "../ui/UiInput.vue";
import CitySelect from "../search/CitySelect.vue";
import UiButton from "../ui/UiButton.vue";

export default {
  name: "AddRoute",

  components: { UiInput, CitySelect, UiButton },

  data() {
    return {
      params: {},
      fromCityId: "",
      toCityId: "",
      error: "",
    };
  },

  methods: {
    async addRoute() {
      console.log(this.params);
      const { data } = await axios.post(
        "http://localhost:8000/endpoints/addRoute.php",
        this.params
      );
      console.log(data);

      const isDataError = typeof data === "string";

      if (isDataError) this.error = data;
      else this.$emit("routeSent");
    },

    fromCitySave(fromCityId) {
      this.params.departurePlace = fromCityId;
    },

    toCitySave(toCityId) {
      this.params.arrivalPlace = toCityId;
    },
  },
};
</script>

<style lang="scss" scoped>
.addRoute {
  display: flex;
  flex-direction: column;
  max-width: 300px;
  margin: auto;
  margin-top: 20px;
}

.input {
  margin-bottom: 10px;
}

.button {
  font-size: 20px;
}

.desiredCity {
  margin-bottom: 10px;
}
</style>

<style lang="scss">
.addRoute {
  .desiredCity input {
    width: 300px;
  }
}
</style>
