import { createRouter, createWebHistory } from 'vue-router'

import routesJs from '@/router/routes.js';

import UserRoutes from '@/router/userRoutes.js';
import AdminRoutes from '@/router/adminRoutes.js';

const routes = [
  ...UserRoutes,
  ...AdminRoutes
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach(routesJs)

export default router