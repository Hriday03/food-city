/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.component('order-history', require('./passenger/OrderHistory.vue').default);

Vue.component('passenger-wallet', require('./passenger/Wallet.vue').default);

Vue.component('order-details', require('./passenger/components/OrderDetails.vue').default);

Vue.component('alert-tost', require('./passenger/components/Tost.vue').default);

Vue.component('passenger-profile', require('./passenger/Profile.vue').default);

new Vue({
    el: '#passenger-app',
});
