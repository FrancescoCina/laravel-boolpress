<template>
  <section class="my-5">
    <!--  LOADER -->

    <Loader v-if="isLoading" :isLoading="isLoading" />

    <!-- --------------------------- -->

    <!-- POSTS LIST -->

    <div v-else class="mb-5">
      <h2>La lista dei post</h2>
      <div class="order-controls">
        <p
          class="clickable font-weight-bold"
          @click="changeOrderToAsc"
          v-if="order === 'desc'"
        >
          Giù
        </p>
        <p
          class="clickable font-weight-bold"
          @click="changeOrderToDesc"
          v-if="order === 'asc'"
        >
          Su
        </p>
      </div>

      <PageNavigator
        @changePageEvent="changePage"
        :pagePosts="pagePosts"
        :lastPagePosts="lastPagePosts"
      />
      <CardPost v-for="post in posts" :key="post.id" :post="post" />

      <PageNavigator
        @changePageEvent="changePage"
        :pagePosts="pagePosts"
        :lastPagePosts="lastPagePosts"
      />
    </div>
  </section>
</template>

<script>
import CardPost from "./CardPost.vue";
import Loader from "../Loader.vue";
import PageNavigator from "../PageNavigator.vue";

export default {
  name: "Posts",
  components: {
    CardPost,
    Loader,
    PageNavigator,
  },
  data() {
    return {
      baseUri: "http://127.0.0.1:8000",
      posts: [],
      pagePosts: 1,
      lastPagePosts: "",
      isLoading: false,
      order: "desc",
    };
  },
  methods: {
    getAllPostsFromApi(page) {
      this.isLoading = true;
      axios
        .get(`${this.baseUri}/api/posts?page=${page}&order=${this.order}`)
        .then((res) => {
          //   const { data, current_page, last_page } = res.data.posts;
          this.posts = res.data.posts.data;
          this.pagePosts = res.data.posts.current_page;
          this.lastPagePosts = res.data.posts.last_page;
          console.log(this.posts);
          this.isLoading = false;
        });
    },
    changePage(page) {
      this.getAllPostsFromApi(page);
    },
    changeOrderToAsc() {
      this.order = "asc";
      this.getAllPostsFromApi(this.pagePosts);
    },
    changeOrderToDesc() {
      this.order = "desc";
      this.getAllPostsFromApi(this.pagePosts);
    },
  },
  created() {
    this.getAllPostsFromApi(this.pagePosts);
  },
};
</script>


<style scoped lang="scss">
.clickable {
  cursor: pointer;
}
</style>