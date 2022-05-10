import React from 'react';
import ReactDOM from 'react-dom/client';


const { Flights } = require('./pages/Flights');

// resoureces/js/app.js
require('./bootstrap');

// React Components
require('./pages/Flights');

if (document.getElementById("react")) {
    const domContainer = document.getElementById("react")
    const root = ReactDOM.createRoot(domContainer);
    root.render(<Flights />);
}







/* 
import { createApp } from 'vue';
import Pagination from 'v-pagination-3'; 


require('./bootstrap');

window.Vue = require('vue').default;


const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
const app = createApp({})
app.component('flight-panel', require('./components/FlightPanel.vue').default);
app.mount("#app");

const app2 = createApp({})
app2.component('flight-table', require('./components/FlightTable.vue').default);
app2.component('flight-delete', require('./components/DeleteFlight.vue').default);
app2.component('flight-edit', require('./components/EditFlight.vue').default);
app2.component('pagination', Pagination);
app2.mount('#app2');  */