<template>
  <main class="container">
    <header>
      <h1 class="title">News</h1>
    </header>

    <section class="content">
      <article class="card-news" v-for="(noticia,index) in noticias" :key="index">
        <header class="card-header">
          <h2>{{ noticia.title }}</h2>
          <time :datetime="noticia.created_at">{{ new Date(noticia.created_at).toLocaleDateString('pt-BR') }}</time>
        </header>
        <p class="description">{{ noticia.description }}</p>
      </article>
    </section>
  </main>
</template>

<script setup>
import http from '@/services/http.js';
import { onMounted, ref } from 'vue';

const noticias = ref([]);

async function News(){
    try{
        const { data } = await http.get('/news');
        noticias.value = data;
    }catch(error){
        console.log(error);
    }
}

onMounted(() => {
    News();
})
</script>

<style scoped>
/* Container principal */
.container{
  max-width: 100%;
  min-height: 100vh;
  margin: 0 auto;
  padding: 40px 20px;
  font-family: 'Verdana', sans-serif;
  color: #222;
  background-color: #fdfdfd;
}

/* Título principal */
.title{
  font-size: 2.5rem;
  font-weight: 700;
  text-align: center;
  margin-bottom: 40px;
  letter-spacing: 1px;

  background: linear-gradient(90deg, #1e3a8a, #2563eb);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

/* Conteúdo */
.content{
  display: flex;
  flex-direction: column;
  gap: 30px;
}

/* Card de notícia */
.card-news{
  border-left: 4px solid #2600ff;
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  transition: background-color 0.3s;
}

.card-news:hover{
  background-color: #f9f9f9;
}

.card-header{
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
}

.card-header h2{
  font-size: 1.5rem;
  font-weight: 600;
  margin: 0;
}

.card-header time{
  font-size: 0.9rem;
  color: #888;
}

.description{
  font-size: 1rem;
  line-height: 1.6;
  color: #444;
}

/* Responsividade */
@media (max-width: 480px){
  .title{
    font-size: 2rem;
  }

  .card-header h2{
    font-size: 1.3rem;
  }

  .description{
    font-size: 0.95rem;
  }
}
</style>
