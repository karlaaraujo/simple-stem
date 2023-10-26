<template>
    <SimpleStemHeader />
        <main style="background-color: #ECC8AF; height: 100%; padding: 30px;">
            <div class="mx-10"> 
              <v-sheet class="px-10 py-12 mt-14" style="border: 1px solid rgba(0, 0, 0, 1);">
                <a href="/">{{ article.category }}</a>
                <h1>{{ article.title }}</h1>
                <p> {{ article.description }}</p>
              </v-sheet>
              <v-sheet class="px-10 py-12 my-8" style="border: 1px solid rgba(0, 0, 0, 1);">
                <div class="d-flex">
                  <div style="flex:1;">
                    <p>Nível de Dificuldade</p>
                    <p style="font-weight: 700;"> {{  article.difficulty }}</p>
                  </div>
                  <div  style="flex:1;">
                    <p>Tempo de Leitura</p>
                    <p style="font-weight: 700;"> {{  article.readingTime }}</p>
                </div>
                <div style="flex:1;">
                  <p>Pré-requisitos</p>
                  <p style="font-weight: 700;"> {{  article.requirements }}</p>
                </div>
                </div>
              </v-sheet>
              <v-sheet class="px-10 py-12 my-8" style="border: 1px solid rgba(0, 0, 0, 1);">
              <div>
                <p class="py-8">{{ article.body }}</p>
              </div>
              </v-sheet>
              <v-sheet class="px-10 py-12" style="border: 1px solid rgba(0, 0, 0, 1);">
                <div class="d-flex">
                  <div  style="flex:1;">
                    <p>Autoria</p>
                    <p style="font-weight: 700;">{{ article.autor }}</p>
                  </div>
                  <div  style="flex:1;">
                    <p>Última Atualização</p>
                    <p style="font-weight: 700;">{{ article.date }}</p>
                  </div>
                </div>
            </v-sheet>
            
            </div>
        </main>
    <SimpleStemFooter />
</template>
<script>
import SimpleStemHeader from './SimpleStemHeader.vue';
import SimpleStemFooter from './SimpleStemFooter.vue';

export default {
  name: "ArticleViewer",
  components: {
    SimpleStemHeader,
    SimpleStemFooter
  },
  data () {
    return {
      article: {
        title: 'Article Title',
        body: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget ultricies aliquam, nunc nisl aliquet nunc, vitae aliquam nisl nunc eget nunc. Donec euismod, nisl eget ultricies aliquam, nunc nisl aliquet nunc, vitae aliquam nisl nunc eget nunc. Donec euismod, nisl eget ultricies aliquam, nunc nisl aliquet nunc, vitae aliquam nisl nunc eget nunc. Donec euismod, nisl eget ultricies aliquam, nunc nisl aliquet nunc, vitae aliquam nisl nunc eget nunc. Donec euismod, nisl eget ultricies aliquam, nunc nisl aliquet nunc, vitae aliquam nisl nunc eget nunc.',
        autor: 'Karla Sousa',
        date: '25/10/2023',
        category: 'Tech',
        difficulty: 'Fácil',
        readingTime: '5 min',
        requirements: 'Introdução à Lógica de Programação'
      }
    }
    }
    }
    
</script>