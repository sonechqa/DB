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
    </div>
  </div>
</template>

<script>
import PlaceTime from "./PlaceTime.vue";

export default {
  name: "Route",
  components: { PlaceTime },

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
  padding: 95px 40px;

  img {
    max-width: 200px;
  }
}

.train {
  display: flex;
  align-items: center;
  padding: 30px 80px 190px 25px;
  border-left: solid 1px #ccd4df;
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
</style>