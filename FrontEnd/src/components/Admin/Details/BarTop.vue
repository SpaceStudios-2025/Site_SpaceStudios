<template lang="">
    <div class="bar">
        <h2 class="title">{{texto}}</h2>
        <div class="container">
            <img src="@/assets/img/logo-space.png" alt="Logo">
            <h3> Space Studios </h3>
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
        display:flex;
        align-items:center;
        justify-content:space-between;

        background-color: #414a55;
        border-bottom: 3px solid #222;

        margin-left: 220px;
        height: 60px;

        padding: 5px 20px;

        color: #fff;

        position: sticky;
        top: 0;
    }

    .title{
        font-size: 1.6rem;
        letter-spacing: 2px;
    }

    .container{
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 8px;

        img{
            width: 60px;
            border-radius: 50%;

            margin-right: 10px;
        }

        h3{
            font-weight: bold;
            font-size: .9rem;
            letter-spacing: 1px;
        }
    }
</style>