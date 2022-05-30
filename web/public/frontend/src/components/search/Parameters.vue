<template>
  <div class="parameters">
    <CitySelect placeholder="Откуда" @cityChoose="fromCitySave" />
    <CitySelect placeholder="Куда" @cityChoose="toCitySave" />
    <input type="date" v-model="date" />
    <input
      type="text"
      placeholder="Количество пассажиров"
      v-model="passengers"
    />
    <button @click="onSubmit">Найти билеты</button>
  </div>
</template>

<script>
import CitySelect from "./CitySelect.vue";
export default {
  name: "Parameters",

  components: { CitySelect },

  data() {
    return {
      date: "",
      passengers: 1,
      fromCityId: "",
      toCityId: "",
    };
  },

  methods: {
    onSubmit() {
      this.$emit("submit", {
        date: this.date,
        passengers: this.passengers,
        fromCityId: this.fromCityId,
        toCityId: this.toCityId,
      });
    },

    fromCitySave(fromCityId) {
      this.fromCityId = fromCityId;
    },

    toCitySave(toCityId) {
      this.toCityId = toCityId;
    },
  },
};
</script>

<style lang="scss" scoped>
</style>