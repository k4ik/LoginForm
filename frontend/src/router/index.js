import { createRouter, createWebHistory } from 'vue-router'
import LoginView from '../views/LoginView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'login',
      component: LoginView
    },
    {
      path: '/signup',
      name: 'signup',
      component: () => import('../views/SignupView.vue')
    },
    {
      path: '/home',
      name: 'home',
      component: () => import('../views/HomeView.vue')
    },
    {
      path: '/forgot-password',
      name: 'forgot password',
      component: () => import('../views/ForgotPasswordView.vue')
    },
    {
      path: '/code',
      name: 'verification code',
      component: () => import('../views/VerificationCodeView.vue')
    },
    {
      path: '/error',
      name: 'error page',
      component: () => import('../views/ErrorView.vue')
    }
  ]
})

export default router
