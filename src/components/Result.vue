<template>
  <div class="result" v-if="result">
    <div v-for="(gameResult, index) in result" :key="index">
      {{ index + 1 }}) {{ new Date(gameResult.drawDate).toLocaleDateString() }} -
      {{ gameResult.results[0].resultsJson.toString() }}
      <b>{{ gameResult.results[0].specialResults.toString() }}</b>
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
      let that = this;
      return await axios
        .get(`http://lotto.wachcio.pl/API/lotto.php`, {
          params: {
            game: this.game,
            index: 1,
            size: this.gamesNumber,
            sort: "drawDate",
            order: "DESC"
          }
        })
        .then(function(response) {
          // console.log(response.data);
          // console.log(that.result);

          that.result = response.data.items;
          // return response.data;
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
      this.getData();
    },
    gamesNumber: function() {
      this.getData();
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
