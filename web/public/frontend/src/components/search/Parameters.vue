<template>
  <div class="parameters">
    <CitySelect
      class="fromCity"
      placeholder="Откуда"
      @cityChoose="fromCitySave"
    />
    <CitySelect class="toCity" placeholder="Куда" @cityChoose="toCitySave" />
    <UiInput class="date" type="date" v-model="date" />
    <UiInput
      class="passengers"
      type="text"
      placeholder="Количество пассажиров"
      v-model="passengers"
    />
    <UiButton class="find" @click="onSubmit">Найти билеты</UiButton>
  </div>
</template>

<script>
import CitySelect from "./CitySelect.vue";
import UiButton from "../ui/UiButton.vue";
import UiInput from "../ui/UiInput.vue";

export default {
  name: "Parameters",

  components: { CitySelect, UiButton, UiInput },

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
.parameters {
  display: flex;
  justify-content: space-between;
  width: 1050px;
  margin: 0 auto;
}

.find {
  background-color: #ff5f00;
  border-radius: 15px;
  font-size: 20px;
  line-height: 15px;
  padding: 20px 25px;
}

.date {
  border-radius: 0;
  width: 205px;
}

.passengers {
  border-radius: 0px 15px 15px 0px;
  width: 205px;
}
</style>

<style lang="scss">
.fromCity input {
  border-radius: 15px 0px 0px 15px !important;
  width: 205px;
}

.toCity input {
  border-radius: 0 !important;
  width: 205px;
}
</style>
