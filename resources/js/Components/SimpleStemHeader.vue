<template>

    <v-row style="width: 100%; height: 138px; background-color: #001c35; margin: 0">
        <!-- <v-row style="width: 100%; height: 138px; background-color: #2D4356; margin: 0"></v-row> -->
        <div id="toolbar">
            <a class="header-logo" href="/">
              <img width="192" height="49" viewBox="0 0 192 49" fill="none" src="@/Assets/logo_atualizada.svg" alt="logo" />
            </a>
            <span>
              <input type="text" class="search-input" placeholder="Busque artigos, tópicos..."/>
              <svg-icon class="search-icon mt-n1" type="mdi" :path="path"></svg-icon>
            </span>
        </div>
    </v-row>

    <v-row class="simple-stem-row" style="width: 100%; height: 72px; background-color: #003249; margin: 0">
        <div class="simple-stem-nav">
            <NavMenu siglaCategoria="S" :idCategoria="1" />
            <NavMenu siglaCategoria="T" :idCategoria="2" />
            <NavMenu siglaCategoria="E" :idCategoria="3" />
            <NavMenu siglaCategoria="M" :idCategoria="4" />
        </div>
    </v-row>

    <span v-if="isMobile">
        <ButtonsLoginCadastro />
    </span>

</template>

<script setup>
import NavMenu from './NavMenu.vue';
import ButtonsLoginCadastro from './ButtonsLoginCadastro.vue';
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;700&display=swap');


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

.header-logo
{
    margin-left: 7rem;
    margin-top: 30px;
}
span {
    position: relative;
    display: inline-block;
}
.search-input {
    margin-right: 7rem;
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

.simple-stem-nav {
    display: flex;
    width: 900px;
    align-items: center;
    justify-content: space-evenly;
    cursor: pointer;
}
.stem-nav-hover{
    font-size: 36px;
    color: #FFF;
    font-weight: 300;
}

.stem-nav-hover:hover {
    font-weight: 700;
}
#nav-menu, .v-overlay-container{
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

    .search-input {
        margin-right: 5rem;
        width: 280px;
    } 
}

@media screen and (max-width: 767px){

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
        width: auto;
        min-width: 320px;
    }

}
</style>
