<template>
  <Lotto />
</template>

<script>
import Lotto from "./components/Lotto.vue";

export default {
  name: "App",
  components: {
    Lotto
  }
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
