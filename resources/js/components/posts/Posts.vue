<template>
  <section class="my-5">
    <!--  LOADER -->

    <Loader v-if="isLoading" :isLoading="isLoading" />

    <!-- --------------------------- -->

    <!-- POSTS LIST -->

    <div v-else>
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
            <li
              v-for="i in 5"
              :key="i"
              class="page-item"
              :class="pagePosts === i ? 'active' : ''"
            >
              <a
                @click="getAllPostsFromApi((pagePosts = i))"
                class="page-link"
                >{{ i }}</a
              >
            </li>
            <li v-if="pagePosts !== lastPagePosts" class="page-item">
              <a class="page-link" @click="getAllPostsFromApi(pagePosts + 1)"
                >Next</a
              >
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </section>
</template>

<script>
import CardPost from "./CardPost.vue";
import Loader from "../Loader.vue";

export default {
  name: "Posts",
  components: {
    CardPost,
    Loader,
  },
  data() {
    return {
      baseUri: "http://127.0.0.1:8000",
      posts: [],
      pagePosts: 1,
      lastPagePosts: "",
      isLoading: false,
    };
  },
  methods: {
    getAllPostsFromApi(page) {
      this.isLoading = true;
      axios.get(`${this.baseUri}/api/posts?page=${page}`).then((res) => {
        //   const { data, current_page, last_page } = res.data.posts;
        this.posts = res.data.posts.data;
        this.pagePosts = res.data.posts.current_page;
        this.lastPagePosts = res.data.posts.last_page;
        console.log(this.posts);
        this.isLoading = false;
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