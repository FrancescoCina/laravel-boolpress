<template>
  <div class="page-navigator mt-5">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <a
            v-if="pagePosts > 1"
            class="page-link"
            @click="$emit('changePageEvent', pagePosts - 1)"
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
            @click="$emit('changePageEvent', (pagePosts = i))"
            class="page-link"
            >{{ i }}</a
          >
        </li>
        <li v-if="pagePosts !== lastPagePosts" class="page-item">
          <a class="page-link" @click="$emit('changePageEvent', pagePosts + 1)"
            >Next</a
          >
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default {
  name: "PageNavigator",
  props: ["pagePosts", "lastPagePosts"],
};
</script>

<style scoped lang="scss">
.page-item .page-link {
  cursor: pointer;
}
</style>