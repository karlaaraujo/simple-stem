<template>
    <div>
        <v-menu 
        :open-on-hover="isHoverable"
        :open-on-click="!isHoverable"
        bottom
        >
            <template v-slot:activator="{ on, props }">
                <div :id="'menu' + siglaCategoria"
                    class="stem-nav-hover py-2"
                    style="cursor: pointer"
                    v-bind="props"
                    v-on="on"
                >
                    {{ siglaCategoria }}
                </div>
            </template>
            <v-list id="nav-menu">
                <v-list-item
                    class="nav-menu-item"
                    v-for="(subcategoria, index) in subcategorias"
                    :key="index"
                >
                    <v-list-item-title>
                        <a class="link-nav"
                        :href="route('artigo.listar.subcategoria', {idSubcategoria: subcategoria.id})"
                        >
                        <v-icon v-if="subcategoria.icon"> {{ subcategoria.icon }} </v-icon>
                            {{ subcategoria.nome }}
                        </a>
                    </v-list-item-title>
                </v-list-item>
            </v-list>
        </v-menu>
    </div>
</template>

<script setup>
import {onMounted, ref, onBeforeUnmount} from 'vue';
import axios from 'axios';


const isHoverable = ref(window.innerWidth > 672);

const handleResize = () => {
  isHoverMenu.value = window.innerWidth > 672;
};

onMounted(() => {
  window.addEventListener('resize', handleResize);
});

onBeforeUnmount(() => {
  window.removeEventListener('resize', handleResize);
});


const props = defineProps({
    siglaCategoria: String,
    idCategoria: Number
});

const subcategorias = ref([]);

const isLoading = ref(true);

onMounted(() => {
    axios.get(`/api/categoria/${props.idCategoria}/getSubcategorias`)
        .then(response => {
            subcategorias.value = response.data;
        })
        .catch(error => {
            console.error("Error fetching the subcategorias data:", error);
        })
        .finally(() => {
            isLoading.value = false;
        });
});


</script>

<style scoped>
.stem-nav-hover{
    font-size: 36.5px;
    color: #FFF;
    font-weight: 300;
}

.stem-nav-hover:hover {
    font-weight: 700;
}
#nav-menu {
    display: flex;
    padding: 0;
    flex-direction: column;
    align-items: flex-start;
    min-width: 250px;
    justify-content: space-around;
    background-color: rgba(255, 255, 255, .8);
    border-radius: 1%;
    width: 100%;
    cursor: pointer;
}

.nav-menu-item:hover {
    width: 100%;
    background-color: rgb(222, 247, 255);
    color: #000;
}

.link-nav {
    color: black;
    text-decoration: none;
}

div.v-overlay__content {
    max-width: 100vh;
    left: 0 !important;
}

@media screen and (max-width: 672px){
    .simple-stem-nav {
        display: none;
    }

    .simple-stem-row {
        display: none;
    }


    #nav-menu, .v-overlay-container{
        margin-top: 0;
        opacity: 95%;
        border-radius: 0%;
        font-size: 32px;
        font-weight: 300;
        cursor: pointer;
    }

    .nav-menu-item:hover {
    width: 100%;
    background-color: rgb(222, 247, 255);
    color: #000;
}

}
</style>
