<template>
  <!-- Container principal da página -->
  <div>
    <!-- Fundo de vídeo -->
    <section class="video-background" aria-hidden="true">
      <video autoplay muted loop playsinline>
        <source src="/src/assets/videos/bg2.mp4" type="video/mp4">
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
      <hr class="trail-home">

      <!-- Parágrafo introdutório -->
      <p class="text-home">
        Bem-vindo à Space Studios <br>
        Transformamos ideias em experiências digitais únicas. Criamos jogos inovadores, histórias envolventes e ferramentas digitais de qualidade, unindo criatividade e tecnologia em cada projeto. Explore o universo da Space Studios — onde cada ideia tem espaço para brilhar.
      </p>

      <!-- Botão de ação -->
      <button class="button-home">Descubra Agora</button>
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
  height: 110vh;
  overflow: hidden;
  z-index: -1;
  filter: blur(4px); /* desfoca o vídeo */
}

/* Overlay de pixels sobre o vídeo */
.pixel-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none; /* permite cliques através do overlay */
  background-image: url(../../assets/img/ledScreen.jpg);
  opacity: 0.2;
  z-index: 0;
}

/* ==========================================
   CONTEÚDO PRINCIPAL
   ========================================== */
.home-container {
  height: calc(100vh - 80px);
  width: max-content;

  display: flex;
  justify-content: center;
  flex-direction: column;

  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  line-height: 100px;

  margin-top: 55px;
}

/* Título principal */
.title-home {
  font-size: 130px;
  text-transform: uppercase;
  font-weight: bold;
  color: transparent;
  -webkit-text-stroke: 2px #fff; /* contorno branco */
  padding: 0 80px;
}

/* Subtítulo */
.subtitle-home {
  font-size: 120px;
  text-transform: uppercase;
  font-weight: 600;
  color: #ccc;
  padding: 0 80px;
}

/* Linha decorativa */
.trail-home {
  margin: 30px 0;
  border: 1px solid #fff;
  filter: blur(1px);
}

/* Texto descritivo */
.text-home {
  padding: 0 85px;
  font-size: 14px;
  width: 800px;
  line-height: 20px;
  color: #ddd;
  font-weight: 600;
  letter-spacing: 1px;
}

/* Botão principal */
.button-home {
  margin: 40px 80px;
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
@media (max-width: 768px) {
  .home-container {
    font-size: 4rem;
    line-height: 6rem;
  }
}

@media (max-width: 480px) {
  .home-container {
    font-size: 3rem;
    line-height: 4rem;
  }
}
</style>
