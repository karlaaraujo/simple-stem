<template>
    <div class="profile-picture-container">
      <v-menu >
        <template v-slot:activator="{ on, attrs }">
          <v-avatar v-bind="attrs" v-on="on">
            <img :src="profileImageUrl" alt="Foto de Perfil" />
          </v-avatar>
        </template>
        <v-list>
          <v-list-item @click="goToProfile">Perfil</v-list-item>
          <v-list-item @clgitick="goToArtigo">Enviar Artigo</v-list-item>
        </v-list>
      </v-menu>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      profileImageUrl: String,
    },
    methods: {
      goToProfile() {
        // Lógica para navegar para a página de perfil
        this.$router.push('/perfil'); 
      },
      goToArtigo() {
        // ILógica para navegar para a página de envio de artigo
        this.$router.push('/enviar-artigo'); 
      },
    },
  };
  </script>
  
<style scoped>
.profile-picture-container {
    cursor: pointer;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    border-color: #fff;
    border: 5px solid #fff;
    overflow: hidden;
}

.profile-picture-container img {
  width: 100%;
  height: 100%;
}

</style>
  