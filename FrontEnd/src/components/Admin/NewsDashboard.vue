<template>
  <BarTop/>
    <div class="dashboard">
      <div class="newsBox">
        <div class="titulo">
          <h3>News</h3>
          <button class="btnAdd" @click="CreationNews">
            <span class="material-icons">add</span>
          </button>
        </div>
        <div class="newContent">
          <ul>
            <li v-for="(noticia,index) in noticias" :key="index">
              <h2>{{ noticia.title }}</h2>
              <p>Data: {{new Date(noticia.created_at).toLocaleDateString('pt-BR')}}</p>

              <div class="buttons">
                <button class="btn_view">
                  <span class="material-icons">visibility</span>
                </button>
                <button class="btn_edit">
                  <span class="material-icons">edit</span>
                </button>
                <button class="btn_delete" @click="Destroy(noticia.id)">
                  <span class="material-icons">delete</span>
                </button>
              </div>
            </li>
          </ul>
        </div>
      </div>

      <div v-if="create">
        <CreateNews @close="create = false"/>
      </div>
        
    </div>
</template>
<script setup>
  import BarTop from '@/components/Admin/Details/BarTop.vue';
  import CreateNews from '@/components/Admin/News/CreateNews.vue';
  import {onMounted, ref} from 'vue';

  import http from '@/services/http.js';

  const create = ref(false);

  function CreationNews(){
    create.value = true;
  }

  const noticias = ref();

  async function News(){
    try{
      const {data} = await http.get('/news');
      noticias.value = data;

    }catch(error){
      console.log(error);
    }
  }

  async function Destroy(id){
    try{
      const {data} = await http.delete(`/news/${id}`);
      console.log(data);

      News();
    }catch(error){
      console.log(error);
    }
  }

  onMounted(() => {
    News();
  });

</script>
<style scoped>


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