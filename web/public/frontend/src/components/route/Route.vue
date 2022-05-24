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
          {{ freePlaces }}
        </span>

        <span class="price">
          от
          {{ price }}
          Р
        </span>
      </div>

      <Button class="button">
        <span class="buy">Купить</span>
      </Button>
    </div>
  </div>
</template>

<script>
import PlaceTime from "./PlaceTime.vue";
import Button from "../ui/Button.vue";

export default {
  name: "Route",
  components: { PlaceTime, Button },

  props: {
    route: {
      type: Object,
    },
  },

  computed: {
    trainNumber() {
      return this.route.trainNumber;
    },

    trainCompany() {
      return this.route.trainCompany;
    },

    freePlaces() {
      return this.route.freePlaces;
    },

    price() {
      return this.route.price;
    },
  },
};
</script>

<style lang="scss" scoped>
.route {
  display: flex;
  background: white;
  border-radius: 15px;
  margin-bottom: 20px;
}

.place {
  display: flex;
  justify-content: space-between;
  width: 100%;
  padding: 70px 40px;

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
}

.buy {
  font-weight: 500;
  font-size: 16px;
  line-height: 15px;
  text-align: center;
  color: #ffffff;
}
</style>