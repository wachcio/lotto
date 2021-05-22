<template>
  <div>
    <div>
      <form>
        <label for="game">Wybierz grę z której chcesz poznać wyniki:</label>
        <select id="game" name="game" v-model="gameSelect">
          <option v-for="game in games" :key="game.id">{{ game }}</option>
        </select>
        <label for="gamesNumber">Wybierz liczbę ostatnich losowań (10-1000):</label>
        <input
          type="number"
          id="gamesNumber"
          name="gamesNumber"
          min="10"
          max="1000"
          v-model="gamesNumber"
        />
      </form>
    </div>
    <Result :game="gameSelect" :gamesNumber="gamesNumber" />
  </div>
</template>

<script>
import Result from "./Result.vue";

export default {
  name: "Lotto",
  props: {},
  data() {
    return {
      games: [
        "Lotto",
        "Eurojackpot",
        "Keno",
        "Szybkie600",
        "MultiMulti",
        "EkstraPensja",
        "Mini Lotto",
        "Kaskada",
        "SuperSzansa"
      ],
      gameSelect: "Lotto",
      gamesNumber: 10
    };
  },
  components: {
    Result
  },
  methods: {},
  computed: {},
  created() {},
  watch: {}
};
</script>

<style lang="scss" scoped></style>
