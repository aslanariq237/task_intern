import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AboutView from '../views/AboutView.vue'
import LoginView from '../views/LoginView.vue'
import AddView from '../views/AddView.vue'
import EditView from '../views/editView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/about',
      name: 'about',      
      component: AboutView,
    },
    {
      path: '/login',
      name : 'login',
      component: LoginView
    },
    {
      path: '/add-product',
      name: 'addProduct',
      component: AddView
    },
    {
      path : '/edit-product/:id',
      name: 'editProduct',
      props: true,
      component: EditView
    }
  ],
})

export default router
