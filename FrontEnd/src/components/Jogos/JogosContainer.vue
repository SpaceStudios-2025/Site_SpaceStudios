<template>
  <main class="store" role="main" aria-label="Loja de jogos">
    <!-- Cabeçalho -->
    <header class="store__header">
      <h1 class="store__title">Nossos Jogos 🎮</h1>

      <form class="store__search" @submit.prevent="searchGames" role="search" aria-label="Buscar jogos">
        <input
          class="store__searchInput"
          type="search"
          v-model="searchQuery"
          placeholder="Pesquisar jogo..."
          aria-label="Pesquisar jogo"
        />
        <button class="store__searchBtn" type="submit" aria-label="Pesquisar">
          <img src="@/assets/img/find.png" alt="" aria-hidden="true" />
        </button>
      </form>
    </header>

    <!-- Grade de jogos -->
    <section class="games" aria-label="Lista de jogos">

      <p v-if="!displayedGames.length" class="games__empty">Nenhum jogo encontrado.</p>

      <div v-else class="games__grid">
        <article v-for="(game, i) in displayedGames" :key="i" class="card" itemscope itemtype="https://schema.org/VideoGame">
          <div class="card__bg" :style="{ backgroundImage: `url(${game.imageUrl})` }">
            <div class="card__overlay">
              <p class="card__meta" itemprop="genre">{{ game.genre || 'Aventura' }}</p>
              <h3 class="card__title" itemprop="name">{{ game.title }}</h3>
              <a :href="game.link" target="_blank" rel="noopener" class="btn" itemprop="url">Jogar Agora</a>
            </div>
          </div>
        </article>
      </div>
    </section>
  </main>
</template>

<script setup>
import { ref, onMounted } from "vue";
import http from "@/services/http.js";

const games = ref([]);
const displayedGames = ref([]);
const searchQuery = ref("");

async function Games() {
  try {
    const { data } = await http.get("/games");
    games.value = await Promise.all(
      data.map(async (game) => {
        if (game.image) game.imageUrl = await ImageUrl(game.image);
        return game;
      })
    );
    displayedGames.value = games.value;
  } catch (e) {
    console.log("Erro ao carregar jogos:", e);
  }
}

async function ImageUrl(img) {
  try {
    const res = await http.get(`/image/${img}`, { responseType: "blob" });
    return URL.createObjectURL(res.data);
  } catch (e) {
    console.log("Erro ao carregar imagem:", e);
    return null;
  }
}

onMounted(Games);

function searchGames() {
  const q = searchQuery.value.trim().toLowerCase();
  displayedGames.value = q
    ? games.value.filter((g) => g.title?.toLowerCase().includes(q))
    : games.value;
}
</script>

<style scoped>
/* ================================
   TOKENS/VARIÁVEIS (escopo local)
   ================================ */
.store {
  --bg: #121212;
  --text: #ffffff;
  --muted: #bdbdbd;
  --surface: #1e1e1e;
  --border: #2a2a2a;
  --brand: #003cff;
  --brand-hover: #1f5bff;
  --radius: 14px;
  --gap-page: 32px;
  --gap-grid: 24px;
  --max-w: 1200px;

  /* Base container */
  min-height: 100%;
  background: var(--bg);
  color: var(--text);
  padding: 40px 20px;
  display: block; /* evita heranças estranhas de display:flex do pai */
  box-sizing: border-box;
}

/* Resets leves dentro do escopo */
.store *, .store *::before, .store *::after { box-sizing: border-box; }
.store img { display: block; max-width: 100%; height: auto; }

/* ================================
   HEADER
   ================================ */
.store__header {
  margin: 0 auto var(--gap-page);
  max-width: var(--max-w);
  text-align: center;
}

.store__title {
  font-size: clamp(1.8rem, 3.5vw, 3rem);
  letter-spacing: 1px;
  margin: 0 0 16px;
  text-shadow: 0 2px 8px rgba(0,0,0,.5);
}

/* Busca */
.store__search {
  display: grid;
  grid-template-columns: 1fr auto;
  gap: 0;
  max-width: 520px;
  margin: 0 auto;
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  overflow: hidden;
}

