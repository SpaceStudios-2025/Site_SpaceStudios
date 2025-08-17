<template>
  <main class="app">
    <!-- HEADER PRINCIPAL -->
    <header class="menu-container">
      
      <!-- BOTÃO HAMBURGUER (MOBILE) -->
      <button class="hamburger" 
              @click="toggleMenu" 
              :class="{ 'is-active': isMenuOpen }" 
              aria-label="Menu" 
              aria-expanded="false">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </button>

      <!-- MENU ESQUERDO -->
      <nav>
        <ul class="menu-content-left" :class="{ 'active': isMenuOpen }">
          <li class="btn-menu" @click="closeMenu">
            <a href="/#sobre">
              Sobre nós 
              <span class="material-symbols-outlined">info</span>
            </a>
          </li>
          <li class="btn-menu" @click="closeMenu">
            <a href="/#estudio">
              Novidades 
              <span class="material-symbols-outlined">campaign</span>
            </a>
          </li>
          <li class="btn-menu" @click="closeMenu">
            <a href="/#contato"> 
              Contato 
              <span class="material-symbols-outlined">call</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- LOGO CENTRAL -->
      <img src="@/assets/img/icone.png" alt="Icone do Space Studios" @click="goHome">

      <!-- MENU DIREITO -->
      <nav>
        <ul class="menu-content-right" :class="{ 'active': isMenuOpen }">
          <li class="btnhome" :class="{ 'active': isMenuOpen }" @click="closeMenu">
            <router-link to="/"> Home </router-link>
          </li>
          <li class="btn-menu" @click="closeMenu">
            <router-link to="/noticias">
              Notícias
              <span class="material-symbols-outlined">news</span>
            </router-link>
          </li>
          <li class="btn-menu" @click="closeMenu">
            <router-link to=""> 
              Em Breve
              <span class="material-symbols-outlined">timer</span>
            </router-link>
          </li>
          <li class="btn-menu" @click="closeMenu">
            <router-link to="/jogos">
              Jogos
              <span class="material-symbols-outlined">joystick</span>
            </router-link>
          </li>
          
          <!-- LOGIN / USUÁRIO LOGADO -->
          <li v-if="!auth.isAuthenticated" class="sign in" @click="logado">
            <router-link to=""> 
              <span class="material-symbols-outlined">account_circle</span>
            </router-link>
          </li>
          <li v-else class="sign out" @click="logado">
            <router-link to="">
              <img src="../assets/img/Icones/UsuarioSpace.png" alt="Usuario Space">
            </router-link>
          </li>

          <div class="container-profile">
            <section class="profile" v-if="isProfileOpen">
              <ul>
                <li v-if="auth.isAuthenticated"><a href="">Conta <span class="material-symbols-outlined">manage_accounts</span></a></li>
                <li v-if="auth.isAuthenticated && auth.isAdmin"><a href="">Dashboard <span class="material-symbols-outlined">monitoring</span></a></li>
                <li><a href="/sobreosjogos">Sobre os Jogos <span class="material-symbols-outlined">gamepad</span></a></li>
                <li><a href="/privacidade">Privacidade <span class="material-symbols-outlined">lock_person</span></a></li>
                <li><a href="/desenvolvimento">Desenvolvimento <span class="material-symbols-outlined">data_object</span></a></li>
                <li><a href="">Mobile <span class="material-symbols-outlined">mobile_code</span></a></li>
                <li><a href="">Novidades <span class="material-symbols-outlined">notifications_active</span></a></li>

                <li v-if="auth.isAuthenticated" v-on:click="logout"><a href="">Sair <span class="material-symbols-outlined">logout</span></a></li>
                <li v-else><a href="/login">Entrar <span class="material-symbols-outlined">login</span></a></li>
                
              </ul>
            </section>
          </div>
        </ul>
      </nav>

    </header>
  </main>
</template>

<script>
import { useAuth } from '@/stores/auth.js';
import { useRouter } from 'vue-router';

