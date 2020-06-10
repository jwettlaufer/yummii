<template>
  <div class="form-group">
    <label>Select Categories:</label>
    <br />
    <select v-model="selectCat" name="categories[]" id="cat-select" multiple="multiple">
      <option
        v-for="category in categories"
        :value="category.id"
        :key="category.id"
      >{{ category.category }}</option>
    </select>
  </div>
</template>

<script>
export default {
  name: "select-categories",
  props: ["options", "value"],
  data() {
    return {
      selectCat: [],
      categories: []
    };
  },
  mounted() {
    var vm = this;
    this.getCategories();
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
    getCategories() {
      axios
        .get("/yummii/public/api/getCategories")
        .then(response => {
          this.categories = response.data;
          console.log(this.categories);
        })
        .then(response => {
          $("#cat-select").select2();
        });
    },
    watch: {
      value: function(value) {
        // update value
        $("#cat-select")
          .val(value)
          .trigger("change");
      },
      options: function(options) {
        // update options
        $("#cat-select")
          .empty()
          .select2({ data: categories });
      }
    },
    destroyed: function() {
      $("#cat-select")
        .off()
        .select2("destroy");
    }
  }
};
</script>

<style scoped>
</style>