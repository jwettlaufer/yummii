<template>
  <div>
    <a href="#" v-if="isFavorited || isFavorite == true" @click.prevent="unFavorite(recipe)">
      <i class="fa fa-heart fa-lg" aria-hidden="true" style="color: red;"></i>
    </a>
    <a href="#" v-else @click.prevent="favorite(recipe)">
      <i class="fa fa-heart-o fa-lg" aria-hidden="false"></i>
    </a>
   <p class="pull-right">{{faveCount}}</p>
  </div>
</template>
<script>
export default {
  name: "favorite",
  props: ["recipe", "favorited"],
  data() {
    return {
      isFavorited: "",
      faveCount: ""
    };
  },
  mounted() {
    this.isLFavorited = this.isFavorite ? true : false;
    this.getFaveCount(this.recipe);
  },
  computed: {
    isFavorite() {
      return this.favorited;
    }
    
  },
  methods: {
    favorite(recipe) {
      axios
        .post("/yummii/public/favorite/" + recipe)
        .then(response => {this.isFavorited = true; this.getFaveCount(recipe)})
        .catch(response => console.log(response.data));
    },
    unFavorite(recipe) {
      axios
        .post("/yummii/public/unfavorite/" + recipe)
        .then(response => {this.isFavorited = false; this.getFaveCount(recipe)})
        .catch(response => console.log(response.data));
    },
    getFaveCount(recipe) {
      axios
        .get("/yummii/public/favorite/" + recipe)
        .then(response => (this.faveCount = response.data));
    }
  }
};
</script>
<style>
</style>