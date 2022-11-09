/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 import Vue from 'vue';
 import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.component('image-modal', require('./components/ImageModal.vue').default);
Vue.component('competition-image-modal', require('./components/CompetitionImageModal.vue').default);
Vue.component('disq-button', require('./components/DisqButton.vue').default);
Vue.component('del-button', require('./components/DelButton.vue').default);
Vue.component('close-button', require('./components/CloseButton.vue').default);
Vue.component('user-list-component', require('./components/UserListComponent.vue').default);
Vue.component('ban-alert', require('./components/BanAlert.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
