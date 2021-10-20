<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <main><Posts /></main>
      </div>
    </div>
  </div>
</template>

<script>
import Posts from "./posts/Posts.vue";
export default {
  components: {
    Posts,
  },
};
</script>