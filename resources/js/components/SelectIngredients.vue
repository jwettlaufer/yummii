<template>
  <div class="form-group">
    <label>Select Ingredients:</label>
    <br />
    <select v-model="selectIng" name="ingredients[]" id="ing-select" multiple="multiple">
      <option
        v-for="ingredient in ingredients"
        :value="ingredient.id"
        :key="ingredient.id"
      >{{ ingredient.ingredient }}</option>
    </select>
  </div>
</template>

<script>
export default {
  name: "select-ingredients",
  props: ["options", "value"],
  data() {
    return {
      selectIng: [],
      ingredients: []
    };
  },
  mounted() {
    var vm = this;
    this.getIngredients();
    $("#ing-select")
      // init select2
      .select2()
      .val(this.value)
      .trigger("change")
      // emit event on change.
      .on("change", function() {
        vm.$emit("input", this.value);
      });
  },
  methods: {
    getIngredients() {
      axios
        .get("/yummii/public/api/getIngredients")
        .then(response => {
          this.ingredients = response.data;
          console.log(this.ingredients);
        })
        .then(response => {
          $("#ing-select").select2();
        });
    },
    watch: {
      value: function(value) {
        // update value
        $("#ing-select")
          .val(value)
          .trigger("change");
      },
      options: function(options) {
        // update options
        $("#ing-select")
          .empty()
          .select2({ data: ingredients });
      }
    },
    destroyed: function() {
      $("#ing-select")
        .off()
        .select2("destroy");
    }
  }
};
</script>

<style scoped>
</style>