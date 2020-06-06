<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Ingredient Select</div>

          <div class="card-body">
            <div class="form-group">
              <label>Select Ingredients:</label>
              <select class="form-control" v-model="ingredient">
                <option value="0">Select Ingredient</option>
                <option
                  v-for="ingredient in ingredients"
                  :key="ingredient.id"
                  :value="ingredient.id"
                >{{ ingredient.ingredient }}</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ingredient-select",
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      ingredient: 0,
      ingredients: []
    };
  },
  methods: {
    getIngredients() {
      axios.get("/yummii/public/api/getIngredients").then(response => {
           this.ingredients = response.data;
        })
    },
  },
  created: function() {
    this.getIngredients();
  }
};
</script>