
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import 'alpinejs';

import {TinkerComponent} from 'botman-tinker';
import VueScheduler from 'v-calendar-scheduler';
import 'v-calendar-scheduler/lib/main.css';
import VueTrix from "vue-trix";
Vue.use(VueScheduler, {
    locale: 'pt-br',
    labels: {
       today: 'Hoje',
       back: 'Voltar',
       next: 'Avançar',
       month: 'Mês',
       week: 'Semana',
       day: 'Dia',
       all_day: 'Dia Interio'
    },
    availableViews: ['month','week','day'],
    initialDate: new Date(),
    initialView: 'day',
    use12: false,
    showTimeMarker: true,
    showTodayButton: true,
  });
Vue.use(VueTrix);

Vue.component('botman-tinker',TinkerComponent);
Vue.component('agenda-psi', require('./CalendarioPsi.vue'));
const app = new Vue({
    el: '#app',
components: {
      'trix' : VueTrix
    }    
});