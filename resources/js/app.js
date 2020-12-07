require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
import routes from './routes'
Vue.use(VueRouter);

import VueGoodTable from 'vue-good-table'
import VueGoodTablePlugin from 'vue-good-table'
import 'vue-good-table/dist/vue-good-table.css'
Vue.use(VueGoodTable);
Vue.use(VueGoodTablePlugin);

import VueSweetalert2 from 'vue-sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css'
Vue.use(VueSweetalert2);

const router = new VueRouter(routes);

Vue.component('app-component', require('./components/App.vue').default);
Vue.component('sidebar-component', require('./components/Sidebar.vue').default);
Vue.component('header-component', require('./components/Header.vue').default);
Vue.component('footer-component', require('./components/Footer.vue').default);
Vue.component('loader', require('./components/Loader.vue').default);

const app = new Vue({
    el: '#app',
    router: router
});
