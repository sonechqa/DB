<template>
  <button class="button" @click="onClick"><slot></slot></button>
</template>

<script>
export default {
  name: "Button",
  components: {},

  methods: {
    onClick(e) {
      this.$emit("click", e);
    },
  },
};
</script>

<style lang="scss" scoped>
.button {
  background: #2060ff;
  border: none;
  border-radius: 10px;
  padding: 15px 45px;
  cursor: pointer;
  color: #ffffff;
}
</style>