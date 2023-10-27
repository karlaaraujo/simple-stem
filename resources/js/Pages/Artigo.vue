<template>
    <MainLayout>
        <div v-if="isLoading">Carregando...</div>
        <div v-else>
            <div class="mx-10">
                <v-sheet class="px-10 py-12 mt-14" style="border: 1px solid rgba(0, 0, 0, 1);">
                    <a>{{ artigo.categoria.nome }}</a>
                    <h1>{{ artigo.titulo }}</h1>
                    <p> {{ artigo.descricao }}</p>
                </v-sheet>
                <v-sheet class="px-10 py-12 my-8" style="border: 1px solid rgba(0, 0, 0, 1);">
                    <div class="d-flex">
                        <div style="flex:1;">
                            <p>Nível de Dificuldade</p>
                            <p style="font-weight: 700;"> {{  artigo.nivel_habilidade.nome }}</p>
                        </div>
                        <div  style="flex:1;">
                            <p>Tempo de Leitura</p>
                            <p style="font-weight: 700;"> {{  artigo.tempo_leitura_segundos }}</p>
                        </div>
                        <div style="flex:1;" v-if="artigo.artigo_pre_requisito">
                            <p>Pré-requisitos</p>
                            <p style="font-weight: 700;">
                                {{  artigo.artigo_pre_requisito.titulo }}
                            </p>
                        </div>
                    </div>
                </v-sheet>
                <v-sheet class="px-10 py-12 my-8" style="border: 1px solid rgba(0, 0, 0, 1);">
                    <div>
                        <p class="py-8">{{ artigo.conteudo }}</p>
                    </div>
                </v-sheet>
                <v-sheet class="px-10 py-12" style="border: 1px solid rgba(0, 0, 0, 1);">
                    <div class="d-flex">
                        <div  style="flex:1;">
                            <p>Autoria</p>
                            <p style="font-weight: 700;">{{ artigo.autor.p_nome }} {{ artigo.autor.u_nome }}</p>
                        </div>
                        <div  style="flex:1;">
                            <p>Última Atualização</p>
                            <p style="font-weight: 700;">{{ artigo.dt_criacao }}</p>
                        </div>
                    </div>
                </v-sheet>
            </div>
        </div>

    </MainLayout>


</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import MainLayout from "@/Layouts/MainLayout.vue";

const props = defineProps({
    id_artigo: String
});

const artigo = ref({});

const isLoading = ref(true);

onMounted(() => {
    axios.get(`/api/artigo/id/${props.id_artigo}`)
        .then(response => {
            artigo.value = response.data;
        })
        .catch(error => {
            console.error("Error fetching the artigo data:", error);
        })
        .finally(() => {
            isLoading.value = false;  // Set to false once request is complete
        });
});
</script>