.store__searchInput {
  background: transparent;
  color: var(--text);
  border: 0;
  padding: 12px 14px;
  font-weight: 600;
  outline: none;
}

.store__searchInput::placeholder { color: var(--muted); }

.store__searchBtn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 0 14px;
  border: 0;
  background: var(--brand);
  cursor: pointer;
}

.store__searchBtn img {
  width: 20px;
  filter: brightness(0) invert(1);
  transition: transform .2s ease;
}

.store__searchBtn:hover img,
.store__searchBtn:focus-visible img {
  transform: scale(1.1);
}

.store__searchInput:focus-visible {
  outline: 2px solid var(--brand);
  outline-offset: -2px; /* dentro do container */
}

/* ================================
   LISTA DE JOGOS
   ================================ */
.games {
  margin: 0 auto;
  max-width: var(--max-w);
}

.games__title {
  font-size: clamp(1.2rem, 2.5vw, 2rem);
  text-align: center;
  margin: 0 0 16px;
  color: var(--text);
}

.games__empty {
  text-align: center;
  color: var(--muted);
  margin-top: 24px;
}

/* Grid responsivo e estável */
.games__grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
  gap: var(--gap-grid);
}

/* ================================
   CARD DO JOGO
   ================================ */
.card {
  border-radius: var(--radius);
  overflow: hidden;
  position: relative;
  cursor: pointer;
  transition: all 0.3s ease;
}

.card:hover {
  transform: scale(1.02);
}

/* Imagem de fundo */
.card__bg {
  width: 100%;
  aspect-ratio: 9/14;
  background-size: cover;
  background-position: center;
  position: relative;
  display: flex;
  align-items: flex-end;
}

/* Overlay escuro para texto */
.card__overlay {
  width: 100%;
  padding: 16px;
  background: linear-gradient(to top, rgba(0,0,0,0.75), rgba(0,0,0,0));
  color: #fff;
  display: flex;
  flex-direction: column;
  gap: 8px;
  transition: all 0.3s ease;
}

/* Hover sutil no overlay */
.card:hover .card__overlay {
  background: linear-gradient(to top, rgba(0,0,0,0.85), rgba(0,0,0,0));
}

/* Título e gênero */
.card__meta {
  font-size: 0.85rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  color: #ddd;
}

.card__title {
  font-size: 1.2rem;
  font-weight: 700;
  margin: 0;
}

/* Botão sofisticado com gradiente e efeito elegante */
.btn {
  display: inline-block;
  text-align: center;
  padding: 12px 0;
  background: linear-gradient(135deg, #003cff, #1f5bff);
  color: #fff;
  font-weight: 700;
  border-radius: 12px;
  text-decoration: none;
  position: relative;
  overflow: hidden;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
}

/* Efeito de brilho animado */
.btn::after {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: rgba(255, 255, 255, 0.2);
  transform: rotate(45deg) translateX(-100%);
  transition: transform 0.5s ease;
}

.btn:hover::after {
  transform: rotate(45deg) translateX(100%);
}

/* Hover elegante */
.btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.55);
}

/* Clique */
.btn:active {
  transform: translateY(1px);
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.4);
}

/* Responsividade */
@media (max-width: 480px) {
  .card__title { font-size: 1rem; }
  .btn { font-size: 0.9rem; padding: 8px 0; }
}
/* Responsividade */
@media (max-width: 768px) {
  .card__title {
    font-size: 1.05rem;
  }
}

@media (max-width: 480px) {
  .card__body {
    padding: 10px 12px;
  }

  .btn {
    font-size: 0.9rem;
    padding: 8px 0;
  }
}

/* ================================
   RESPONSIVIDADE
   ================================ */
@media (max-width: 768px) {
  .store { --gap-grid: 16px; }
  .card__title { font-size: 1.05rem; }
}

@media (max-width: 420px) {
  .games__grid { grid-template-columns: 1fr; }
  .card__media { aspect-ratio: 16 / 10; }
}
</style>
