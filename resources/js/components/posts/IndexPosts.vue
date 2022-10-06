<template>
  <div class="posts">
    <div class="container">
      <h4>Posts:</h4>
      <div v-if="isLoading" class="loader">
        <div class="spinner-grow text-info" role="status">
          <p>loading...</p>
        </div>
      </div>
      <div v-else>
        <div v-if="posts.length > 0" class="row justify-content-center list-posts">
          <CardPost v-for="post in posts" :key="post.id" :post="post"/>
        </div>
        <div v-else>
          <div v-if="errApi" class="alert alert-danger alert-dismissible fade show" role="alert">
            <span>{{errApi}}</span>
            <button type="button" class="close" @click="errApi = null">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <h5 v-else>Nessun Post</h5>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import CardPost from './CardPost';
  export default {
    name: "IndexPosts",
    components: { 
      CardPost 
    },
    data() {
        return {
          isLoading: false,
          posts: [],
          errApi: null,
        };
    },
    methods: {
        fetchPosts() {
          this.isLoading = true;
          axios.get("http://localhost:8000/api/posts")
              .then(res => {
              this.posts = res.data;
          })
              .catch(err => {
              console.log(err);
              this.errApi = 'Si è verificato un errore nella chiamata API';
          })
              .then(() => {
              this.isLoading = false;
              console.log("Chiamata Terminata");
          });
        }
    },
    mounted() {
        this.fetchPosts();
    },
};
</script>

<style lang="scss" scoped>
  .loader {
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    position: fixed;
    z-index: 9;
    background-color: rgba(125, 125, 125, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    .spinner-grow {
      width: 150px;
      height: 150px;
      display: flex;
      justify-content: center;
      align-items: center;
      p {
        color: black;
        font-size: 25px;
      }
    }
  }
</style>>