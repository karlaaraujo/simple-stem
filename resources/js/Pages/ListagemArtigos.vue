<template>
    <MainLayout>
        <v-row justify="center">
            <v-col cols="12" md="6" sm="8">
                <v-text-field
                    v-model="termo"
                    @keyup.enter="buscarArtigosPorTermo"
                    append-outer-icon="mdi-magnify"
                    class="search-field"
                    hide-details
                    label="Buscar artigo"
                    style="border-radius: 15px; border: 1px solid #000; background: #FFF;"
                >
                </v-text-field>
            </v-col>
        </v-row>

        <v-container>
            <v-card class="artigo-card" flat>
                <v-card-title>Artigos</v-card-title>
                <v-list dense>
                    <v-list-item
                        v-for="(artigo, index) in artigos"
                        :key="index"
                    >
                        <v-list-item-content>
                            <v-list-item-title class="artigo-title">{{ artigo.titulo }}</v-list-item-title>
                            <v-list-item-subtitle class="artigo-category">
                                {{ artigo.categoria.nome }} / {{ artigo.subcategoria.nome }}
                            </v-list-item-subtitle>
                        </v-list-item-content>
                        <v-list-item-action>
                            <v-btn :color="'#965D62'" :href="'/artigo/'+ artigo.id_artigo">Acesse</v-btn>
                        </v-list-item-action>
                    </v-list-item>
                </v-list>
            </v-card>
        </v-container>
    </MainLayout>

</template>


<script setup>


import {ref, onMounted, defineProps} from 'vue';
import axios from 'axios';
import MainLayout from "@/Layouts/MainLayout.vue";

const props = defineProps({
    termoPesquisa: {
        type: String,
        default: null
    },
    subcategoria: {
        type: String,
        default: null
    }
});

const artigos = ref([]);
const termo = ref('');
const isLoading = ref(true);


const buscarArtigosPorTermo = () => {
    isLoading.value = true;
    axios.get(`/api/artigos/buscar/termo/${termo.value}`)
        .then(response => {
            artigos.value = response.data;
        })
        .catch(error => {
            console.error("Error fetching the artigos termo data:", error);
        })
        .finally(() => {
            isLoading.value = false;
        });
}

onMounted(() => {
    if(props.termoPesquisa != null){
        axios.get(`/api/artigos/buscar/termo/${props.termoPesquisa}`)
            .then(response => {
                artigos.value = response.data;
            })
            .catch(error => {
                console.error("Error fetching the artigos termo data:", error);
            })
            .finally(() => {
                isLoading.value = false;
            });
    } else {
        axios.get(`/api/artigos/buscar/subcategoria/${props.subcategoria}`)
            .then(response => {
                artigos.value = response.data;
            })
            .catch(error => {
                console.error("Error fetching the artigos subcategoria data:", error);
            })
            .finally(() => {
                isLoading.value = false;
            });
    }

});

</script>


<style scoped>
.search-button {
    position: absolute;
    top: 326px;
    left: 223px;
    border-radius: 15px;
    border: 1px solid #ccc;
}

.artigo-card {
    border-radius: 15px;
    border: 1px solid #000;
    background: #FFF;
    padding: 15px;
    margin-top: 15px;
    margin-bottom: 20px;
}

.artigo-title {
    font-size: 18px;
    margin-bottom: 10px;
}

.artigo-category {
    font-size: 14px;
    margin-bottom: 10px
}

.artigo-card v-card-actions {
    justify-content: flex-end; /* Alinha os botões à direita */
}

.artigo-card v-btn {
    margin-left: 10px; /* Espaçamento entre os botões */
}

/* Alinhe os botões no canto direito */
.v-btn {
    position: absolute;
    right: 0;
    bottom: 0;
    margin: 10px;
}
</style>
