<template>

    <v-row style="width: 100%; height: 138px; background-color: #001c35; margin: 0">
        <div id="toolbar">
            <a class="header-logo" href="/">
                <img alt="logo" fill="none" height="49" src="@/Assets/logo_atualizada.svg" viewBox="0 0 192 49"
                     width="192"/>
            </a>
            <div class="search-container">
                <input
                    v-model="termoPesquisado"
                    class="search-input"
                    placeholder="Busque artigos, tópicos..."
                    type="text"
                    @keyup.enter="pesquisarTermo"
                />
                <a class="search-icon" :href="route('artigo.listar.termo', { termo: termoPesquisado })">
                    <svg-icon
                        :path="path"

                        type="mdi"
                    />
                </a>

            </div>
        </div>
    </v-row>

    <v-row class="simple-stem-row" style="width: 100%; height: 72px; background-color: #003249; margin: 0">
        <div class="simple-stem-nav">
            <NavMenu :idCategoria="1" siglaCategoria="S"/>
            <NavMenu :idCategoria="2" siglaCategoria="T"/>
            <NavMenu :idCategoria="3" siglaCategoria="E"/>
            <NavMenu :idCategoria="4" siglaCategoria="M"/>
        </div>
    </v-row>

    <span v-if="isMobile">
        <ButtonsLoginCadastro/>
    </span>

</template>

<script setup>
import { ref } from 'vue';
import NavMenu from './NavMenu.vue';
import ButtonsLoginCadastro from './ButtonsLoginCadastro.vue';
import SvgIcon from '@jamescoyle/vue-icon';
import {mdiMagnify} from '@mdi/js';

const path = mdiMagnify;
const termoPesquisado = ref('');

</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;700&display=swap');

.search-input {
    padding-right: 2em;
    border-radius: 10px;
    border: 1px solid #000;
    background: #FFF;
    width: 100%;
}

.search-icon {
    position: absolute;
    right: 10px;
    height: 20px;
    width: 20px;
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
}

.header-logo {
    margin-left: 7rem;
    margin-top: 30px;
}

.search-container {
    position: relative;
    display: flex;
    align-items: center;
    margin-right: 5rem;
    width: 280px;
}

.simple-stem-nav {
    display: flex;
    width: 900px;
    align-items: center;
    justify-content: space-evenly;
    cursor: pointer;
}

.stem-nav-hover {
    font-size: 36px;
    color: #FFF;
    font-weight: 300;
}

.stem-nav-hover:hover {
    font-weight: 700;
}

#nav-menu, .v-overlay-container {
    margin-top: .7%;
    background-color: #737373;
    opacity: 95%;
    border-radius: 0%;
    color: #FFF;
    font-size: 32px;
    font-weight: 300;
    height: 50vh;
    width: 100vw;
    cursor: pointer;
}

.link-nav {
    color: #FFF;
    text-decoration: none;
}

@media screen and (max-width: 1024px) {
    .header-logo {
        margin-left: 5rem;
    }

    .search-container {
        position: relative;
        display: flex;
        align-items: center;
        margin-right: 5rem;
        width: 280px;
    }
}

@media screen and (max-width: 767px) {

    .search-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

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

    .simple-stem-nav {
        width: auto;
        min-width: 320px;
    }

}
</style>
