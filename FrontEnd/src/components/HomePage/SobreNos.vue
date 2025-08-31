<template>
  <!-- Seção de história da empresa -->
  <section class="scope">
    <!-- Texto principal -->
    <article class="card">
      <h4 class="section-label">Nossa História</h4>

      <!-- Título com logo da Space Studios -->
      <h2 class="section-title">
        SPACE STUDIOS <br />
        Da Ideia ao Desenvolvimento – Uma Nova Geração de Jogos
      </h2>

      <!-- Texto da história -->
      <p>
        Nascida em <strong class="highlight">2022</strong>, a <strong class="highlight">SPACE STUDIOS</strong> surgiu de uma
        equipe jovem e apaixonada por criar mundos digitais.  
        Nosso primeiro projeto, <em>Terrius</em>, foi um
        <span class="highlight">infinite runner</span> cheio de ação que marcou o início da
        nossa jornada.  
        Em <strong class="highlight">2024</strong>, oficializamos o estúdio com a missão de
        desenvolver jogos <strong class="highlight">indie</strong>, criativos e com uma
        identidade própria.  
        Hoje, trabalhamos em <em class="highlight">"Sob o Sol do Sertão"</em>, um jogo que celebra a
        cultura nordestina e traz uma experiência única inspirada em títulos como
        Red Dead Redemption.  
        Para nós, cada jogo é uma forma de contar histórias e valorizar nossas raízes.
      </p>

      <!-- Botão de ação -->
      <button @click="jogos()">Conheça nossos Jogos</button>
    </article>

    <!-- Imagem ilustrativa lateral -->
    <aside class="card-estiloso">
      <div class="image-wrapper">
        <img src="/src/assets/img/Games/programando.png" alt="Equipe Space Studios desenvolvendo jogos" />
      </div>
    </aside>
  </section>
</template>

<script>
export default {
  methods: {
    jogos() {
      window.location = "/jogos";
    },
  },
};
</script>

<style scoped>
/* --- Seção principal --- */
.scope {
  background: #fff;
  width: 100%;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 50px;
  padding: 80px 150px;
  font-family: 'Montserrat', sans-serif;
}

/* --- Texto (lado esquerdo) --- */
.card {
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 15px;
  max-width: 650px;
  width: 100%;
  border-left: 6px solid #1e40af; /* detalhe lateral gamer */
  padding-left: 25px;
}

.section-label {
  color: #777;
  text-transform: uppercase;
  letter-spacing: 3px;
  font-weight: 600;
}

/* --- Título com logo --- */
.section-title {
  font-weight: 900;
  color: #222;
  letter-spacing: -1px;
  font-size: 2rem;
  line-height: 1.4;
  margin-bottom: 10px;
  display: flex;
  align-items: center;
  flex-wrap: nowrap;
  gap: 10px;
  background: linear-gradient(90deg, #1e3a8a, #2563eb);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.logo-title {
  width: 45px;
  height: 45px;
  object-fit: contain;
  filter: brightness(0) saturate(100%) invert(20%) sepia(100%) saturate(700%) hue-rotate(200deg) brightness(95%) contrast(90%);
}

/* --- Parágrafo da história --- */
.card p {
  color: #444;
  line-height: 1.8;
  font-size: 1rem;
}

.highlight {
  color: #2563eb;
  font-weight: 600;
}

/* --- Botão de ação --- */
.card button {
  background: linear-gradient(45deg, #1e3a8a, #2563eb);
  border: none;
  height: 50px;
  width: 230px;
  margin: 20px 0;
  border-radius: 10px;
  color: white;
  box-shadow: -2px 4px 10px rgba(0, 0, 0, .25);
  cursor: pointer;
  transition: all .4s ease;
  font-weight: 700;
  font-family: 'Quicksand', sans-serif;
  position: relative;
  overflow: hidden;
}

.card button::after {
  content: "";
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: rgba(255,255,255,0.2);
  transition: left 0.4s ease;
}

.card button:hover::after {
  left: 100%;
}

.card button:hover {
  width: 250px;
  background: linear-gradient(45deg, #0a468b, #2273cf);
  box-shadow: -2px 4px 15px rgba(37, 99, 235, 0.5);
  transform: scale(1.05);
}

.card button:active {
  transform: scale(0.95);
}

/* --- Imagem ilustrativa (lado direito) --- */
.card-estiloso {
  width: 420px;
  height: 420px;
  position: relative;
}

.image-wrapper {
  position: relative;
  width: calc(600px, 10vw, 800px);
  border-radius: 30px;
  overflow: hidden;
  cursor: pointer;

  border-radius: 50%;
  transition: transform 0.6s ease;
}

.image-wrapper img {
  width: 100%;
  transition: transform 0.5s ease;
}

/* Overlay interativo */
.overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(37, 99, 235, 0.35), rgba(0, 0, 0, 0.4));
  opacity: 0;
  transition: opacity 0.5s ease;
  border-radius: 30px;
}

.image-wrapper:hover img {
  transform: scale(1.08);
  filter: brightness(1.05);
}

.image-wrapper:hover .overlay {
  opacity: 1;
}

/* --- Responsividade --- */
@media (max-width: 992px) {
  .scope {
    flex-direction: column;
    padding: 50px 30px;
    text-align: center;
  }

  .card {
    border-left: none;
    padding-left: 0;
  }

  .section-title {
    justify-content: center;
  }

  .card-estiloso {
    width: 100%;
    max-width: 400px;
    height: auto;
  }

  .card button {
    margin: 25px auto;
  }
}

@media (max-width: 480px) {
  .section-title {
    font-size: 1.5rem;
  }

  .card p {
    font-size: 0.95rem;
    line-height: 1.6;
  }

  .card button {
    width: 100%;
  }
}
</style>
