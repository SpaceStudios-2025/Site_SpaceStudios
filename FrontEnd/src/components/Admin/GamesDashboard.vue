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

  .edit{
    width: 70%;

    position: absolute;
    top: 50%;
    left: 50%;

    transform: translate(-50%,-50%);
  }

  /* Global */
  button{
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: bold;
    padding: 10px;
    width: auto;

    box-shadow: -2px 2px 3px rgba(0,0,0,.3);

    cursor: pointer;
    transition: all .5s;
  }

  button:hover{
    transform: scale(1.008);
    box-shadow: -2px 2px 4px 1px rgba(0,0,0,.3);

    opacity: .8;
  }

  .dashboard {
    display: flex;
    min-height: 100vh;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
    background-color: #f4f7fc;
    overflow: hidden;

    margin-left: 220px;
    padding: 10px;
  }

  .newsBox{
    width: 100%;
    height: auto;

    margin: 2rem;

    background-color: rgba(230, 230,230, 0.3);
    padding: 20px;

    border-radius: 12px;
    border: 2px solid rgba(216, 216, 216,.3);
  }

  .titulo{
    display: flex;
    align-items: center;
    justify-content: space-between;

    margin-bottom: 20px;

    border-bottom: 2px solid rgba(68, 68, 68,.4);
    padding: 10px;

    h3{
      font-size: 1.5rem;
    }

    button{
      display: flex;
      align-items: center;
      justify-content: center;
    }
  }

  .btnAdd{
    color: #fff;
    background-color: rgb(41, 184, 65);
  }

  .newContent{
    margin-top: 20px;
    display: flex;
    align-items: center;
    justify-content: center;

    width: 100%;
    flex-direction: column;

    overflow-y: auto;

    ul{
      width: 100%;
      

      padding: 10px 15px;
      
    }

    ul li {
      width: 100%;

      background-color: #fff;
      border-radius: 12px;
      border-bottom: 2px solid rgba(68, 68, 68,.4);
      border-left: 2px solid rgba(68, 68, 68,.4);
      padding: 10px 15px;

      list-style-type: none;
      display: flex;
      align-items: center;
      justify-content: space-between;

      margin-top: 10px;
    }

    .buttons{
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;

      button{
        display: flex;
        align-items: center;
        justify-content: center; 
      }

      .btn_view{
        background-color: #7c7c7c;
        color: #fff;
      }

      .btn_edit{
        background-color: rgb(48, 146, 236);
        color: #fff;
      }

      .btn_delete{
        background-color: rgb(241, 62, 56);
        color: #fff;
      }
    }
  }

</style>