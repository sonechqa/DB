<template>
  <div class="citySelect" v-click-outside="hideDropdown">
    <UiInput
      v-model="citySearch"
      type="text"
      :placeholder="placeholder"
      @input="showCities"
      @click="toggleDropdown"
    />

    <div class="cities" v-show="toggle && cities.length !== 0">
      <div
        v-for="(city, index) in cities"
        :key="index"
        class="city"
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
  background-color: #ffffff;
  width: 100%;
  padding: 5px 0px;
  margin-top: 5px;
  border-radius: 0px 0px 15px 15px;
}

.city {
  padding: 10px 20px;
  cursor: pointer;
  &:hover {
    background-color: #dee3ec;
  }
}

.city + .city {
  border-top: 1px solid #ccd4df;
}
</style>