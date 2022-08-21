import {createRouter, createWebHashHistory} from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'List',
        component: () => import('../views/List'),
        meta: {requiresAuth: true}
    },
    {
        path: '/questions',
        name: 'Questions',
        component: () => import('../views/Questions'),
        meta: {requiresAuth: true}
    },
    {
        path: '/slots',
        name: 'Slots',
        component: () => import('../views/Slots'),
        meta: {requiresAuth: true}
    },
]

const router = createRouter({
    history: createWebHashHistory(process.env.BASE_URL),
    routes,
    scrollBehavior() {
        return {top: 0}
    },
})

export default router

