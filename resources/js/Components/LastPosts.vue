<template>
<div>

</div>
<v-sheet
    id="last-posts"
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
        v-for="post in posts"
        :key="post.id"
        class="pa-4"

        >
        <v-card class="mx-5 pb-3" max-width="250" outlined>
            <img class="p-5" :src="post.image" height="270" width="265">
            <v-card-title> {{ post.title }}</v-card-title>
            <v-card-subtitle
                class="text-h8"
            >
                {{ post.subtitle }}
            </v-card-subtitle>
            <v-card-text class="text-h9" style="height: 150px; overflow: hidden !important;">
                {{ post.description }}
            </v-card-text>

            <div id="buttons" class="px-5">
                <Link
                    :href="route('artigo.ler', {id: post.id})"
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

const posts = [
    {
        id: 1,
        title: 'Saúde mental na pandemia',
        image: 'https://i.ibb.co/f82wsCd/Image1.png',
        subtitle: 'Dicas para se manter são durante a pandemia',
        description: 'Sabemos que não é fácil se manter são durante a pandemia, mas existem algumas dicas que podem te ajudar a se manter são durante esse período.',
    },
    {
        id:2,
        title: 'A Ciência por trás do COVID-19',
        image: 'https://i.ibb.co/nQ6SkTM/Image2.png',
        subtitle: 'Como a ciência está combatendo o COVID-19',
        description: 'A ciência está trabalhando duro para combater o COVID-19, e nesse artigo vamos falar um pouco sobre como a ciência está trabalhando para combater o COVID-19.',
    },
    {
        id: 3,
        title: 'Redes neurais na prática',
        image: 'https://i.ibb.co/9hWn400/card-Image3.png',
        subtitle: 'Como implementar uma rede neural',
        description: 'Aprenda a implementar uma rede neural em Python utilizando a biblioteca Keras.',
    },
    {
        id:4,
        title: 'Trabalho presencial ou remoto?',
        image: 'https://i.ibb.co/QjPbMw9/card-Image4.png',
        subtitle: 'Vantagens e desvantagens do trabalho remoto em escritórios de engenharia',
        description: 'O trabalho remoto é uma realidade que veio para ficar, mas será que ele é realmente vantajoso? Nesse artigo vamos falar um pouco sobre este assunto.',
    }

];

</script>
<style>

#last-posts {
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
