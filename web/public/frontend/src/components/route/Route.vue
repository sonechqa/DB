<template>
  <div class="route">
    <div class="place">
      <PlaceTime
        :datetime="route.departureTime"
        :place="route.fromStationName"
      />

      <img src="../../assets/arrow.svg" alt="Стрелка вправо" />

      <PlaceTime
        :datetime="route.arrivalTime"
        :place="route.toStationName"
        :isRight="true"
      />
    </div>

    <div class="info">
      <div class="train">
        <img src="../../assets/train.png" alt="Поезд" />

        <span class="number">
          {{ trainNumber }}
        </span>

        <span class="company">
          {{ trainCompany }}
        </span>
      </div>

      <div class="seats">
        <span class="heading"> Места </span>

        <span class="free">
          {{ freeSpaces }}
        </span>

        <span class="price">
          от
          {{ price }}
          Р
        </span>
      </div>

      <UiButton class="button" @click="ticketSold" v-if="button">
        Купить
      </UiButton>

      <p class="lastName" v-else>{{ surname }}</p>
    </div>
  </div>
</template>

<script>
import PlaceTime from "./PlaceTime.vue";
import UiButton from "../ui/UiButton.vue";
import axios from "axios";

export default {
  name: "Route",
  components: { PlaceTime, UiButton },

  props: {
    route: {
      type: Object,
    },

    button: {
      type: Boolean,
      default: true,
    },
  },

  computed: {
    trainNumber() {
      return this.route.trainNumber;
    },

    trainCompany() {
      return this.route.trainCompany;
    },

    freeSpaces() {
      return this.route.freeSpaces;
    },

    price() {
      return this.route.price;
    },

    surname() {
      return this.route.surname;
    },
  },

  methods: {
    async ticketSold() {
      const surname = window.prompt("Введите вашу фамилию", "Фамилия");
      await axios.get("http://localhost:8000/endpoints/addTicket.php", {
        params: {
          id: this.route.id,
          surname,
        },
      });
      this.$emit("submit");
    },
  },
};
</script>

<style lang="scss" scoped>
.route {
  display: flex;
  background: #ffffff;
  border-radius: 15px;
  margin-bottom: 20px;
  align-items: center;
}

.place {
  display: flex;
  justify-content: space-between;
  width: 100%;
  padding-right: 40px;
  padding-left: 40px;

  img {
    max-width: 200px;
    margin-bottom: 15px;
  }
}

.info {
  display: flex;
  flex-direction: column;
  border-left: solid 1px #ccd4df;
  padding: 20px 20px;
  min-height: 200px;
}

.train {
  display: flex;
  align-items: center;
  min-width: 265px;
}

.number {
  margin-left: 20px;
  margin-right: 15px;
  position: relative;

  &::before {
    content: "";
    position: absolute;
    width: 5px;
    height: 5px;
    border-radius: 50%;
    right: -10px;
    top: 50%;
    transform: translate(0, -50%);
    background-color: #2060ff;
  }
}

.seats {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
}

.heading {
  font-weight: 500;
  font-size: 14px;
  line-height: 15px;
  color: #232328;
}

.free {
  font-weight: 500;
  font-size: 14px;
  line-height: 15px;
  color: #818794;
}

.price {
  font-weight: 500;
  font-size: 14px;
  line-height: 15px;
  color: #2060ff;
}

.button {
  margin-top: auto;
  border-radius: 10px;
  padding: 15px 45px;
  max-width: 145px;
  font-weight: 500;
  font-size: 16px;
  line-height: 15px;
  text-align: center;
  color: #ffffff;
}

.lastName {
  font-size: 18px;
  margin-top: 30px;
}
</style>
