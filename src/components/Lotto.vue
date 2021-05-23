<template>
  <div>
    <div>
      <form v-on:submit.prevent="">
        <div class="form">
          <label for="game">Wybierz grę z której chcesz poznać wyniki: </label>
          <select id="game" name="game" v-model="gameSelect">
            <option v-for="game in games" :key="game.id">{{ game }}</option>
          </select>
        </div>
        <div class="form">
          <label for="gamesNumber">Wybierz liczbę ostatnich losowań (1-10000): </label>
          <input
            type="number"
            id="gamesNumber"
            name="gamesNumber"
            min="1"
            max="10000"
            v-model="gamesNumber"
          />
        </div>
      </form>
    </div>
    <Result :game="gameSelect" :gamesNumber="Number(gamesNumber)" />
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
        "LottoPlus",
        "Keno",
        "Szybkie600",
        "MultiMulti",
        "EkstraPensja",
        "EkstraPremia",
        "MiniLotto",
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

<style lang="scss" scoped>
form,
select,
input,
label,
.form {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 0;
  padding: 0;
  font-size: 25px;
  font-family: Arial, Helvetica, sans-serif;
}
form {
  padding-bottom: 1rem;
}
.form {
  flex-direction: row;
}
label {
  padding-right: 0.5rem;
}
</style>
