import Vue from 'vue'
import VueRouter from 'vue-router'

import HomePage from './components/pages/HomePage.vue'
import AboutPage from './components/pages/AboutPage.vue'
import PostDetailPage from './components/pages/PostDetailPage.vue'

Vue.use(VueRouter)

const routes = new VueRouter({
  mode: 'history',
  linkExactActiveClass: 'active',
  routes:[
    {path: '/',component: HomePage , name:'home'},
    {path: '/about',component: AboutPage ,name:'about'},
    {path: '/post/:id',component: PostDetailPage ,name:'post-detail'},
  ]
});
export default routes;