<template>
  <div>
    <div>
      <form v-on:submit.prevent="">
        <div class="form">
          <label for="game">Wybierz grę z której chcesz poznać wyniki: </label>
          <select id="game" name="game" v-model="gameSelect">
            <option v-for="game in games" :key="game.id">
              {{ game.name }}
            </option>
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
        { name: "Lotto", url: "https://www.lotto.pl/cdn/img/gra_Lotto.d042cbc.svg" },
        { name: "LottoPlus", url: "https://www.lotto.pl/cdn/img/gra_Lotto.d042cbc.svg" },
        { name: "Keno", url: "https://www.lotto.pl/cdn/img/gra_Keno.641adc3.svg" },
        { name: "Szybkie600", url: "https://www.lotto.pl/cdn/img/gra_Szybkie600.830c863.svg" },
        { name: "MultiMulti", url: "https://www.lotto.pl/cdn/img/gra_MultiMulti.1c311b9.svg" },
        { name: "EkstraPensja", url: "https://www.lotto.pl/cdn/img/gra_EkstraPensja.a7dfa68.svg" },
        { name: "EkstraPremia", url: "https://www.lotto.pl/cdn/img/gra_EkstraPensja.a7dfa68.svg" },
        { name: "MiniLotto", url: "https://www.lotto.pl/cdn/img/gra_MiniLotto.58cdcf2.svg" },
        { name: "Kaskada", url: "https://www.lotto.pl/cdn/img/gra_Kaskada.0146a95.svg" },
        { name: "SuperSzansa", url: "https://www.lotto.pl/cdn/img/gra_SuperSzansa.f25e623.svg" }
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
/* option {
  background: #c3c3c3 url("https://www.lotto.pl/cdn/img/gra_Lotto.d042cbc.svg") repeat-x 0 0;
} */
</style>
