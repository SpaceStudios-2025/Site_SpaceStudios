<script setup>

  import Menu from '@/components/Menu.vue'
  import Home from '@/components/HomePage/Home.vue'
  import Sobre from '@/components/HomePage/SobreNos.vue'
  import FooterBar from '@/components/FooterBar.vue'
  import Jogos from '@/components/HomePage/Jogo.vue'
  import Contato from '@/components/HomePage/Contato.vue'

</script>

<template>
  <main>
    <Menu/>

      <Home id="home"/>
      <Sobre id="sobre"/>
      <Jogos id="estudio"/>
      <Contato id="contato"/>
    
    <FooterBar/>
  </main>
</template>
