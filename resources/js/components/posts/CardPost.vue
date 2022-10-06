<template>
  <div>
    <div class="card mb-3">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img style="width: 270px;" :src="post.image" :alt="post.slug">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="card-title">{{ post.title }}</h5>
              <router-link :to="{name: 'post-detail', params:{ id : post.id }}"
              class="btn btn-primary btn-sm">
                Vedi
              </router-link>
            </div>
            <h5 class="card-subtitle mb-2 text-muted">{{ publishedAt }}</h5>
            <p class="card-text">{{ post.content }}</p>
            <p class="card-text"><small class="text-muted">Last updated {{ UpdatedAt }}</small></p>
            <p class="card-text"><small class="text-muted">Author: {{ post.user.name }}</small></p>
            <span :class="`badge badge-${post.category ? post.category.color : 'light' }`">
              {{post.category ? post.category.label : 'Nessuna'}}
            </span>
            <span v-for="tag in post.tags" :key="tag.id" class="badge badge-pill" :style="`background-color:${tag ? tag.color : 'light'}`">
              {{tag ? tag.label : 'Nessuna'}}
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'CardPost',
  props: {
    post : Object,
  },
  computed: {
    publishedAt(){
      const date = new Date(this.post.created_at);
      let day = date.getDate();
      let month = date.getMonth();
      let year = date.getFullYear();

      return `${day}/${month}/${year}`;
    },
    UpdatedAt(){
      const date = new Date(this.post.updated_at);
      let day = date.getDate();
      let month = date.getMonth();
      let year = date.getFullYear();

      return `${day}/${month}/${year}`;
    }
  }
}
</script>

<style>

</style>