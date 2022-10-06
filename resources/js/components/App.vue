<template>
  <div class="content">
    <AppHeader/>
    <main>
      <router-view></router-view>
    </main>
  </div>
</template>

<script>
import AppHeader from './AppHeader';
  export default {
    name: "App",
    components: {
    AppHeader,
},
};
</script>

<style lang="scss">
  main {
    padding: 50px 0;
  }
</style>