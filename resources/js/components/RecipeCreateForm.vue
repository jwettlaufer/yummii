<template>
  <form :action="submissionUrl" method="POST">
    <slot></slot>
    <div v-if="isGif" class="form-group">
      <div>
        <img :src="message" />
        <button class="btn btn-warning" @click="resetMessage">Reset</button>
        <input type="hidden" name="message" v-model="message" />
        <input type="hidden" name="is_gif" :value="isGif" />
      </div>
    </div>
    <div v-else class="form-group">
      <label for="message">
        <textarea class="form-control" name="message" id="message" rows="5" cols="60" v-model="message"></textarea>
      </label>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-warning" value="Create Post" />
    </div>
  </form>
</template>

<script>
export default {
  name: "recipe-create-form",
  props: ["submissionUrl"],
  computed: {
    message: {
      get() {
        this.isStringAGIFUrl(this.$attrs.value);
        return this.$attrs.value;
      },
      set(value) {
        this.$emit("input", value);
      }
    }
  }
}
</script>