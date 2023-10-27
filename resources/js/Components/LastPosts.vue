<template>
<div>

</div>
<v-sheet
    id="last-artigos"
    class="mx-auto"
    max-width="90%"
    >

    <div class="w-full text-h5 pa-4 text-center">
        Últimos Artigos
    </div>

    <div class="w-full text-h8 pa-4 text-center">
        Confira os últimos artigos publicados na plataforma
    </div>

    <v-slide-group
        v-model="model"
        class="pa-1"
        selected-class="bg-primary"
        show-arrows
        scroll-per-page
    >
        <v-slide-group-item
        v-for="artigo in artigos"
        :key="artigo.id_artigo"
        class="pa-4"
        >

        <v-card class="mx-5 pb-3" max-width="250" outlined>
            <img class="p-5" :src="artigo.link_imagem_principal" height="270" width="265">

            <v-card-title> {{ artigo.titulo }}</v-card-title>

            <v-card-text class="text-h9" style="height: 150px; overflow: hidden !important;">
                {{ artigo.descricao }}
            </v-card-text>

            <div id="buttons" class="px-5">
                <Link
                    :href="route('artigo.ler', {id: artigo.id_artigo})"
                >
                    Ler mais
                </Link>
            </div>
        </v-card>

        </v-slide-group-item>
    </v-slide-group>
</v-sheet>
</template>
<script setup>

import { Link } from '@inertiajs/vue3';

import { ref, onMounted } from 'vue';
import axios from 'axios';

const artigos = ref([]);

const isLoading = ref(true);

onMounted(() => {
    axios.get(`/api/artigo/ultimos`)
        .then(response => {
            artigos.value = response.data;
        })
        .catch(error => {
            console.error("Error fetching the artigos data:", error);
        })
        .finally(() => {
            isLoading.value = false;
        });
});


</script>
<style>

#last-artigos {
    background: none;
    padding: 25px;

}

@media screen and (max-width: 672px){

  .v-sheet {
        padding: 1rem 0 !important;
        margin: 0 auto !important;
    }
  .v-card {
    width: 175px;
    height: fit-content;
  }

  .v-card img {
    max-width: 175px;
    max-height: 175px;
  }

  .v-card-title, .v-card-subtitle, .v-card-text {
    font-size: 0.85em !important;
    padding: 0.3rem 0.8rem !important;
    text-align: justify;
    margin: 0 auto;
  }

  .v-card .v-card-text {
    overflow: scroll !important;
    text-overflow: ellipsis !important;
    height: 100px !important;
  }

  div#buttons {
    display: flex;
    padding: 0 0.2rem;
    flex-direction: row;
    justify-content: space-evenly;
    align-items: center;
  }
  .v-card .v-btn {
    width: 50px;
    font-size: 0.7em !important;
    margin: 0 auto;
    padding: 0 0.2rem;
  }

  #share-button {
    margin-left: 0 !important;
  }
}


</style>
