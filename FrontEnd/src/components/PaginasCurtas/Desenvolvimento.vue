<template>
  <main class="development-page">
    <header class="dev-header">
      <h1>Nosso Processo de Desenvolvimento</h1>
      <p>Descubra como criamos nossos jogos passo a passo</p>
    </header>

    <section class="timeline">
      <div 
        v-for="(step, index) in steps" 
        :key="index" 
        :class="['timeline-item', index % 2 === 0 ? 'left' : 'right']"
      >
        <div class="content" :style="{ borderColor: step.color }">
          <h2>{{ step.title }}</h2>
          <p>{{ step.description }}</p>
        </div>
        <img :src="step.image" :alt="step.title" class="timeline-image"/>
      </div>
    </section>
  </main>
</template>

<script setup>
import Planejamento from '@/assets/img/Games/ideia.png';
import GameDesign from '@/assets/img/Games/design.png';
import Desenvolvimento from '@/assets/img/Games/desenvolvimento.png';
import Teste from '@/assets/img/Games/teste.png';
import Lancamento from '@/assets/img/Games/lancamento.png';
const steps = [
  {
    title: "Planejamento",
    description: "Definimos a ideia do jogo, mecânicas principais, público-alvo e objetivos do projeto.",
    image: Planejamento,
    color: "#ff6f61"
  },
  {
    title: "Design de Jogos",
    description: "Criamos o conceito visual, personagens, fases e desafios, garantindo diversão e fluidez.",
    image: GameDesign,
    color: "#6a5acd"
  },
  {
    title: "Desenvolvimento",
    description: "Programamos o jogo na Unity, implementando mecânicas, física, IA e interações do jogador.",
    image: Desenvolvimento,
    color: "#20b2aa"
  },
  {
    title: "Testes",
    description: "Realizamos testes internos e beta para identificar bugs, ajustar dificuldade e melhorar a experiência.",
    image: Teste,
    color: "#ffb347"
  },
  {
    title: "Lançamento",
    description: "Publicamos o jogo em plataformas selecionadas e acompanhamos feedbacks para futuras melhorias.",
    image: Lancamento,
    color: "#ff69b4"
  }
];
</script>

<style scoped>
:root {
  --bg-color: #121212;
  --text-color: #f0f0f0;
  --section-bg: #1a1a1a;
  --hover-color: #333;
}

.development-page {
  background-color: var(--bg-color);
  color: var(--text-color);
  min-height: 100vh;
  padding: 2rem;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.dev-header {
  text-align: center;
  margin-bottom: 3rem;
}

.dev-header h1 {
  color: #f1f2ff;
  font-size: 2.5rem;
}

.dev-header p {
  color: #bbb;
  font-size: 1rem;
}

/* Timeline */
.timeline {
  position: relative;
  max-width: 900px;
  margin: 0 auto;
}

.timeline::after {
  content: '';
  position: absolute;
  width: 4px;
  background-color: #555;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -2px;
}

.timeline-item {
  padding: 1rem 2rem;
  position: relative;
  width: 50%;
  display: flex;
  align-items: center;
  gap: 1rem;
  transition: transform 0.3s ease;
}

.timeline-item:hover {
  transform: translateY(-8px);
}

.timeline-item.left {
  left: 0;
  flex-direction: row-reverse;
  text-align: right;
}

.timeline-item.right {
  left: 50%;
  flex-direction: row;
  text-align: left;
}

.timeline-item .content {
  background-color: var(--section-bg);
  padding: 1rem;
  border-left: 4px solid;
  border-radius: 10px;
  flex: 1;
  transition: background-color 0.3s ease, transform 0.3s ease;
}

.timeline-item:hover .content {
  background-color: var(--hover-color);
  transform: scale(1.03);
}

.timeline-item h2 {
  margin: 0;
  margin-bottom: 0.5rem;
  color: inherit;
}

.timeline-item p {
  margin: 0;
  color: #ddd;
}

.timeline-image {
  width: 120px;
  object-fit: cover;
  border-radius: 10px;
}

/* Ajustes responsivos */
@media screen and (max-width: 768px) {
  .timeline-item {
    width: 100%;
    left: 0 !important;
    flex-direction: column !important;
    text-align: center !important;
  }

  .timeline-item.left, .timeline-item.right {
    left: 0;
  }

  .timeline-item .content {
    border-left: none;
    border-top: 4px solid;
  }

  .timeline-image {
    width: 100%;
    height: 200px;
  }
}
</style>
