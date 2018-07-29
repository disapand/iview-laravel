import Vue from 'vue';
import vueRouter from 'vue-router';
import menu from '../components/menu.vue';
import television from '../components/television.vue';
import tv_item from '../components/tv_item.vue';
import outdoor  from '../components/outdoor.vue';
import outdoor_tiem  from '../components/outdoor_item.vue';

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
            {
                path: 'outdoor',
                name: 'outdoor',
                meta: {title: '户外资源列表'},
                component: outdoor,
            },
            {
                path: 'outdoor_item/:id?',
                name: 'outdoor_item',
                meta: {title: '户外资源详情'},
                component: outdoor_tiem,
            },
        ]
    },
]

const router = new vueRouter({
    // mode:'history',
    routes:routes
    })

export default router