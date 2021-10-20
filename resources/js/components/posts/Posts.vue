<template>
  <section class="my-5">
    <h2>La lista dei posts</h2>
    <CardPost v-for="post in posts" :key="post.id" :post="post" />

    <div class="page-navigator mt-5">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a
              v-if="pagePosts > 1"
              class="page-link"
              @click="getAllPostsFromApi(pagePosts - 1)"
              >Previous</a
            >
          </li>
          <li v-for="i in 5" :key="i" class="page-item">
            <a @click="getAllPostsFromApi((pagePosts = i))" class="page-link">{{
              i
            }}</a>
          </li>

          <li v-if="pagePosts !== lastPagePosts" class="page-item">
            <a class="page-link" @click="getAllPostsFromApi(pagePosts + 1)"
              >Next</a
            >
          </li>
        </ul>
      </nav>
    </div>
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
      pagePosts: 1,
      lastPagePosts: "",
    };
  },
  methods: {
    getAllPostsFromApi(page) {
      axios.get(`${this.baseUri}/api/posts?page=${page}`).then((res) => {
        //   const { data, current_page, last_page } = res.data.posts;
        this.posts = res.data.posts.data;
        this.pagePosts = res.data.posts.current_page;
        this.lastPagePosts = res.data.posts.last_page;
        console.log(this.posts);
      });
    },
  },
  created() {
    this.getAllPostsFromApi(this.pagePosts);
  },
};
</script>


<style scoped lang="scss">
.page-item .page-link {
  cursor: pointer;
}
</style>