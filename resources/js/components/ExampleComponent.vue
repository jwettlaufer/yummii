<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Example Component</div>

          <div class="card-body">I'm an example component.</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "search",
  data: {
    recipes: [],
    loading: false,
    error: false,
    query: ""
  },
  methods: {
    search() {
      // Clear the error message.
      this.error = "";
      // Empty the recipes array so we can fill it with the new recipes.
      this.recipes = [];
      // Set the loading property to true, this will display the "Searching..." button.
      this.loading = true;

      // Making a get request to our API and passing the query to it.
      this.$http.get("/api/search?q=" + this.query).then(response => {
        // If there was an error set the error message, if not fill the recipes array.
        response.body.error
          ? (this.error = response.body.error)
          : (this.recipes = response.body);
        // The request is finished, change the loading to false again.
        this.loading = false;
        // Clear the query.
        this.query = "";
      });
    }
  }
};
</script>
