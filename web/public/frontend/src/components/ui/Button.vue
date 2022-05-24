<template>
  <button class="button"><slot></slot></button>
</template>

<script>
export default {
  name: "Button",
  components: {},
};
</script>

<style lang="scss" scoped>
.button {
  width: 145px;
  height: 50px;
  background: #2060ff;
  border-radius: 10px;
  border: none;
  cursor: pointer;
}
</style>