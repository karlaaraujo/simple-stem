<template>
  <v-sheet id="last-artigos" class="mx-auto" max-width="80%">
    <div class="text-xl font-bold pa-4 text-center">ÚLTIMOS ARTIGOS</div>

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
        style.padding="10px 0"
      >
        <v-card
          class="mx-3 pb-3"
          max-width="250"
          outlined
          style="
            border: 1px solid rgba(0, 28, 53, 0.5);
            box-shadow: 0 4px 10px 0 rgba(0, 50, 73, 0.3),
              1px 3px 8px 1px rgba(0, 50, 73, 0.4);
          "
        >
          <img
            class="p-1"
            :src="artigo.link_imagem_principal"
            height="265"
            width="265"
          />

          <v-card-title> {{ artigo.titulo }}</v-card-title>

          <v-card-text
            class="text-h9"
            style="
              height: 100px;
              overflow: hidden !important;
              text-overflow: clip;
            "
          >
            {{ artigo.descricao }}
          </v-card-text>
          <div id="buttons" class="px-5">
            <v-btn
              style="
                background-color: #292d32;
                color: white;
                border-radius: 0;
                margin-right: 1rem;
              "
              text
              @click="OpenArticle(artigo.id_artigo)"
            >
              Ler mais
            </v-btn>
          </div>
        </v-card>
      </v-slide-group-item>
    </v-slide-group>
  </v-sheet>
</template>
<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const artigos = ref([]);

const isLoading = ref(true);

onMounted(() => {
  axios
    .get(`/api/artigo/ultimos`)
    .then((response) => {
      artigos.value = response.data;
    })
    .catch((error) => {
      console.error("Error fetching the artigos data:", error);
    })
    .finally(() => {
      isLoading.value = false;
    });
});

const OpenArticle = (id_artigo) => {
  window.location.href = `/artigo/${id_artigo}`;
};
</script>
<style>
#last-artigos {
  background: none;
  padding: 25px;
}

.v-slide-group__container > .v-slide-group__content {
  padding: 20px 0 !important;
}

@media screen and (max-width: 672px) {
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

  .v-card-title,
  .v-card-subtitle,
  .v-card-text {
    font-size: 0.85em !important;
    padding: 0.3rem 0.8rem !important;
    text-align: justify;
    margin: 0 auto;
  }

  .v-card .v-card-text {
    overflow: scroll !important;
    text-overflow: clip !important;
    height: 70px !important;
  }

  .buttons {
    display: flex;
    padding-left: 0.5rem;
  }

  .v-card .v-btn {
    width: 85px;
    font-size: 0.8rem !important;
    padding: 0 0.5rem;
  }

  #share-button {
    margin-left: 0 !important;
  }

  .v-slide-group__container > .v-slide-group__content {
    padding: 20px 0 !important;
  }
}
</style>
