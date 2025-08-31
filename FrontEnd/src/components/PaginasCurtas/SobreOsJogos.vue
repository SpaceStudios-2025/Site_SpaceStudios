<template>
  <main class="home-games-page">
    <!-- Banner principal -->
    <section class="banner">
      <div class="banner-content">
        <h1>Sobre Nossos Jogos</h1>
        <p>Nossos jogos são criados com paixão e dedicação, combinando criatividade, design estratégico e tecnologia de ponta.</p>
        <router-link to="/jogos" class="btn">Ver Jogos</router-link>
      </div>
    </section>

    <!-- Sobre como pensamos os jogos -->
    <section class="about-games">
      <h2>Como Pensamos Nossos Jogos</h2>
      <p class="subtitle"> Cada projeto busca oferecer experiências divertidas, envolventes e memoráveis.</p>
      <div class="cards-section">
        <div class="card" v-for="(item, index) in gameAspects" :key="index">
          <img :src="item.img" :alt="item.title" />
          <div class="card-content">
            <h3>{{ item.title }}</h3>
            <p>{{ item.description }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Seção de destaque -->
    <section class="highlight">
      <h2>Paixão e Dedicação</h2>
      <p>Sempre valorizamos a opinião do público e a inovação em gameplay.</p>
    </section>
  </main>
</template>

<script>
import GameJam from '@/assets/img/Games/gamejam.jpg';
import GameDesign from '@/assets/img/Games/gamedesign.jpg';
import Public from '@/assets/img/Games/publico.jpg';
import Unity from '@/assets/img/Games/unity6.jpg';

export default {
  name: "HomeGames",
  data() {
    return {
      gameAspects: [
        {
          title: "Game Jams",
          description: "Diversos de nossos jogos são feitos em Game Jams, ou seja, em um curto período de tempo.",
          img: GameJam
        },
        {
          title: "Game Design",
          description: "Planejamos cada fase, nível e desafio para criar uma progressão divertida e imersiva.",
          img: GameDesign
        },
        {
          title: "Motor de Jogo",
          description: "Nossa equipe utiliza a Unity 6 para desenvolver os jogos, prezando sempre pelo que há de mais atualizado",
          img: Unity
        },
        {
          title: "Seguidores",
          description: "A opinião do público é uma parte essencial para o desenvolvimento de nossos jogos.",
          img: Public
        }
      ]
    };
  }
};
</script>

<style scoped>
/* ----------------- GERAL ----------------- */
.home-games-page {
  font-family: 'Quicksand', sans-serif;
  color: #eee;
  background-color: #111;
}

/* ----------------- BANNER ----------------- */
.banner {
  height: 60vh;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  position: relative;
}

.banner::after {
  content: '';
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,0.6);
}

.banner-content {
  position: relative;
  color: #fff;
  max-width: 800px;
  z-index: 1;
}

.banner-content h1 {
  font-size: 3rem;
  margin-bottom: 15px;
}

.banner-content p {
  font-size: 1.3rem;
  margin-bottom: 25px;
}

.banner-content .btn {
  background-color: #ff8c00;
  color: #111;
  padding: 12px 25px;
  font-weight: 700;
  border-radius: 50px;
  text-decoration: none;
  transition: all 0.3s ease;
}

.banner-content .btn:hover {
  background-color: #ffa233;
}

/* ----------------- SOBRE OS JOGOS ----------------- */
.about-games {
  padding: 60px 20px;
  text-align: center;
}

.about-games h2 {
  font-size: 2.5rem;
  margin-bottom: 10px;
  color: #ff8c00;
}

.about-games .subtitle {
  font-size: 1.2rem;
  color: #aaa;
  margin-bottom: 40px;
}

/* Cards */
.cards-section {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 30px;
  max-width: 1200px;
  margin: 0 auto;
}

.card {
  background: rgba(30, 30, 30, 0.95);
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 6px 20px rgba(0,0,0,0.5);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: pointer;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 30px rgba(0,0,0,0.6);
}

.card img {
  width: 100%;
  height: 160px;
  object-fit: cover;
}

.card-content {
  padding: 15px 20px;
}

.card-content h3 {
  font-size: 1.5rem;
  margin-bottom: 10px;
  color: #ff8c00;
}

.card-content p {
  font-size: 1rem;
  color: #ccc;
  line-height: 1.5;
}

/* ----------------- HIGHLIGHT ----------------- */
.highlight {
  background: #1e1e1e;
  text-align: center;
  padding: 60px 20px;
  border-top: 1px solid rgba(255,255,255,0.1);
  border-bottom: 1px solid rgba(255,255,255,0.1);
}

.highlight h2 {
  font-size: 2rem;
  color: #ff8c00;
  margin-bottom: 20px;
}

.highlight p {
  font-size: 1.1rem;
  color: #ccc;
  max-width: 800px;
  margin: 0 auto;
  line-height: 1.6;
}

/* ----------------- FOOTER ----------------- */
.footer-page {
  text-align: center;
  padding: 30px 10px;
  font-size: 1rem;
  color: #888;
}
</style>
