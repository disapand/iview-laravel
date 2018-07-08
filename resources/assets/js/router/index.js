import Vue from 'vue';
import vueRouter from 'vue-router';
import a from '../components/a.vue';
import b from '../components/b.vue';
import tv_item from '../components/tv_item.vue';

Vue.use(vueRouter);

const routes = [
    {
        path: '/',
        name: 'a',
        component: a,
        children: [
            {
                path: 'b',
                name: 'b',
                component: b,
            },
            {
                path: 'tv_item/:id',
                name: 'tv_item',
                title: '资源详情',
                component: tv_item,
            }
        ]
    },
]

const router = new vueRouter({
    // mode:'history',
    routes:routes
    })

export default router