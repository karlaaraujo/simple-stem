<template>
    <v-sheet id="last-artigos" class="mx-auto" max-width="80%">
        <div class="text-xl font-bold pa-4 text-center">Últimos Artigos</div>

        <div class="w-full text-h8 pa-4 text-center">
            Confira os artigos mais recentes da plataforma
        </div>

        <v-slide-group
            v-model="model"
            class="pa-1"
            scroll-per-page
            selected-class="bg-primary"
            show-arrows
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

                >
                    <img
                        :src="artigo.link_imagem_principal"
                        class="p-1"
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
                            :href="route('artigo.ler', {id: artigo.id_artigo})"
                            style="
                                background-color: #292d32;
                                color: white;
                                border-radius: 0;
                                margin-right: 1rem;
                              "
                            text
                        >
                            Ler
                        </v-btn>
                    </div>
                </v-card>
            </v-slide-group-item>
        </v-slide-group>
    </v-sheet>
</template>
<script setup>
import {ref, onMounted} from "vue";
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
        color: black;
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
