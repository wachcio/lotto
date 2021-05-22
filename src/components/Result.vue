<template>
  <div class="result" v-if="result">
    <div v-for="gameResult in result.gameResult" :key="gameResult.drawId">
      <!-- <tr>
                <td>
                    {{ new Date(gameResult.drawDate).toLocaleDateString() }}
                </td>
                <td>{{ gameResult.winnerNumber[0].number }}</td>
                <td>{{ gameResult.winnerNumber[1].number }}</td>
                <td>{{ gameResult.winnerNumber[2].number }}</td>
                <td>{{ gameResult.winnerNumber[3].number }}</td>
                <td>{{ gameResult.winnerNumber[4].number }}</td>
                <td>{{ gameResult.winnerNumber[5].number }}</td>
                <td>{{ gameResult.winnerNumber[6].number }}</td>
            </tr> -->
      {{ new Date(gameResult.drawDate).toLocaleDateString() }} -
      {{ sortData(gameResult.winnerNumber) }}
      <b>{{ gameResult.winnerNumber[6].number }}</b>
    </div>
  </div>
</template>

<script>
const axios = require("axios");

export default {
  name: "Result",
  props: {
    game: String,
    gamesNumber: Number
  },
  data() {
    return {
      result: null
    };
  },
  methods: {
    async getData() {
      return await axios
        .get(`https://www.lotto.pl/api/lotteries/draw-results/by-gametype`, {
          params: {
            game: this.game,
            index: 1,
            size: this.gamesNumber,
            sort: "drawDate",
            order: "DESC"
          },
          headers: {
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Methods": "GET, POST, PATCH, PUT, DELETE, OPTIONS",
            // "Access-Control-Allow-Headers": "Origin, Content-Type, X-Auth-Token",
            "Content-Type": "application/json;charset=utf-8"
          }
        })
        .then(function(response) {
          console.log(response.data);
          console.log(this.result);

          this.result = response.data;
          // return response;
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    sortData: item => {
      let numbers = [];

      item.forEach(i => {
        if (i.type == 1) {
          numbers.push(i.number);
        }
      });
      return numbers.sort((a, b) => a - b).toString();
    }
  },
  watch: {
    game: function() {
      this.result = this.getData();
    },
    gamesNumber: function() {
      this.result = this.getData();
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
p,
.result {
  margin: 0;
  padding: 0;
  font-size: 25px;
  font-family: Arial, Helvetica, sans-serif;
}
p {
  padding: 0.3em 0;
  border-bottom: #555 solid 2px;
}
/* p:nth-child(2n) {
    border-bottom: #555 solid 2px;
    border-top: #555 solid 2px;
} */
/* p:nth-child(2n) {
    color: aliceblue;
    background-color: #000;
} */
</style>