export default {
  data() {
    return {
      isMenuOpen: false, 
      isProfileOpen: false, // controla estado do menu mobile
      auth: useAuth(),    // store de autenticação
      router: useRouter() // router para navegação programática
    };
  },
  methods: {
    // Redireciona para home
    goHome() {
      this.router.push('/#home');
    },

    // Alterna o menu mobile
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen;
      const hamburger = this.$el.querySelector('.hamburger');
      hamburger.setAttribute('aria-expanded', this.isMenuOpen);
    },

    // Fecha o menu mobile
    closeMenu() {
      this.isMenuOpen = false;
      const hamburger = this.$el.querySelector('.hamburger');
      hamburger.setAttribute('aria-expanded', false);
    },

    // Adiciona classe 'scrolled' ao fazer scroll
    handleScroll() {
      const bar = this.$el.querySelector('.menu-container');
      const barperfil = this.$el.querySelector('.container-profile');
      if (window.scrollY > 20) {
        bar.classList.add('scrolled');
        barperfil.classList.add('scrolled');
      } else {
        bar.classList.remove('scrolled');
        barperfil.classList.remove('scrolled');
      }
    },

    // Logout do usuário
    logout() {
      this.auth.clear();
      this.router.push({ name: 'login' });
    },
    
    logado() {
      this.isProfileOpen = !this.isProfileOpen;
    }
  },
  mounted() {
    const bar = this.$el.querySelector('.menu-container');
    bar.classList.add('loaded'); // animação de carregamento
    this.handleScroll();
    window.addEventListener('scroll', this.handleScroll, { passive: true });
  },
  beforeDestroy() {
    window.removeEventListener('scroll', this.handleScroll);
  }
};
</script>

<style scoped>
/* ------------------- MAIN E HEADER ------------------- */
main.app {
  position: sticky;
  top: 0;
  z-index: 8000;
}

header.menu-container {
  display: flex;
  flex-direction: row;
  align-items: center;
  width: 100%;
  padding: 20px 0;
  transition: all 0.8s ease;
  opacity: 0;
  transform: translateY(-100px);
  z-index: 100;
  font-family: Quicksand, sans-serif;
  position: relative;
}
/* ----------------DropDown Profile ---------------- */
.container-profile {
  position: absolute;
  right: 10px;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  margin-left: 10px;
  z-index: 1200;
}

.profile {
  position: absolute;
  top: 40px;
  right: 0;
  width: 210px;
  background: rgba(30, 30, 30, .2); /* fundo elegante */
  backdrop-filter: blur(10px); /* blur moderno */
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.4); /* sombra sutil */
  padding: 15px 0;
  opacity: 0;
  transform: translateY(-10px);
  transition: all 0.4s ease;
  pointer-events: none;
}

/* Quando estiver aberto */
.container-profile .profile {
  opacity: 1;
  transform: translateY(0);
  pointer-events: auto;
}

.profile ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.profile ul li {
  padding: 10px 20px;
  transition: all 0.3s ease;

  cursor: pointer;
}

.profile ul li a {
  color: #eee;
  font-weight: 600;
  text-decoration: none;
  display: block;
  transition: all 0.3s ease;
  border-radius: 8px;
}

.profile ul li a span{
  font-size: .8rem;
  color: #eee;
}

.profile ul li a:hover {
  background: rgba(255,255,255,0.1);
  color: #fff;
  padding-left: 15px;
}

/* Versão quando o menu principal está scroll */
.container-profile.scrolled .profile {
  background: rgba(0, 0, 0, 0.8);
  border: 1px solid rgba(255,255,255,1);
}


/* ------------------- HOME BUTTON ------------------- */
.btnhome {
  display: none;
}

.btnhome a {
  color: #ccc;
  text-decoration: none;
  text-transform: capitalize;
  padding: .8rem 1rem;
  border-radius: 40px;
  transition: all .5s;
  font-weight: 700;
}

/* ------------------- ANIMAÇÃO DE LOAD ------------------- */
header.menu-container.loaded {
  opacity: 1;
  transform: translateY(0);
}

/* ------------------- LOGO ------------------- */
header.menu-container img {
  width: 130px;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  transition: all 0.5s ease;
  cursor: pointer;
}
header.menu-container img:hover {
  width: 150px;
}

/* ------------------- MENU LINKS ------------------- */
header.menu-container .btn-menu,
header.menu-container .sign {
  display: inline;
  padding: 6px 5px;
}

header.menu-container .btn-menu span {
  font-size: 1rem;
  margin: 5px;

  transition: all .3s ease;
}

