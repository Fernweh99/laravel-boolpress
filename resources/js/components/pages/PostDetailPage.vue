<template>
  <div class="post container">
    <CardPost :post="post"/>
  </div>
</template>

<script>
import Axios from 'axios';
import CardPost from '../posts/CardPost.vue';

export default {
    name: "PostDetailPage",
    components: { 
      CardPost
    },
    data() {
      return {
        post: [],
      };
    },
    methods: {
      fetchPost() {
        Axios.get("http://localhost:8000/api/posts/"+ this.$route.params.id).then(res => {
          this.post = res.data;
        }).catch(err => {
          console.error(err);
        }).then(() => {
          console.log("chiamata terminata!");
        });
      }
    },
    mounted(){
      this.fetchPost();
    }
}
</script>

<style>

</style>