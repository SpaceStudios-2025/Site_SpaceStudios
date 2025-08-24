<template>
  <BarTop :texto="title"/>
  <div class="dashboard">
    <div class="newsBox">
      <div class="titulo">
        <h3>Games</h3>
        <button class="btnAdd" @click="CreationGames">
          <span class="material-icons">add</span>
        </button>
      </div>
      <div class="newContent">
        <ul>
          <li v-for="(game, index) in jogos" :key="index">
            <img v-if="game.imageUrl" :src="game.imageUrl" alt="Imagem do Jogo" style="max-width: 80px;" />
            <h2>{{ game.title }}</h2>
            <p>Data: {{ new Date(game.created_at).toLocaleDateString('pt-BR') }}</p>
            <div class="buttons">
              <button class="btn_view" @click="view">
                <span class="material-icons">visibility</span>
              </button>
              <button class="btn_edit" @click="EditarJogo">
                <span class="material-icons">edit</span>
              </button>
              <button class="btn_delete" @click="Destroy(game.id)">
                <span class="material-icons">delete</span>
              </button>
            </div>

            <div v-if="edit" class="edit">
                <EditGames @close="edit = false" :id="game.id"/>
            </div>
          </li>
        </ul>
      </div>
    </div>

    <div v-if="create">
      <CreateGames @close="create = false"/>
    </div>

    
  </div>
</template>

<script setup>
import BarTop from '@/components/Admin/Details/BarTop.vue';
import CreateGames from '@/components/Admin/Jogos/CreateGames.vue';
import EditGames from '@/components/Admin/Jogos/EditGames.vue';

import { onMounted, ref } from 'vue';
import http from '@/services/http.js';
import router from '@/router';

const create = ref(false);
const edit = ref(false);
const jogos = ref([]);

const title = ref('Jogos');

function CreationGames() {
  create.value = true;
}

function EditarJogo() {
  edit.value = true;
}

function view(){
  router.push('/jogos');
}

async function Games() {
  try {
    const { data } = await http.get('/games');
    // Para cada jogo, vamos adicionar a URL da imagem
    jogos.value = await Promise.all(data.map(async (game) => {
      if (game.image) {
        game.imageUrl = await ImageUrl(game.image);
      }
      return game;
    }));
  } catch (error) {
    console.log(error);
  }
}

async function ImageUrl(img) {
  try {
    const url = await http.get(`/image/${img}`, {
      responseType: 'blob',
    });
    const imageUrl = URL.createObjectURL(url.data);
    return imageUrl;
  } catch (error) {
    console.log('Error: ' + error);
    return null;
  }
}

async function Destroy(id) {
  try {
    const { data } = await http.delete(`/games/${id}`);
    console.log(data);
    Games();
  } catch (error) {
    console.log(error);
  }
}

onMounted(() => {
  Games();
});
</script>
<style scoped>
/* ----------------- GLOBAL ----------------- */
button {
  border: none;
  border-radius: 10px;
  font-size: 0.95rem;
  font-weight: 600;
  padding: 10px 14px;
  width: auto;

  box-shadow: 0 3px 6px rgba(0,0,0,.15);
  cursor: pointer;
  transition: all 0.3s ease;
}

button:hover {
  transform: translateY(-2px);
  opacity: 0.9;
}

/* ----------------- DASHBOARD ----------------- */
.dashboard {
  display: flex;
  min-height: 100vh;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #e2e2e2;
  background-color: #1a1a1a;

  margin-left: 220px;
  padding: 20px;
}

/* ----------------- BOX ----------------- */
.newsBox {
  width: 100%;
  height: auto;

  margin: 2rem auto;
  background: #222;
  padding: 25px;

  border-radius: 16px;
  border: 1px solid rgba(255,255,255,.1);
  box-shadow: 0 5px 15px rgba(0,0,0,.3);
  transition: all 0.3s ease;
}

/* ----------------- TÍTULO ----------------- */
.titulo {
  display: flex;
  align-items: center;
  justify-content: space-between;

  margin-bottom: 20px;
  border-bottom: 1px solid rgba(255,255,255,.1);
  padding-bottom: 10px;
}

.titulo h3 {
  font-size: 1.6rem;
  font-weight: bold;
  color: #fff;
}

.titulo button {
  display: flex;
  align-items: center;
  justify-content: center;
}

.btnAdd {
  color: #fff;
  background: linear-gradient(135deg, #28a745, #38d46d);
}

/* ----------------- LISTA ----------------- */
.newContent {
  margin-top: 20px;
  display: flex;
  flex-direction: column;
  width: 100%;
  overflow-x: hidden;

}

.newContent ul {
  width: 100%;
  padding: 0;
}

.newContent ul li {
  width: 100%;
  background: #2a2a2a;
  border-radius: 14px;
  border: 1px solid rgba(255,255,255,.08);
  padding: 15px 20px;

  list-style: none;
  display: flex;
  align-items: center;
  justify-content: space-between;

  margin-top: 12px;
  transition: all 0.3s ease;
}

/* Efeito hover apenas nos cards */
.newContent ul li:hover {
  background: #333;
  box-shadow: 0 4px 12px rgba(0,0,0,.5);
  transform: scale(1.01);
}

/* ----------------- CONTEÚDO DO JOGO ----------------- */
.newContent img {
  border-radius: 10px;
  box-shadow: 0 2px 6px rgba(0,0,0,.4);
}

.newContent h2 {
  font-size: 1.1rem;
  font-weight: 600;
  color: #f5f5f5;
  margin-left: 15px;
  flex: 1;
}

.newContent p {
  font-size: 0.9rem;
  color: #ccc;
  margin-right: auto;
  margin-left: 20px;
}

/* ----------------- BOTÕES ----------------- */
.buttons {
  display: flex;
  align-items: center;
  gap: 12px;
}

.buttons button {
  display: flex;
  align-items: center;
  justify-content: center; 
  padding: 8px 10px;
  border-radius: 10px;
}

.btn_view {
  background-color: #6c757d;
  color: #fff;
}

.btn_edit {
  background-color: #007bff;
  color: #fff;
}

.btn_delete {
  background-color: #e63946;
  color: #fff;
}

/* ----------------- MODAL DE EDIÇÃO ----------------- */
.edit {
  width: 70%;
  max-width: 900px;

  position: fixed;
  top: 50%;
  left: 50%;
  z-index: 999;

  background: #2a2a2a;
  border-radius: 18px;
  box-shadow: 0 10px 25px rgba(0,0,0,.6);

  transform: translate(-50%,-50%);
  animation: fadeIn 0.4s ease;
}

@keyframes fadeIn {
  from {opacity: 0; transform: translate(-50%, -45%);}
  to {opacity: 1; transform: translate(-50%, -50%);}
}
</style>

