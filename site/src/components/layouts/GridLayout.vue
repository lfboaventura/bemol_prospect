<template>
  <div :class="'col s' + size || '2'" style="background-color: white">
    <p>
      <slot></slot>
    </p>
  </div>
</template>

<script>
export default {
  name: "GridLayouyt",
  props: ["size"],
  data() {
    return {};
  },
};
</script>


<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
