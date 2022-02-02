import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [{
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/ingresar',
        name: 'Ingresar',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () =>
            import ( /* webpackChunkName: "ingresar" */ '../views/Ingresar.vue')
    },
    {
        path: '/recorrido',
        name: 'Recorrido',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () =>
            import ( /* webpackChunkName: "recorrido" */ '../views/Recorrido.vue')
    },
    {
        path: '/editar/:id',
        name: 'Editar',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () =>
            import ( /* webpackChunkName: "editar" */ '../views/Editar.vue')
    },
    {
        path: '/retos',
        name: 'Retos',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () =>
            import ( /* webpackChunkName: "retos" */ '../views/Retos.vue')
    }
]

const router = new VueRouter({
    routes
})

export default router