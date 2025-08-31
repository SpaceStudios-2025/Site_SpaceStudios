<template>
  <!-- Container principal da página -->
  <div>
    <!-- Fundo de vídeo -->
    <section class="video-background" aria-hidden="true">
      <video autoplay muted loop>
        <source src="/src/assets/videos/bg2.mp4" type="video/mp4" />
      </video>
      <!-- Overlay de pixels para efeito visual -->
      <div class="pixel-overlay"></div>
    </section>

    <!-- Conteúdo principal da home -->
    <main class="home-container">
      <!-- Título principal -->
      <h1 class="title-home">Universo</h1>

      <!-- Subtítulo -->
      <h2 class="subtitle-home">Em expansão</h2>

      <!-- Linha de separação decorativa -->
      <hr class="trail-home" />

      <!-- Parágrafo introdutório -->
      <p class="text-home">
        Bem-vindo à Space Studios <br />
        Transformamos ideias em experiências digitais únicas. Criamos jogos
        inovadores, histórias envolventes e ferramentas digitais de qualidade,
        unindo criatividade e tecnologia em cada projeto. Explore o universo da
        Space Studios — onde cada ideia tem espaço para brilhar.
      </p>

      <!-- Botão de ação -->
      <a href="/#sobre"><button class="button-home">Descubra Agora</button></a>
    </main>
  </div>
</template>

<style scoped>
/* ==========================================
   FUNDO DE VÍDEO
   ========================================== */
.video-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  overflow: hidden;
  z-index: -1;
  filter: blur(4px); /* desfoca o vídeo */
}

.video-background video{
  width: 100%;
  height: 100vh;

  object-fit: cover;
}

/* Overlay de pixels sobre o vídeo */
.pixel-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  background-image: url(../../assets/img/ledScreen.jpg);
  opacity: 0.2;
  z-index: 0;
}

/* ==========================================
   CONTEÚDO PRINCIPAL
   ========================================== */
.home-container {
  height: calc(100vh - 150px);

  display: flex;
  flex-direction: column;
  justify-content: center;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  margin-top: 55px;
  padding: 0 2rem;
}

/* Título principal */
.title-home {
  font-size: clamp(2.5rem, 7vw, 130px);
  text-transform: uppercase;
  font-weight: bold;
  color: transparent;
  -webkit-text-stroke: 2px #fff;
  margin-bottom: 1rem;
  text-align: left;

  line-height: 40px;
}

/* Subtítulo */
.subtitle-home {
  font-size: clamp(2rem, 7vw, 120px);
  text-transform: uppercase;
  font-weight: 600;
  color: #ccc;
  margin-bottom: 1rem;
  text-align: left;

  line-height: 100px;
}

/* Linha decorativa */
.trail-home {
  margin: 20px 0;
  border: 1px solid #fff;
  filter: blur(1px);
  width: 100%;
  max-width: 600px;
}

/* Texto descritivo */
.text-home {
  font-size: clamp(0.9rem, 2vw, 1rem);
  max-width: 800px;
  line-height: 1.6rem;
  color: #ddd;
  font-weight: 600;
  letter-spacing: 1px;
  margin-bottom: 2rem;
}

/* Botão principal */
.button-home {
  width: 180px;
  height: 43px;
  border: 3px solid #fff;
  border-radius: 20px;
  background-color: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  font-size: 14px;
  color: #fff;
  font-weight: 600;
  text-transform: uppercase;
  cursor: pointer;
  transition: all 0.3s ease;
}

.button-home:hover {
  transform: scale(1.05);
  box-shadow: -1px 1px 2px rgba(255, 255, 255, 0.5);
  background-color: rgba(255, 255, 255, 0.2);
  text-shadow: 1px 1px 1px #000;
}

/* ==========================================
   MEDIA QUERIES (RESPONSIVO)
   ========================================== */

@media (max-width: 1024px){
  .button-home {
    display: none;
  }
}
@media (max-width: 768px) {
  .home-container {
    align-items: center;
    text-align: center;
  }

  .title-home,
  .subtitle-home {
    text-align: center;
    font-size: 3.5rem;
    -webkit-text-stroke: 1.5px #fff;
    line-height: 50px;
  }

  .trail-home {
    max-width: 300px;
    
  }

  .text-home {
    width: 100%;
    padding: 0 1rem;
    font-size: 0.95rem;
    line-height: 1.4rem;
  }

  .button-home {
    display: none;
  }
}

@media (max-width: 480px) {
  .title-home {
    font-size: 2.2rem;
    line-height: 20px;
  }

  .subtitle-home {
    font-size: 1.8rem;
    line-height: 20px;
  }

  .text-home {
    font-size: 0.85rem;
  }

  .button-home {
    display: inline;
  }
}
</style>
