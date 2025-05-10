import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import { createPinia } from 'pinia'

import 'material-design-icons-iconfont/dist/material-design-icons.css'

createApp(App)
  .use(createPinia())
  .use(router)
  .mount('#app')