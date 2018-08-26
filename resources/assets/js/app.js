
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'vuex';
import VueMeta from 'vue-meta-info';

import iview from 'iview';
import 'iview/dist/styles/iview.css';

import axios from 'axios';
import router from './router';
import App from './App.vue'

import VueQuillEditor from 'vue-quill-editor';
import 'quill/dist/quill.core.css';
import 'quill/dist/quill.snow.css';
import 'quill/dist/quill.bubble.css';

Vue.use(iview);
Vue.use(VueQuillEditor);
Vue.use(Vuex);
Vue.use(VueMeta);

Vue.prototype.$ajax = axios;

const store = new Vuex.Store( {
    state:{
        access_token: '',
        token_type: '',
    },
    mutations: {
        updateName(state, name) {
            state.name = name
        },
        updateAccessToken(state, token) {
            state.access_token = token
        },
        updateTokenType(state, type) {
            state.token_type = type
        }
    }
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*
*  设置api的版本，默认为版本v1
* */
// axios.defaults.headers['Accept'] = 'application/prs.iview-laravel.v2+json';
/*
*   设置axios发送数据的格式为application/x-www-form-urlencoded，axios默认为application/json
* */
// axios.defaults.headers['Content-type'] = 'application/x-www-form-urlencoded';

router.beforeEach((to, from, next) => {
    iview.LoadingBar.start();
    if(to.meta.title){
        document.title = to.meta.title
    }
    next();
})

router.afterEach((to) => {
    iview.LoadingBar.finish();
})

new Vue({
    el: '#app',
    store,
    router,
    render: h => h(App),
});
