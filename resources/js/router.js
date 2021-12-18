import { createRouter, createWebHistory } from 'vue-router'
import Home from './components/Home.vue';
import Dashboard from './components/Dashboard.vue';
import Logout from './components/Logout.vue';
import store from './index';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta:{
      requiresGuest:true,
    }
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component:Dashboard,
    meta:{
      requiresAuth:true,
    }
  },
  {
    path: '/logout',
    name: 'Logout',
    component:Logout
  },
 
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
})

router.beforeEach((to,from,next) => {
  if(to.matched.some(record => record.meta.requiresAuth)){
    if(!store.getters.isLoggedIn){
      next({
        path:'/',
      })
    }else{
      next()
    }
  }else if(to.matched.some(record => record.meta.requiresGuest)){
    if(store.getters.isLoggedIn){
      next({
        path:'/dashboard',
      })
    }else{
      next()
    }
  }
  else{
    next()
  }
})

export default router
