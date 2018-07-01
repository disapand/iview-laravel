
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import iview from 'iview';
import 'iview/dist/styles/iview.css';
import axios from 'axios';
import router from './router';
import App from './App.vue'

Vue.use(iview);

Vue.prototype.$ajax = axios;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

axios.defaults.headers['Accept'] = 'application/prs.iview-laravel.v2+json';

router.beforeEach((to, from, next) => {
    iview.LoadingBar.start();
    next();
})

router.afterEach((to) => {
    iview.LoadingBar.finish();
})

new Vue({
    el: '#app',
    router,
    render: h => h(App),
});
