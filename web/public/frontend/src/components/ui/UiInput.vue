<template>
  <input
    class="input"
    :type="type"
    :placeholder="placeholder"
    v-model="inputValue"
    @click="onClick"
  />
</template>

<script>
export default {
  name: "UiInput",
  props: {
    value: {
      type: String,
      default: "",
    },
    placeholder: {
      type: String,
    },
    type: {
      type: String,
    },
  },

  computed: {
    inputValue: {
      get() {
        return this.value;
      },
      set(val) {
        this.$emit("input", val);
      },
    },
  },

  methods: {
    onClick(e) {
      this.$emit("click", e);
    },
  },
};
</script>

<style lang="scss" scoped>
.input {
  border-radius: 15px;
  border: none;
  font-weight: 500;
  font-size: 15px;
  line-height: 15px;
  color: #aeaeae;
  text-align: left;
  padding: 20px 15px;
}
</style>