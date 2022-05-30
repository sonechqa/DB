<template>
  <div class="citySelect">
    <input
      type="text"
      :placeholder="placeholder"
      v-model="citySearch"
      @input="showCities"
    />

    <div class="cities">
      <div
        class="city"
        v-for="(city, index) in cities"
        :key="index"
        @click="cityChoice(city)"
      >
        {{ city.name }}
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "CitySelect",

  components: {},

  props: {
    placeholder: {
      type: String,
    },
  },

  data() {
    return {
      citySearch: "",
      cities: [],
    };
  },

  methods: {
    async showCities() {
      const response = await axios.get(
        "http://localhost:8000/endpoints/getCities.php",
        {
          params: {
            citySearch: this.citySearch,
          },
        }
      );
      this.cities = response.data;
    },

    cityChoice(city) {
      this.citySearch = city.name;
      this.$emit("cityChoose", city.id);
    },
  },
};
</script>

<style lang="scss" scoped>
</style>