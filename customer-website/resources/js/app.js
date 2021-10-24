/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

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

Vue.component('main-index', require('./components/MainIndex.vue').default);
Vue.component('main-restaurants', require('./components/MainRestaurants.vue').default);
Vue.component('restaurant-details', require('./components/RestaurantDetails.vue').default);
Vue.component('faq-help', require('./components/FaqHelp.vue').default);
Vue.component('favorite-foods', require('./components/FavoriteFoods.vue').default);
Vue.component('footer-categories-links', require('./components/footer/FooterCategoriesLinks.vue').default);
Vue.component('footer-cuisines-links', require('./components/footer/FooterCuisinesLinks.vue').default);
Vue.component('index-banner', require('./components/IndexBanner.vue').default);

// google maps 
import * as VueGoogleMaps from 'vue2-google-maps';
Vue.use(VueGoogleMaps, {
    load: {
        key:google_maps_key
    }
});
// browser-geolocation
import VueGeolocation from 'vue-browser-geolocation';
Vue.use(VueGeolocation);
// pop up notification
import Notifications from 'vue-notification'
Vue.use(Notifications);


// // localization
import VueI18n from 'vue-i18n'
Vue.use(VueI18n)

import en_messages from '../lang/en.json'
import ar_messages from '../lang/ar.json'
import ja_messages from '../lang/ja.json'

const messages = {
    en: en_messages,
    ar: ar_messages,
    ja: ja_messages,
}
if(! localStorage.getItem('MIX_VUE_APP_I18N_LOCALE')  ){
    localStorage.setItem('MIX_VUE_APP_I18N_LOCALE', process.env.MIX_VUE_APP_I18N_LOCALE );
}
  // Create VueI18n instance with options
const i18n = new VueI18n({
    locale: localStorage.getItem("MIX_VUE_APP_I18N_LOCALE") || 'en', // set locale
    messages, // set locale messages
})

import { VueperSlides, VueperSlide } from 'vueperslides'
import 'vueperslides/dist/vueperslides.css'
Vue.component('vueper-slides', VueperSlides);
Vue.component('vueper-slide', VueperSlide);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    i18n,
    el: '#app',
});


// jquery
require('../../node_modules/jquery/dist/jquery');
require('../../node_modules/jquery/dist/jquery.slim');
// anime on scrolle
require('../../node_modules/aos/dist/aos');
// slick-carousel
require('../../node_modules/slick-carousel/slick/slick');
// bootstrap
require('../../node_modules/bootstrap/dist/js/bootstrap.bundle');