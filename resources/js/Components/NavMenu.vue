<template>
    <v-menu open-on-hover>
        <template v-slot:activator="{ props }">
            <div :id="'menu' + siglaCategoria"
                 class="stem-nav-hover"
                 style="cursor: pointer"
                 v-bind="props"
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
                    <a class="link-nav" :href="'/artigos/listar/subcategoria/'+subcategoria.id">{{ subcategoria.nome }}</a>
                </v-list-item-title>
            </v-list-item>
        </v-list>
    </v-menu>
</template>

<script setup>
import {onMounted, ref} from 'vue';
import axios from 'axios';

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
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;700&display=swap');

.nav-menu-item{
    display: inline-block;
}
.simple-stem-row {
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 24px;
    color: #FFF;
}

div#toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    height: 138px;
    background-color: #2D4356;
}

.header-logo
{
    margin-left: 8%;
    margin-top: 30px;
}
span {
    position: relative;
    display: inline-block;
}
.search-input {
    margin-right: 44px;
    padding: 0 8.5% 0 3%;
    width: 370px;
    height: 44px;
    border-radius: 15px;
    border: 1px solid #000000;
    background-color: #fff;
    color: #000000;
    font-size: 12px;
    font-weight: 100;
}

svg.search-icon {
    position: absolute;
    right: 56px;
    top: 60%;
    transform: translateY(-50%);
}
.simple-stem-nav {
    display: flex;
    width: 493px;
    align-items: center;
    justify-content: space-evenly;
    cursor: pointer;
}
.stem-nav-hover{
    font-family: 'Inter', sans-serif;
    font-size: 36px;
    color: #FFF;
    font-weight: 300;
}

.stem-nav-hover:hover {
    font-weight: 700;
}
#nav-menu, .v-overlay-container{
    margin-top: .7%;
    /*background-color: #737373;*/
    background-color: white;
    opacity: 95%;
    border-radius: 0%;
    color: #FFF;
    font-family: 'Inter', sans-serif;
    font-size: 32px;
    font-weight: 300;
    width: 100vw;
    margin-left: -12px !important;
    cursor: pointer;
    text-align: center;
}

.link-nav {
    color: black;
    text-decoration: none;
}

@media screen and (max-width: 672px){

    div#toolbar {
        display: flex;
        width: 100%;
        height: 145px;
        flex-direction: column;
        align-items: center;
        vertical-align: middle;
    }

    .header-logo {
        margin-left: 0;
        margin-top: 30px;
    }

    span {
        display: flex;
        flex-direction: column;
    }

    .search-icon {
        margin-top: 4%;
    }
    input.search-input {
        width: 280px;
        height: 44px;
        align-items: center;
        justify-content: center;
        margin-right: 0;
        margin-bottom: 55px;
        padding: 0 10% 0 3%;
    }

    svg.search-icon {
        width: 19px;
        height: 19px;
        right: 10px;
        top: 24px;
    }
    .simple-stem-nav {
        display: none;
    }

    .simple-stem-row {
        display: none;
    }


    #nav-menu, .v-overlay-container{
        margin-top: 0;
        background-color: #737373;
        opacity: 95%;
        border-radius: 0%;
        color: #FFF;
        font-family: 'Inter', sans-serif;
        font-size: 32px;
        font-weight: 300;
        height: 50vh;
        width: 100vw;
        margin-left: -12px !important;
        cursor: pointer;
    }

}
</style>
