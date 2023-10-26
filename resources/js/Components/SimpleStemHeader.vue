<template>
  <v-row style="width: 100%; height: 138px; background-color: #2D4356; margin: 0">
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
  <v-row class="simple-stem-row" style="width: 100%; height: 72px; background-color: #435B66; margin: 0">
    <div id="mobile-btns" v-if="isMobile">
        <v-btn id="signup-btn" class="button-mobile" href="/" text>cadastre-se</v-btn>
        <v-btn id="signin-btn" class="button-mobile" href="/" text>login</v-btn>
      </div>
    <div class="simple-stem-nav">
      <v-menu
        open-on-hover
      >
        <template v-slot:activator="{ props }">
          <div id="menuS"
               class="stem-nav-hover"
               style="cursor: pointer"
               v-bind="props">
            S
          </div>
        </template>
        <v-list id="nav-menu">
          <v-list-item
              class="nav-menu-item"
              v-for="(item, index) in menuS"
              :key="index">
            <v-list-item-title>
              <a class="link-nav" :href="item.link">
                  {{ item.title }}
              </a>
            </v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
      <v-menu open-on-hover>
        <template v-slot:activator="{ props }">
          <div class="stem-nav-hover" id="menuT"
            style="cursor: pointer"
            v-bind="props">
            T
          </div>
        </template>
        <v-list id="nav-menu">
          <v-list-item
            class="nav-menu-item"
            v-for="(item, index) in menuT"
            :key="index"
          >
            <v-list-item-title>
              <a class="link-nav" :href="item.link">{{ item.title }}</a>
            </v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
      <v-menu
        open-on-hover
      >
        <template v-slot:activator="{ props }">
          <div id="menuE" class="stem-nav-hover"
            style="cursor: pointer"
            v-bind="props"
          >
            E
          </div>
        </template>

        <v-list id="nav-menu">
          <v-list-item
            class="nav-menu-item"
            v-for="(item, index) in menuE"
            :key="index"
          >
            <v-list-item-title>
              <a class="link-nav" :href="item.link">{{ item.title }}</a>
            </v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
      <v-menu
        open-on-hover
      >
        <template v-slot:activator="{ props }">
          <div id="menuM" class="stem-nav-hover"
            style="cursor: pointer"
            v-bind="props"
          >
            M
          </div>
        </template>
        <v-list id="nav-menu">
          <v-list-item
          class="nav-menu-item"
            v-for="(item, index) in menuM"
            :key="index"
          >
            <v-list-item-title>
              <a class="link-nav" :href="item.link">{{ item.title }}</a>
            </v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
    </div>
  </v-row>
</template>

<script>

import { ref, onMounted, onBeforeUnmount } from 'vue';
import SvgIcon from '@jamescoyle/vue-icon';
import { mdiMagnify } from '@mdi/js';

export default {
  name: "MyComponent",
  components: {
    SvgIcon,
  },
  setup() {
    const isMobile = ref(window.innerWidth <= 672);

    const handleResize = () => {
      isMobile.value = window.innerWidth <= 672;
    }

    onMounted(() => {
      window.addEventListener('resize', handleResize);
    });

    onBeforeUnmount(() => {
      window.removeEventListener('resize', handleResize);
    });

    return {
      isMobile,
      menuS: [
        { title: 'Click Me', link: 'https://www.google.com' },
        { title: 'Click Me' },
        { title: 'Click Me' }
      ],
      menuT: [
        { title: 'Click Me', link: 'https://www.google.com' },
        { title: 'Click Me' },
        { title: 'Click Me' }
      ],
      menuE: [
        { title: 'Click Me', link: 'https://www.google.com' },
        { title: 'Click Me' },
        { title: 'Click Me' }
      ],
      menuM: [
        { title: 'Click Me', link: 'https://www.google.com' },
        { title: 'Click Me' },
        { title: 'Click Me' }
      ],
      path: mdiMagnify,
    };
  }
};
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

.link-nav {
  color: #FFF;
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

  #mobile-btns {
    display: flex;
    flex-direction: row;
    width: 100%;
    align-items: center;
    justify-content: space-evenly;
    cursor: pointer;
    font-size: 24px;
    color: #FFF;
  }

  #signup-btn {
    width: 150px;
    height: 35px;
    box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 2px;
    flex: none;
    order: 0;
    flex-grow: 0;
    box-sizing: border-box;
    left: 0%;
    right: 0%;
    top: 0%;
    bottom: 0%;
    background: #965D62;
    border: 1px solid #965D62;
    border-radius: 5px;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 18px;
    line-height: 134.77%;
    display: flex;
    align-items: center;
    text-align: center;
    text-transform: none;
    color: #FFFFFF;
  }

  #signin-btn {
  width: 150px;
  height: 35px;
  box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);
  flex: none;
  order: 1;
  flex-grow: 0;
  box-sizing: border-box;
  left: 0%;
  right: 0%;
  top: 0%;
  bottom: 0%;
  background: #2D4356;
  border: 1px solid #2D4356;
  border-radius: 5px;
  font-family: 'Inter';
  font-style: normal;
  font-weight: 400;
  font-size: 18px;
  line-height: 134.77%;
  display: flex;
  align-items: center;
  text-align: center;
  text-transform: none;
  color: #FFFFFF;
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
