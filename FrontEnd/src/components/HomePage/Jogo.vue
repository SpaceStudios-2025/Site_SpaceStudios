<template>
  <section class="carousel-hero">
    <div class="carousel-container">
      <!-- Slide ativo -->
      <transition name="fade" mode="out-in">
        <div
          class="slide"
          :style="{ backgroundImage: 'url(' + games[currentIndex].img + ')' }"
          :key="currentIndex"
        >
          <div class="overlay"></div>
          <div class="content">
            <h2 class="genre">{{ games[currentIndex].genre }}</h2>
            <h1 class="title">{{ games[currentIndex].name }}</h1>
            <p class="description">{{ games[currentIndex].description }}</p>
            <button class="btn">Jogar Agora</button>
          </div>
        </div>
      </transition>

      <!-- Botões -->
      <button class="nav prev" @click="prevSlide">‹</button>
      <button class="nav next" @click="nextSlide">›</button>

      <!-- Indicadores -->
      <div class="indicators">
        <span
          v-for="(game, index) in games"
          :key="index"
          class="dot"
          :class="{ active: index === currentIndex }"
          @click="currentIndex = index"
        ></span>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from "vue";

/* Importando imagens (Solução recomendada) */
import CapaPedidos from "../../assets/img/capas/CapaPedidos.png";
const games = [
  {
    name: "Pedidos do Além",
    genre: "Terror",
    description: "Um jogo de terror psicológico cheio de mistérios.",
    img: CapaPedidos,
  },
  {
    name: "Galaxy Defender",
    genre: "Ação",
    description: "Defenda a galáxia de hordas alienígenas implacáveis.",
    img: "CapaGalaxy",
  },
  {
    name: "Corrida Cósmica",
    genre: "Corrida",
    description: "Velocidade estelar em pistas intergalácticas.",
    img: "CapaCorrida",
  },
  {
    name: "Dungeon Escape",
    genre: "RPG",
    description: "Sobreviva e fuja das masmorras cheias de perigos.",
    img: "CapaDungeon",
  },
];

const currentIndex = ref(0);
let intervalId = null;

const nextSlide = () => {
  currentIndex.value = (currentIndex.value + 1) % games.length;
};

const prevSlide = () => {
  currentIndex.value =
    (currentIndex.value - 1 + games.length) % games.length;
};

onMounted(() => {
  intervalId = setInterval(nextSlide, 7500);
});

onUnmounted(() => {
  clearInterval(intervalId);
});
</script>

<style scoped>
.carousel-hero {
  position: relative;
  width: 100%;
  height: 100vh; /* ocupa quase toda tela */
  overflow: hidden;
  font-family: "Montserrat", sans-serif;
}

.carousel-container {
  position: relative;
  width: 100%;
  height: 100%;
}

/* SLIDES */
.slide {
  position: absolute;
  inset: 0;
  background-size: cover;
  background-position: center;
  display: flex;
  align-items: flex-end;
  justify-content: flex-start;
  color: #fff;
  transition: background-image 0.8s ease;
}

.overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.2));
  z-index: 1;
}

/* CONTEÚDO */
.content {
  position: relative;
  z-index: 2;
  padding: 50px;
  max-width: 600px;
  text-align: left;
}

.genre {
  font-size: 1rem;
  text-transform: uppercase;
  opacity: 0.85;
}

.title {
  font-size: 3rem;
  font-weight: 800;
  margin: 10px 0 20px;
}

.description {
  font-size: 1.2rem;
  line-height: 1.5;
  opacity: 0.9;
  margin-bottom: 20px;
}

.btn {
  background: #fff;
  border: none;
  padding: 12px 25px;
  border-radius: 8px;
  font-weight: bold;
  color: #4b00ff;
  cursor: pointer;
  transition: all 0.3s ease;
}

.btn:hover {
  background: #ddf3fa;
  box-shadow: 0px 6px 18px rgba(111, 0, 255, 0.6);
}

/* NAVEGAÇÃO */
.nav {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(255, 255, 255, 0.7);
  border: none;
  font-size: 2.5rem;
  cursor: pointer;
  z-index: 3;
  transition: all 0.3s ease;

  background-color: transparent;
  color: white;
}

.nav:hover {
  color: #4b00ff;
}

.prev {
  left: 20px;
}
.next {
  right: 20px;
}

/* INDICADORES */
.indicators {
  position: absolute;
  bottom: 25px;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  gap: 8px;
  z-index: 3;
}

.dot {
  width: 12px;
  height: 12px;
  background: rgba(255, 255, 255, 0.6);
  border-radius: 50%;
  cursor: pointer;
  transition: all 0.3s ease;
}

.dot.active {
  background: #fff;
  transform: scale(1.2);
}

/* TRANSIÇÃO */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.8s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

/* RESPONSIVIDADE */
@media (max-width: 768px) {
  .title {
    font-size: 2rem;
  }
  .description {
    font-size: 1rem;
  }
  .content {
    padding: 30px;
  }
}
</style>
