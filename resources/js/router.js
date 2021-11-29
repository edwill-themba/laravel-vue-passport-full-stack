import { createRouter, createWebHistory } from 'vue-router'
import Home from './components/Home.vue';
import Dashboard from './components/Dashboard.vue';
import Logout from './components/Logout.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component:Dashboard
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

export default router
