/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

// imports
import '@mdi/font/css/materialdesignicons.css'
import vuetify from './plugins/vuetify'
Vue.use(vuetify);

//dashboard
Vue.component('priority-component', require('./components/dashboard/PriorityComponent.vue').default);
Vue.component('status-component', require('./components/dashboard/StatusComponent.vue').default);
Vue.component('piechart-component', require('./components/dashboard/PiechartComponent.vue').default);

// user-management
Vue.component('usertable-component', require('./components/user-management/UserTableComponent.vue').default);

// empty base component
// Vue.component('example', require('./components/Example.vue').default);


// Vue application instance
const app = new Vue({
    el: '#app',
    vuetify,

});
