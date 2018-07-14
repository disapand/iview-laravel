import Vue from 'vue';
import vueRouter from 'vue-router';
import menu from '../components/menu.vue';
import television from '../components/television.vue';
import tv_item from '../components/tv_item.vue';

Vue.use(vueRouter);

const routes = [
    {
        path: '/',
        name: 'menu',
        component: menu,
        children: [
            {
                path: 'television',
                name: 'television',
                meta: {title: '电视资源列表'},
                component: television,
            },
            {
                path: 'tv_item/:id?',
                name: 'tv_item',
                meta: {title: '电视资源详情'},
                component: tv_item,
            },
        ]
    },
]

const router = new vueRouter({
    // mode:'history',
    routes:routes
    })

export default router