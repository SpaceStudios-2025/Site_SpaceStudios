import { computed, ref } from 'vue'
import { defineStore } from 'pinia'
import http from '@/services/http.js'
import router from '@/router'

export const useAuth = defineStore('auth', () => {
  // Recupera usuário salvo com segurança
  let parsedUser = {}
    try {
    const savedUser = localStorage.getItem('user')

    // Se existe e não é "undefined" nem "null"
    if (savedUser && savedUser !== 'undefined' && savedUser !== 'null') {
        parsedUser = JSON.parse(savedUser)
    }
    } catch (e) {
    console.error("Erro ao parsear user do localStorage:", e)
    localStorage.removeItem('user')
    }

  // Estado reativo
  const token = ref(localStorage.getItem('token') || null)
  const user = ref(parsedUser)

  // Funções para atualizar token e usuário
  function setToken(tokenValue) {
    localStorage.setItem('token', tokenValue)
    token.value = tokenValue
  }

  function setUser(userValue) {
    localStorage.setItem('user', JSON.stringify(userValue))
    user.value = userValue || {}
  }

  // Computeds
  const isAuthenticated = computed(() => !!(token.value && user.value?.id))
  const isAdmin = computed(() => !!(+user.value?.admin))
  const fullName = computed(() => user.value?.firstName && user.value?.lastName ? `${user.value.firstName} ${user.value.lastName}` : '')
  const FirstName = computed(() => user.value?.firstName || '')
  const LastName = computed(() => user.value?.lastName || '')
  const Email = computed(() => user.value?.email || '')

  // Verifica token no backend
  async function checkToken(tokenA) {
    try {
      const tokenAuth = 'Bearer ' + tokenA
      const { data } = await http.get('/auth/verify', {
        headers: { Authorization: tokenAuth }
      })
      return data
    } catch (error) {
      console.error(error.response?.data || error.message)
      clear()
      router.push('/')
    }
  }

  // Limpa autenticação
  function clear() {
    localStorage.removeItem('token')
    localStorage.removeItem('user')
    token.value = null
    user.value = {}
  }

  return {
    token,
    user,
    setToken,
    setUser,
    checkToken,
    clear,
    isAuthenticated,
    isAdmin,
    fullName,
    Email,
    FirstName,
    LastName
  }
})
