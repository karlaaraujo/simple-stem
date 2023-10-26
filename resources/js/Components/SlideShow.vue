<template>
  <div class="carousel-container">
    <div class="carousel">  
      
      <v-carousel 
        cycle
        hide-delimiter-background 
        show-arrows="hover" 
        color="white"
        v-model="currentSlide">

        <v-carousel-item v-for="slide in slides" :key="slide.i">
            <div class="d-flex fill-height justify-center align-center">
              <div class="text-h2">
                <img :src="slide.image" alt="Imagem do Slide">
              </div>
            </div>
        </v-carousel-item>
      </v-carousel>
    </div>
    <div style="margin-top: 1rem;">
      <h1 style="padding: 1rem 0">{{ slides[currentSlide].title }}</h1>
      <p>{{ slides[currentSlide].description }}</p>
    </div>
  </div>

</template>

<script setup>
import { ref } from 'vue';

const currentSlide = ref(0);

const slides = [
  {
    i: '1', 
    title: 'First Slide',
    image: 'https://hed.pearson.com.br/hubfs/promover-a-inovação-com-carreiras-STEM-em-sua-universidade.jpg',
    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non diam id li ',
  },
  {
    i: '2',
    title: 'Second Slide',
    image: 'https://fia.com.br/wp-content/uploads/2022/06/educacao-stem-tudo-que-voce-precisa-saber-1280x720.jpg',
    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non diam id li ',
  },
  { 
    i: '3',
    title: 'Third Slide',
    image: 'https://www.globalfocusmagazine.com/wp-content/uploads/2020/02/Engaging_with_technology-scaled.jpg',
    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non diam id li ',
  },
];

</script>
<style>

.carousel-container {
  width: 80%;
  margin: 0 auto;
}

@media screen and (max-width: 672px){
  .carousel-container {
    width: 100%;
    height: fit-content;
    padding: 3rem .5rem;
  }

  .carousel img {
    width: 100%;
    height: 100%;
    max-height: 320px;
    object-fit: cover;
  }

  .v-window.v-window--show-arrows-on-hover.v-theme--light.v-carousel.v-carousel--hide-delimiter-background {
    height: 320px !important; /* Altere para auto para permitir que o container se ajuste ao conteúdo */

  }

  .v-carousel__controls {
    height: 95px !important;
  }

}

</style>