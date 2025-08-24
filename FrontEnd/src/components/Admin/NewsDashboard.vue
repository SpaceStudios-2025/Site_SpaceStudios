<template>
  <BarTop :texto="title"/>
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
                <button class="btn_view" @click="view">
                  <span class="material-icons">visibility</span>
                </button>
                <button class="btn_edit" @click="EditarNoticia">
                  <span class="material-icons">edit</span>
                </button>
                <button class="btn_delete" @click="Destroy(noticia.id)">
                  <span class="material-icons">delete</span>
                </button>
                
              </div>

              <div v-if="edit" class="edit">
                <EditNews @close="edit = false" :id="noticia.id"/>
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
  import EditNews from '@/components/Admin/News/EditNews.vue';
  import {onMounted, ref, defineEmits} from 'vue';

  import http from '@/services/http.js';
  import router from '@/router'

  const create = ref(false);
  const edit = ref(false);
  const emit = defineEmits(['sendInfo']);

  function CreationNews(){
    create.value = true;
  }
  
  function EditarNoticia(){
    edit.value = true;
  }

  
  function view(){
    router.push('/noticias');
  }

  const title = ref('News');

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

    emit('sendInfo',{mensagem: 'News'});
  });

</script>
<style scoped>

.edit{
    width: 70%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background-color: #1f1f1f;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 0 15px rgba(0,0,0,0.5);
}

/* Global */
button{
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: bold;
    padding: 10px 15px;
    width: auto;

    box-shadow: -2px 2px 4px rgba(0,0,0,.6);

    cursor: pointer;
    transition: all .3s;
}

button:hover{
    transform: scale(1.05);
    box-shadow: -2px 2px 6px rgba(0,0,0,.7);
    opacity: .9;
}

.dashboard {
    display: flex;
    min-height: 100vh;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #e2e8f0;
    background-color: #121212;
    overflow: hidden;
    margin-left: 220px;
    padding: 10px;
}

.newsBox{
    width: 100%;
    height: auto;
    margin: 2rem;
    background-color: #1e1e1e;
    padding: 20px;
    border-radius: 12px;
    border: 1px solid #333;
    box-shadow: 0 2px 10px rgba(0,0,0,0.5);
}

.titulo{
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    border-bottom: 2px solid #333;
    padding: 10px;

    h3{
        font-size: 1.5rem;
        color: #f1f5f9;
    }

    button{
        display: flex;
        align-items: center;
        justify-content: center;
    }
}

.btnAdd{
    color: #fff;
    background-color: #28a745;
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
        background-color: #2c2c2c;
        border-radius: 12px;
        border-bottom: 2px solid #444;
        border-left: 2px solid #444;
        padding: 10px 15px;
        list-style-type: none;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 10px;
        color: #e2e8f0;
        transition: background 0.3s;
    }

    ul li:hover {
        background-color: #383838;
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
            background-color: #6b7280;
            color: #fff;
        }

        .btn_edit{
            background-color: #3b82f6;
            color: #fff;
        }

        .btn_delete{
            background-color: #ef4444;
            color: #fff;
        }
    }
}

</style>
