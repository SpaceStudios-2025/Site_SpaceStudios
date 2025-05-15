export default[
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: () => import('@/components/pages/DashBoardView.vue'),
        meta:{
            auth: true,
            admin: true,
        },
        children: [
            {
                path: 'noticias',
                name: 'Criar Noticias',
                component: () => import('@/components/Admin/NewsDashboard.vue'),
            },
            {
                path: 'jogos',
                name: 'Criar Jogos',
                component: () => import('@/components/Admin/GamesDashboard.vue'),
            },
            {
                path: '',
                name: 'Default',
                component: () => import('@/components/Admin/NewsDashboard.vue'),
            }
        ]
    },
    
]