<template>
  <footer class="foot">
    <div class="container">
      <header class="footer-header">
        <h2 class="title animate-text">Já deu uma olhada em nossos cursos?</h2>
        <p class="subtitle animate-text">Temos alguns cursos gratuitos para você engajar no ramo da programação</p>
        <button class="btn shine" @click="Cursos()">Em breve</button>
      </header>

      <hr>

      <nav class="espacos" aria-label="Links do footer">
        <section class="espaco-title animate-fade">
          <h3>Lets</h3>
          <h2>One</h2>
        </section>

        <section class="espaco-linhas animate-fade">
          <h3>Informações</h3>
          <p><a href="/news">Notícias</a></p>
          <p><a href="/#estudio">O Estúdio</a></p>
          <p><a href="/#sobre">Sobre Nós</a></p>
          <p><a href="/news">Novidades</a></p>
          
        </section>

        <section class="espaco-linhas animate-fade">
          <h3>Diversão & Aprendizado</h3>
          <p><a href="/jogos">Jogos</a></p>
          <p><a href="/jogos">Mobile</a></p>
          <p><a href="/news">Sobre os Jogos</a></p>
          <p><a href="/jogos">Desenvolvimento</a></p>
        </section>

        <section class="espaco-linhas animate-fade">
          <h3>Contato</h3>
          <p><a href="/#contato">Contato</a></p>
          <p><a href="/#contato">Nossas Redes</a></p>
          <p><a href="/#contato">Politica de Privacidade</a></p>
        </section>

        <section class="redes animate-fade">
          <h3>Nossas Redes Sociais</h3>
          <button class="btn shine" @click="Redes()">Redes Sociais</button>
        </section>
      </nav>

      <hr>
    </div>

    <div class="site">
      <p>&copy; {{ currentYear }} <span>Space Studios</span></p>
      <p>Desde 2022</p>
    </div>
  </footer>
</template>

<script>
export default {
  data() {
    return {
      currentYear: new Date().getFullYear()
    };
  },
  methods: {
    Redes() {
      window.location = "/#contato";
    },
    Cursos() {
      window.location = "/cursos";
    }
  }
};
</script>

<style scoped>
.foot {
  background-image: linear-gradient(to top, #111, #000);
  width: 100%;
  padding: 40px 150px;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  text-align: center;
  color: #fff;
  overflow: hidden;
}

.footer-header h2,
.footer-header p {
  animation: fadeInUp 1s ease forwards;
}

hr {
  opacity: 0.2;
  margin: 20px 0;
}

.espaco-title h2 {
  color: #fff;
  font-size: 1.6rem;
}

.espaco-title h3 {
  font-size: 1.3rem;
}

.espaco-linhas {
  display: flex;
  flex-direction: column;
  align-items: start;
}

.espaco-linhas h3 {
  color: #2273cf;
  text-transform: capitalize;
  font-size: 1rem;
  margin-bottom: 5px;
}

.espaco-linhas p a {
  font-size: 0.8rem;
  color: #fff;
  text-decoration: none;
  position: relative;
  display: inline-block;
  overflow: hidden;
}

.espaco-linhas p a::after {
  content: '';
  position: absolute;
  width: 100%;
  height: 2px;
  bottom: 0;
  left: -100%;
  background-color: #2273cf;
  transition: 0.5s;
}

.espaco-linhas p a:hover::after {
  left: 0;
}

.redes h3 {
  font-size: 1.3rem;
  border-bottom: 3px solid #fff;
  margin-bottom: 10px;
}

.btn {
  background-color: #2273cf;
  border: none;
  height: 50px;
  width: 200px;
  margin: 20px 0;
  border-radius: 2px;
  color: #fff;
  font-weight: 900;
  box-shadow: -1px 1px 2px 1px rgba(0, 0, 0, 0.4);
  cursor: pointer;
  transition: all 0.5s;
  position: relative;
  overflow: hidden;
}

.btn.shine::before {
  content: '';
  position: absolute;
  top: 0;
  left: -75%;
  width: 50%;
  height: 100%;
  background: linear-gradient(120deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.5) 50%, rgba(255,255,255,0) 100%);
  transform: skewX(-20deg);
}

.btn.shine:hover::before {
  animation: shine 1s forwards;
}

.btn:hover {
  border-radius: 5px;
  background-color: #fff;
  color: #2273cf;
}

.espacos {
  display: flex;
  align-items: flex-start;
  justify-content: space-around;
  margin: 20px 0;
  flex-wrap: wrap;
}

.site {
  display: flex;
  justify-content: space-between;
  margin: 10px 0;
  color: #e0e0e0;
}

.site span {
  color: #fff;
}

/* Animações */
@keyframes shine {
  100% { left: 125%; }
}

@keyframes fadeInUp {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-text {
  animation: fadeInUp 1s ease forwards;
}

.animate-fade {
  opacity: 0;
  animation: fadeInUp 1s ease forwards;
  animation-delay: 0.3s;
  animation-fill-mode: forwards;
}

/* Estilos responsivos */
@media (max-width: 768px) {
  .foot {
    padding: 20px 10px;
  }

  .container {
    display: flex;
    flex-direction: column;
    gap: 30px;
  }

  .espacos {
    flex-direction: column;
    align-items: center;
    gap: 20px;
  }

  .site {
    flex-direction: column;
    gap: 10px;
    align-items: center;
  }
}
</style>
