require('./bootstrap');
require('gijgo');

window.moment = require('moment');

require('./booking/hotels')

import Vue from 'vue'

Vue.component('hotel-list', require('./components/booking/hotels/HotelListComponent.vue').default);

const app = new Vue({
}).$mount('#app');
