<template>
  <div class="dashboard">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h1 class="brand">Space Studios</h1>
      <nav class="nav">
        <button class="tab-btn" @click="currentTab = 'stats'">📊 Estatísticas</button>
        <button class="tab-btn" @click="currentTab = 'jogos'">🎮 Jogos</button>
        <button class="tab-btn" @click="currentTab = 'cursos'">📚 Cursos</button>
        <button class="tab-btn" @click="currentTab = 'noticias'">📰 Notícias</button>
      </nav>
    </aside>

    <!-- Conteúdo -->
    <main class="content">
      <section v-if="currentTab === 'stats'" class="panel">
        <h2>Estatísticas</h2>
        <div class="kpis">
          <div class="kpi-card">👥 Usuários<br><strong>1.200</strong></div>
          <div class="kpi-card">🎮 Jogos<br><strong>8</strong></div>
          <div class="kpi-card">📚 Cursos<br><strong>5</strong></div>
          <div class="kpi-card">📰 Notícias<br><strong>12</strong></div>
        </div>
        <div class="charts">
          <div class="chart bar-chart">
            <h3>Jogos Jogados</h3>
            <div class="bars">
              <div class="bar" style="height: 60%">60%</div>
              <div class="bar" style="height: 40%">40%</div>
              <div class="bar" style="height: 80%">80%</div>
            </div>
          </div>
          <div class="chart line-chart">
            <h3>Acessos</h3>
            <svg viewBox="0 0 200 100" class="line-svg">
              <polyline fill="none" stroke="#4ade80" stroke-width="3" points="0,80 40,60 80,65 120,20 160,40 200,10" />
            </svg>
          </div>
        </div>
      </section>

      <section v-if="currentTab === 'jogos'" class="panel">
        <h2>Jogos</h2>
        <ul>
          <li>Jogo de Terror</li>
          <li>Plataforma Espacial</li>
        </ul>
        <form class="form">
          <input type="text" placeholder="Nome do Jogo" />
          <button type="button">Adicionar</button>
        </form>
      </section>

      <section v-if="currentTab === 'cursos'" class="panel">
        <h2>Cursos</h2>
        <ul>
          <li>Curso de Unity</li>
          <li>Curso de Pixel Art</li>
        </ul>
        <form class="form">
          <input type="text" placeholder="Nome do Curso" />
          <button type="button">Adicionar</button>
        </form>
      </section>

      <section v-if="currentTab === 'noticias'" class="panel">
        <h2>Notícias</h2>
        <ul>
          <li>Lançamento de novo jogo em breve</li>
          <li>Parceria com estúdios independentes</li>
        </ul>
        <form class="form">
          <input type="text" placeholder="Título da Notícia" />
          <button type="button">Adicionar</button>
        </form>
      </section>
    </main>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const currentTab = ref('stats')
</script>

<style scoped>
.dashboard {
  display: grid;
  grid-template-columns: 280px 1fr;
  min-height: 100vh;
  background: #0b0f14;
  color: #e6edf3;
}

/* Sidebar */
.sidebar {
  background: #111822;
  padding: 20px;
}

.tab-btn {
  display: block;
  width: 100%;
  text-align: left;
  padding: 12px;
  margin-bottom: 6px;
  border-radius: 8px;
  background: #0f1623;
  color: #9fb0c3;
  border: none;
  cursor: pointer;
}

.tab-btn:hover {
  background: #1a2333;
  color: white;
}

/* Conteúdo */
.content {
  padding: 20px;
}

.panel {
  background: #0f1723;
  border-radius: 12px;
  padding: 20px;
}

.kpis {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  margin-bottom: 30px;
}

.kpi-card {
  background: #1a2333;
  padding: 20px;
  border-radius: 10px;
  text-align: center;
  font-size: 1.2em;
}

.charts {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.chart {
  background: #1a2333;
  padding: 20px;
  border-radius: 10px;
}

.bar-chart .bars {
  display: flex;
  align-items: flex-end;
  gap: 10px;
  height: 120px;
}

.bar-chart .bar {
  flex: 1;
  background: #3b82f6;
  color: white;
  text-align: center;
  font-size: 0.8em;
  border-radius: 4px 4px 0 0;
}

.line-svg {
  width: 100%;
  height: 120px;
}

.form {
  margin-top: 20px;
  display: flex;
  gap: 10px;
}

.form input {
  flex: 1;
  padding: 10px;
  border-radius: 6px;
  border: none;
}

.form button {
  padding: 10px 16px;
  border: none;
  border-radius: 6px;
  background: #3b82f6;
  color: white;
  cursor: pointer;
}

.form button:hover {
  background: #2563eb;
}
</style>
