<template>
  <div id="desktop-btns" v-if="isDesktop">
    <div class="button-container d-flex flex-row mt-12">
      <v-btn id="signup-btn-desktop" class="button-desktop" href="/register" text>cadastre-se</v-btn>
      <h2 class="or-text px-2">ou</h2>
      <v-btn id="signin-btn-desktop" class="button-desktop" href="/login" text>faça login</v-btn>
    </div>
    <div class="ma-3">
      <h2 class="mensagemCadastro">Para ter acesso a todo o conteúdo SimpleSTEM</h2>
    </div>
  </div>
  <v-row v-if="isMobile" class="d-flex justify-center py-6" style="width: 100%; max-height: 120px; background-color: #435B66; margin: 0">
    <span class="mensagemCadastro text-white font-bold mb-2">Acesse todo o conteúdo SimpleSTEM</span>
    <div id="mobile-btns" class="mb-2">
        <v-btn id="signup-btn-mobile" class="button-mobile" href="/" text>cadastre-se</v-btn>
        <h2 class="or-text px-1 text-white font-bold">ou</h2>
        <v-btn id="signin-btn-mobile" class="button-mobile" href="/" text>faça login</v-btn>
    </div>
  </v-row>
</template>

<script>
import { ref, onMounted, onBeforeUnmount } from 'vue';

export default {
  name: 'ButtonsLoginCadastro',
  setup() {
    const isMobile = ref(false);
    const isDesktop = ref(true);

    const handleResize = () => {
      if (window.innerWidth <= 672) {
        isMobile.value = true;
        isDesktop.value = false;
      } else {
        isMobile.value = false;
        isDesktop.value = true;
      }
    };

    // Listener de redimensionamento
    onMounted(() => {
      window.addEventListener('resize', handleResize);
    });

    // Remoção do listener quando o componente é desmontado
    onBeforeUnmount(() => {
      window.removeEventListener('resize', handleResize);
    });

    return {
      isMobile,
      isDesktop,
    };
  },
};
</script>

<style scoped>
#desktop-btns {
  display: flex;
  flex-direction: column;
  width: 100%;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  font-size: 24px;
  color: #FFF;
  border-radius: none;
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

#signup-btn-desktop, #signin-btn-desktop, #signup-btn-mobile, #signin-btn-mobile {
  width: 150px;
  height: 35px;
  box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);
  border-radius: 0;
  flex: none;
  order: 0;
  flex-grow: 0;
  box-sizing: border-box;
  left: 0%;
  right: 0%;
  top: 0%;
  bottom: 0%;
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

#signup-btn-desktop, #signup-btn-mobile {
  background: #965D62;
  border: 1px solid #965D62;
}

#signin-btn-desktop, #signin-btn-mobile {
  background: #2D4356;
  border: 1px solid #2D4356;
}

.or-text {
  color: #000000;
  font-family: 'Inter';
  font-style: normal;
  font-weight: 400;
  font-size: 18px;
}

.mensagemCadastro {
  color: #000000;
  font-family: 'Inter';
  font-style: normal;
  font-weight: 400;
  font-size: 18px;
}
</style>
