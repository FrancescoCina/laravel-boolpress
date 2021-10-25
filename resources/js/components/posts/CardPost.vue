<template>
  <div class="card">
    <img
      :src="post.image"
      class="p-3 img-fluid"
      :alt="post.title"
      width="100"
    />
    <div class="card-body">
      <small>{{ post.user.name }}</small>
      <h5 class="card-title">{{ post.title }}</h5>
      <h6>{{ post.category.name }}</h6>
      <span class="font-weight-bold">Tags: </span
      ><span v-for="tag in post.tags" :key="tag.id"> {{ tag.name }} </span>
      <p class="card-text">
        {{ post.content }}
      </p>
    </div>
  </div>
</template>

<script>
export default {
  name: "CardPost",
  props: ["post"],
  data() {
    return {};
  },
  methods: {},
  created() {},
};
</script>

<style>
</style>