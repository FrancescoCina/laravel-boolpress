<template>
  <div class="loader d-flex justify-content-center align-items-center">
    <div class="spinner-border text-warning" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
</template>

<script>
export default {
  name: "Loader",
  props: ["isLoading"],
};
</script>

<style scoped lang="scss">
.loader {
  background-color: rgba($color: #000000, $alpha: 0.4);
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  .spinner-border {
    width: 250px;
    height: 250px;
  }
}
</style>