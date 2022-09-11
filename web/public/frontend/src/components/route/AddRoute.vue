<template>
  <div class="addRoute">
    <UiInput
      v-model="params.number"
      class="input"
      type="text"
      placeholder="Номер маршрута"
    />
    <UiInput
      v-model="params.departurePlace"
      class="input"
      type="number"
      placeholder="Место отправления"
    />
    <UiInput
      v-model="params.arrivalPlace"
      class="input"
      type="number"
      placeholder="Место прибытия"
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
  </div>
</template>

<script>
import axios from "axios";
import UiInput from "../ui/UiInput.vue";
import UiButton from "../ui/UiButton.vue";

export default {
  name: "AddRoute",

  components: { UiInput, UiButton },

  data() {
    return {
      params: {},
    };
  },

  methods: {
    async addRoute() {
      const response = await axios.post(
        "http://localhost:8000/endpoints/addRoute.php",
        this.params
      );
      this.$emit("routeSent");
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
</style>
