import { createRouter, createWebHistory } from 'vue-router';
import { authRoutes } from '../domains/auth/routes';

export const router = createRouter({
    history: createWebHistory(),
    routes: [...authRoutes],
});