<template lang="">
    <div class="container">
        <div class="title">
            <h1>Adicionar Jogo</h1>
            <button @click="fechar"><span class="material-icons">clear</span></button>
        </div>

        <div class="content">
            <form class="formulario" @submit.prevent="addGame">

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
                    <input type="file" @change="handleFile" />
                </label>

                <button type="submit">Criar Jogo</button>
            </form>
        </div>
    </div>
</template>
<script setup>
// @ts-ignore
import http from '@/services/http.js';
import { ref } from 'vue';

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


function handleFile(e) {
    const selected = e.target.files[0];
    const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];

    if (!allowedTypes.includes(selected.type)) {
        alert('Arquivo não suportado');
        return;
    }

    form.file = selected;
}

async function addGame() {
    if (!form.file) return alert('Escolha um arquivo válido');

    const formData = new FormData();
    formData.append('file', form.file);

    try {
        const { upload } = await http.post('/upload', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });

        try{
        
            jogo.value.image = form.file.name;

            const {data} = await http.post('/jogo',{
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

        console.log('Arquivo enviado:', upload);

       

    } catch (error) {
        console.error("Erro ao enviar o arquivo:", error.response || error);
        alert('Erro ao enviar o arquivo, verifique o console.');
    }
}
</script>
<style scoped>
/* Global */
button {
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.4);
    padding: 8px 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 600;
}

button:hover {
    opacity: 0.95;
    transform: scale(1.05);
}

/* Container */
.container {
    background-color: #1e1e1e;
    box-shadow: 0 4px 15px rgba(0,0,0,0.6);
    border-radius: 14px;
    padding: 25px;
    width: 70%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #e2e8f0;
}

/* Title */
.title {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 25px;
}

.title h1 {
    font-size: 1.6rem;
    letter-spacing: 1px;
    font-weight: 700;
    color: #f1f5f9;
    text-shadow: 0 1px 2px rgba(0,0,0,0.5);
}

.title button {
    background-color: #ef4444;
    color: #fff;
    padding: 8px 14px;
}

/* Form */
.formulario {
    display: flex;
    flex-direction: column;
    width: 100%;
    gap: 20px;
}

.formulario label {
    display: flex;
    flex-direction: column;
    width: 100%;
    font-size: 1rem;
    letter-spacing: 1px;
    color: #cbd5e1;
}

.formulario input,
.formulario textarea {
    width: 100%;
    border-radius: 12px;
    border: 1px solid #444;
    background-color: #2a2a2a;
    color: #f1f5f9;
    padding: 10px;
    font-size: 1.1rem;
    box-shadow: inset -1px 1px 3px rgba(0,0,0,0.5);
    transition: all 0.3s ease;
}

.formulario input::placeholder,
.formulario textarea::placeholder {
    color: #888;
}

.formulario input:focus,
.formulario textarea:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 8px rgba(59,130,246,0.6);
}

.formulario textarea {
    height: 120px;
    resize: none;
}

.formulario button {
    background-color: #3b82f6;
    padding: 12px;
    font-size: 1.1rem;
    letter-spacing: 1px;
    color: #fff;
    width: 100%;
    border-radius: 12px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.4);
    transition: all 0.3s ease;
}

.formulario button:hover {
    background-color: #2563eb;
}
</style>
