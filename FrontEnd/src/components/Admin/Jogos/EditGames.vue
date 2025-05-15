<template lang="">
    <div class="container">
        <div class="title">
            <h1>Editar Jogo</h1>
            <button @click="fechar"><span class="material-icons">clear</span></button>
        </div>

        <div class="content">
            <form class="formulario" @submit.prevent="editGame">

                <label for=""> Titulo
                    <input type="text" placeholder="Insira o titulo..." v-model="jogo.title">
                </label>

                <label for=""> Descricão: 
                    <textarea placeholder="Insira a descricão..." v-model="jogo.description"></textarea>
                </label>
                
                <label for=""> Link:
                    <input type="text" placeholder="Insira o link do jogo..." v-model="jogo.link">
                </label>

                <label for=""> Imagem: 
                    <input type="file" @change="handleFile"/>
                </label>

                <button type="submit">Editar Jogo</button>
            </form>
        </div>
    </div>
</template>
<script setup>
// @ts-ignore
import http from '@/services/http.js';
import { ref, onMounted } from 'vue';

const emit = defineEmits(['close']);

function fechar() {
    emit('close'); // isso vai notificar o pai
}

const jogo = ref({
    title: '',
    description: '',
    image: '',
    link: '',
});

const form = {
    filename: '',
    file: null
};

const idGame = defineProps({
    id: [String,Number]
});



function handleFile(e) {
    const selected = e.target.files[0];
    const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];

    if (!allowedTypes.includes(selected.type)) {
        alert('Arquivo não suportado');
        return;
    }

    form.file = selected;
}

async function editGame() {
    const formData = new FormData();
    formData.append('file', form.file);

    try {
        if(form.file != null){
            const { upload } = await http.post('/upload', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
            
            console.log('Arquivo enviado:', upload);
        }
        

        try{
            
            if(form.file != null){
                jogo.value.image = form.file.name;
            }

            await http.put(`/games/update/${idGame.id}`,{
                title: jogo.value.title.toString(),
                description: jogo.value.description.toString(),
                image: jogo.value.image.toString(),
                link: jogo.value.link
            });

            fechar();
            window.location.reload();
        }catch(error){
            console.error("Erro ao criar o jogo: ", error.response || error);
            alert("Erro ao criar jogo!");
        }
       
    } catch (error) {
        console.error("Erro ao enviar o arquivo:", error.response || error);
        alert('Erro ao enviar o arquivo, verifique o console. ' + form.file);
    }
}

async function showGame(){
    try{
        const {data} = await http.get(`/games/show/${idGame.id}`);

        jogo.value.title = data.title;
        jogo.value.description = data.description;
        jogo.value.image = data.image;
        jogo.value.link = data.link;

    }catch(error){
        console.error("Erro ao receber informacoes do jogo", error.response || error);
    }
}


onMounted(() => {
    showGame();
});


</script>
<style scoped>
    /* Global */
    button{
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        border-radius: 8px;
        box-shadow: -2px 2px 3px rgba(0,0,0,.2);
        padding: 5px;

        cursor: pointer;
        transition: all .5s;
    }

    button:hover{
        opacity: .9;
        transform: scale(1.008);
    }

    .container{
        background-color: rgba(255,255,255,.9);
        box-shadow: -2px 2px 4px rgba(0,0,0,.2);
        border-radius: 10px;

        padding: 20px;

        width: 70%;

        position: absolute;
        top: 50%;
        left: 58%;

        transform: translate(-50%,-50%);
    }

    .title{
        display: flex;
        align-items: center;
        justify-content: space-between;

        h1{
            font-size: 1.5rem;
            letter-spacing: 1px;

            font-weight: bold;

            color: #555;
        }

        button{
            background-color: rgb(241, 62, 56);
            color: #fff;
        }

        margin-bottom: 20px;
    }

    .formulario{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        width: 100%;

        gap: 20px;

        label{
            display: flex;
            align-items: start;
            justify-content: center;
            flex-direction: column;

            width: 100%;

            font-size: 1rem;
            letter-spacing: 2px;
            color: #222;
        }

        input{
            width: 100%;
            height: 40px;
        }

        input::placeholder{
            color: #ccc;
            letter-spacing: 2px;
            font-size: 1rem;
        }

        textarea{
            width: 100%;
            height: 100px;

            resize:none;
        }

        textarea::placeholder{
            color: #ccc;
            font-size: 1.1rem;
        }

        input,textarea{
            border-radius: 12px;
            border: 1px solid #ccc;

            box-shadow: -1px 1px 2px rgba(0,0,0,.2);

            padding: 10px;

            font-size: 1.2rem;
        }

        button{
            background-color: rgb(77, 180, 240);
            padding: 10px;
            width: 100%;

            font-size: 1.1rem;
            letter-spacing: 2px;

            color: #fff;
        }
    }
</style>