header.menu-container .btn-menu a,
.sign a {
  color: #b8b8b8;
  text-decoration: none;
  text-transform: capitalize;
  padding: .4em 1rem;
  border-radius: 40px;
  transition: all .5s;
  font-weight: 700;
  position: relative;
}

header.menu-container .btn-menu a::after {
  content: "";
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  bottom: 0;
  width: 0;
  height: 2px;
  background-color: white;
  transition: all 0.3s ease;
}

header.menu-container .btn-menu a:hover::after {
  width: 100%;
}

header.menu-container .btn-menu a:hover {
  color: white;
}

header.menu-container .btn-menu a:hover span {
  transform: scale(1.2);
}

/* ------------------- SCROLL EFFECT ------------------- */
header.menu-container.scrolled {
  background-color: rgba(0, 0, 0, 0.9);
  backdrop-filter: blur(5px);
  border-bottom: 2px solid #ccc;
}

/* ------------------- NAV ------------------- */
header.menu-container nav {
  display: flex;
  flex: 1;
  justify-content: center;
  align-items: center;
}

header.menu-container nav ul.menu-content-left,
header.menu-container nav ul.menu-content-right {
  display: flex;
  width: 100%;
  justify-content: center;
  align-items: center;
  margin: 0;
  padding: 0;
  list-style: none;
}

/* ------------------- SIGN IN / OUT ------------------- */
.in a {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0;
}
.in a span {
  color: #fff;
  font-size: 2.2rem;
  margin: 0;
  transition: all .3s ease;
}
.in a:hover span {
  color: #c5e0ff;
  transform: scale(1.1);
}

.out a {
  margin-left: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.out a img {
  width: 40px;
  filter: drop-shadow(-2px 2px 3px rgba(0, 0, 0, .5));
  transition: all 0.3s ease;
}
.out a:hover img {
  width: 46px;
}

/* ------------------- HAMBURGUER ------------------- */
button.hamburger {
  display: none;
  flex-direction: column;
  cursor: pointer;
  padding: 10px;
  z-index: 1100;
  user-select: none;
  background: transparent;
  border: none;
}
button.hamburger span.bar {
  height: 3px;
  width: 25px;
  background-color: #ccc;
  margin: 4px 0;
  border-radius: 2px;
  transition: all 0.3s ease;
  display: block;
}
button.hamburger.is-active span.bar:nth-child(1) {
  transform: translateY(7px) rotate(45deg);
}
button.hamburger.is-active span.bar:nth-child(2) {
  opacity: 0;
}
button.hamburger.is-active span.bar:nth-child(3) {
  transform: translateY(-7px) rotate(-45deg);
}

/* ------------------- RESPONSIVO ------------------- */
@media (max-width: 768px) {
  header.menu-container {
    flex-direction: column;
    padding: 10px 0;
    min-height: 60px;
    position: relative;
    text-align: center;
  }

  .btnhome {
    display: inline-block;
  }

  button.hamburger {
    display: flex;
    position: relative;
    align-self: flex-end;
    margin-right: 20px;
  }

  header.menu-container nav {
    width: 100%;
  }

  header.menu-container nav ul.menu-content-left,
  header.menu-container nav ul.menu-content-right {
    position: absolute;
    top: 60px;
    left: 0;
    width: 100%;
    flex-direction: column;
    display: none;
    background-color: rgba(0, 0, 0, 0.95);
    border-radius: 0 0 10px 10px;
    padding: 10px 0;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    z-index: 1000;
  }

  header.menu-container nav ul.menu-content-left.active,
  header.menu-container nav ul.menu-content-right.active {
    display: flex;
  }

  header.menu-container nav ul.menu-content-left li,
  header.menu-container nav ul.menu-content-right li {
    padding: 10px 20px;
  }

  header.menu-container nav ul.menu-content-left li a,
  header.menu-container nav ul.menu-content-right li a {
    font-size: 1.1rem;
    width: 100%;
    display: block;
    padding: 10px;
    border-radius: 10px;
  }

  header.menu-container img {
    display: none;
  }
}

@media (max-width: 480px) {
  header.menu-container nav ul.menu-content-left li a,
  header.menu-container nav ul.menu-content-right li a {
    font-size: 1rem;
    padding: 8px;
  }
}
</style>