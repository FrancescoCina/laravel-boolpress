<template>
  <section class="my-5">
    <h2>La lista dei posts</h2>
    <CardPost v-for="post in posts" :key="post.id" :post="post" />
  </section>
</template>

<script>
import axios from "axios";
import CardPost from "./CardPost.vue";

export default {
  name: "Posts",
  components: {
    CardPost,
  },
  data() {
    return {
      baseUri: "http://127.0.0.1:8000",
      posts: [],
    };
  },
  methods: {
    getAllPostsFromApi() {
      axios.get(`${this.baseUri}/api/posts`).then((res) => {
        this.posts = res.data.posts;
        console.log(this.posts);
      });
    },
  },
  created() {
    this.getAllPostsFromApi();
  },
};
</script>

<style>
</style>