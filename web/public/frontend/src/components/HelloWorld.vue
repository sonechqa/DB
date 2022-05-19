<template>
  <div class="hello">
    {{ msg }}
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "HelloWorld",
  props: {
    msg: String,
  },
  async mounted() {
    const { data } = await axios.post('http://localhost:8000/endpoints/getFirstBook.php');
    this.msg = data;
  }
};
</script>

<style scoped lang="scss">
</style>
