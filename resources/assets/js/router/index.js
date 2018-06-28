import Vue from 'vue';
import vueRouter from 'vue-router';
import a from '../components/a.vue';
import b from '../components/b.vue';

Vue.use(vueRouter);

const routes = [
    {
        path: '/',
        component: a,
    },
    {
        path: '/b',
        component: b,
    },
]

const router = new vueRouter({
    routes:routes
    })

export default router