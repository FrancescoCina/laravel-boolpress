<template>
  <div class="card">
    <img
      :src="post.image"
      class="p-3 img-fluid"
      :alt="post.title"
      width="100"
    />
    <div class="card-body">
      <small>{{ post.id }}</small>
      <h5 class="card-title">{{ post.title }}</h5>
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
};
</script>

<style>
</style>