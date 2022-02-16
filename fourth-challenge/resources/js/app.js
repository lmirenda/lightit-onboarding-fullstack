/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import { createApp } from 'vue';
import Pagination from 'v-pagination-3';


require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
const app = createApp({})
app.component('flight-panel', require('./components/FlightPanel.vue').default);
app.mount("#app");

const app2 = createApp({})
app2.component('flight-table', require('./components/FlightTable.vue').default);
app2.component('pagination', Pagination);
app2.mount('#app2');