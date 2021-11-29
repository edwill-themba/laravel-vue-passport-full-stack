import { createApp } from 'vue'
import Home from './components/Home.vue';
import Navbar from './components/Navbar.vue';
import Dashboard from './components/Dashboard.vue';
import Bootstrap from '../../node_modules/bootstrap/dist/css/bootstrap.min.css';
import font_awesome from '../../node_modules/font-awesome/css/all.min.css';
import store from './index';
import router from './router';

const app = createApp({});
app.component('navbar',Navbar)
app.component('home', Home)
app.component('Dashboard',Dashboard)
    .use(Bootstrap)
    .use(router)
    .use(store)
    .use(font_awesome)
    .mount('#app');

require('./bootstrap');
