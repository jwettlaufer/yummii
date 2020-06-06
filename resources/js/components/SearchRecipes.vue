<template>
  <div>
    <input type="text" placeholder="Search" v-model="query" />
    <ul v-if="results.length > 0 && query">
      <li v-for="result in results.slice(0,10)" :key="result.id">
        <a :href="result.url">
          <div v-text="result.title"></div>
        </a>
      </li>
    </ul>
  </div>
</template>
<script>
export default {
  name: "search-recipes",
  data() {
    return {
      query: null,
      results: []
    };
  },
  watch: {
    query(after, before) {
      this.searchRecipes();
    }
  },
  methods: {
    searchRecipes() {
      axios
        .get("recipes/search", { params: { query: this.query } })
        .then(response => (this.results = response.data))
        .catch(error => {});
    }
  }
};
</script>
<script>
export default {};
</script>