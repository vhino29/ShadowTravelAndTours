require('./bootstrap');
require('gijgo');

window.moment = require('moment');

require('./booking/hotels')

import Vue from 'vue'

Vue.component('hotel-list', require('./components/booking/hotels/HotelListComponent.vue').default);
Vue.component('hotel-item-list', require('./components/booking/hotels/HotelItemListComponent.vue').default);

const app = new Vue({
}).$mount('#app');
