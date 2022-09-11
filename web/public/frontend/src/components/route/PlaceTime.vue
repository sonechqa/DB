<template>
  <div class="placeTime" :class="{ rightAlign: isRight }">
    <span class="date">
      {{ date }}
    </span>

    <span class="time">
      {{ time }}
    </span>

    <span class="place">
      {{ place }}
    </span>
  </div>
</template>

<script>
export default {
  name: "PlaceTime",
  components: {},

  props: {
    datetime: {
      type: String,
    },
    place: {
      type: String,
    },
    isRight: {
      type: Boolean,
    },
  },

  computed: {
    date() {
      return this.$dayjs(this.datetime).format("D MMM, dd");
    },

    time() {
      return this.$dayjs(this.datetime).format("HH:mm");
    },
  },
};
</script>

<style lang="scss" scoped>
span {
  display: block;
}

.placeTime {
  width: 110px;
}

.date {
  font-weight: 700;
  font-size: 14px;
  line-height: 15px;
  color: #7a818f;
  margin-bottom: 5px;
}

.time {
  font-weight: 500;
  font-size: 35px;
  line-height: 32px;
  color: #1f1f24;
  margin-bottom: 10px;
}

.place {
  font-weight: 500;
  font-size: 14px;
  line-height: 15px;
  color: #1f1f24;
}

.rightAlign {
  text-align: right;
}
</style>
