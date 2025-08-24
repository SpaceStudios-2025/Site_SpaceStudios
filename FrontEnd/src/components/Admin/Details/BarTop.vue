<template lang="">
  <div class="bar">
    <h2 class="title">{{texto}}</h2>
    <h3 class="center-text">Space Studios</h3>
    <div class="container">
      <img src="@/assets/img/logo-space.png" alt="Logo">
    </div>
  </div>
</template>

<script setup>
defineProps({
    texto: String
});
</script>

<style scoped>
.bar{
    display: flex;
    align-items: center;
    justify-content: space-between;

    background: linear-gradient(90deg, #1a1a1a, #2c2c2c);
    border-bottom: 2px solid #333;
    box-shadow: 0 2px 10px rgba(0,0,0,0.5);
    padding: 0 25px;
    height: 70px;
    color: #e2e8f0;
    position: sticky;
    top: 0;
    margin-left: 220px;
    border-radius: 0 0 12px 12px;
}

.title{
    font-size: 1.8rem;
    font-weight: 700;
    letter-spacing: 2px;
    text-shadow: 0 1px 2px rgba(0,0,0,0.5);
}

.center-text{
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    font-size: 1.2rem;
    font-weight: 600;
    letter-spacing: 1px;
    color: #f1f5f9;
}

.container{
    display: flex;
    align-items: center;
}

.container img{
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
    box-shadow: 0 0 8px rgba(0,0,0,0.6);
    transition: transform 0.3s ease;
}

.container img:hover{
    transform: scale(1.1);
}
</style>
