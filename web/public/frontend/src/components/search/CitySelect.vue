<template>
  <div class="citySelect" v-click-outside="hideDropdown">
    <UiInput
      type="text"
      :placeholder="placeholder"
      v-model="citySearch"
      @input="showCities"
      @click="toggleDropdown"
    />

    <div class="cities" v-show="toggle">
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
import clickOutside from "v-click-outside";
import UiInput from "../ui/UiInput.vue";

export default {
  name: "CitySelect",

  components: { UiInput },
  directives: {
    clickOutside: clickOutside.directive,
  },

  props: {
    placeholder: {
      type: String,
    },
  },

  data() {
    return {
      citySearch: "",
      cities: [],
      toggle: false,
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
      this.hideDropdown();
    },

    toggleDropdown() {
      this.toggle = !this.toggle;
    },

    hideDropdown() {
      this.toggle = false;
    },
  },
};
</script>

<style lang="scss" scoped>
.citySelect {
  position: relative;
}

.cities {
  position: absolute;
}
</style>