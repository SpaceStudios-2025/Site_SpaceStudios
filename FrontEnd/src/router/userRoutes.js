export default [
    {
        path: '/',
        name: 'Home',
        component: () => import('@/components/pages/HomeComponent.vue'),
        meta: {
            auth: false,
            admin: false
        }
    },
    {
        path: '/jogos',
        name: 'Jogos',
        component: () => import('@/components/pages/JogosComponent.vue'),
        meta: {
            auth: false,
            admin: false
        }
    },
    {
        path: '/noticias',
        name: 'Noticias',
        component: () => import('@/components/pages/NewsComponent.vue'),
        meta: {
            auth: false,
            admin: false
        }
    },
    {
        path: '/login',
        name: 'Login',
        component: () => import('@/components/pages/LoginComponent.vue'),
        meta: {
            auth: false,
            admin: false
        }
    },
    {
        path: '/jogos',
        name: 'Jogos',
        component: () => import('@/components/pages/JogosComponent.vue'),
        meta: {
            auth: false,
            admin: false
        }
    },
    {
        path: '/register',
        name: 'Registrar',
        component: () => import('@/components/pages/RegisterComponent.vue'),
        meta: {
            auth: false,
            admin: false
        }
    },
]