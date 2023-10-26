<template>
    <MainLayout>
        <div>

            <h1>{{ artigo.titulo }}</h1>
            <p>{{ artigo.conteudo }}</p>

        </div>
    </MainLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import MainLayout from "@/Layouts/MainLayout.vue";

// Props
const props = defineProps({
    id_artigo: String
});

// Data
const artigo = ref({});

onMounted(() => {
    // Fetch the artigo data from your API when the component is mounted
    axios.get(`/api/artigo/${props.id_artigo}`)
        .then(response => {
            artigo.value = response.data;
        })
        .catch(error => {
            console.error("Error fetching the artigo data:", error);
        });
});
</script>
