import { createRouter, createWebHistory } from 'vue-router'
import Login from '../views/Login.vue'
import Home from '../views/Home.vue'
import Confirmado from '../views/Confirmado.vue'
import Registrarse from "@/views/Registrarse";

const routes = [
  {
    path: '/',
    name: 'Login',
    component: Login
  },
  {
    path: '/home',
    name: 'Home',
    component: Home
  },
  {
    path: '/confirmado',
    name: 'Confirmado',
    component: Confirmado
  },
  {
    path: '/registrarse',
    name: 'Registrarse',
    component: Registrarse
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
