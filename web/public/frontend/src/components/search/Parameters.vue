<template>
  <div class="parameters">
    <input type="date" v-model="date" />
    <input
      type="text"
      placeholder="Количество пассажиров"
      v-model="passengers"
    />
    <button @click="onSumbit">Найти билеты</button>
  </div>
</template>

<script>
export default {
  name: "Parameters",

  components: {},

  data() {
    return {
      date: " ",
      passengers: 1,
    };
  },

  methods: {
    onSumbit() {
      this.$emit("submit", { date: this.date, passengers: this.passengers });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>