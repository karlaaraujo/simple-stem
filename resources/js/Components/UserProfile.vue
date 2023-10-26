<template>
    <SimpleStemHeader />
        <main style="background-color: #ECC8AF; height: 100%">
            <div class="mx-10"> 
            <br>
            <v-spacer />
                <v-btn 
                  style="background-color: #292D32; color: white; border-radius: 0; position: absolute; margin-left: 4rem; top: 14rem;"
                  @click="editProfile"
                >
                Editar perfil
                </v-btn>
                <v-sheet 
                  class="d-flex justify-center align-center mx-10 columns-2" 
                  style="border: 1px solid rgba(0, 0, 0, 1);"
                >
                    <div class="mx-10 my-10 col-span-1">
                        <h3>{{ user.name }}</h3>
                        <p>{{ user.email }}</p>
                    </div>
                    <div class="ma-10 col-span-1">
                    <v-avatar size="150">
                        <v-img src="https://cdn.vuetifyjs.com/images/john.jpg" />
                    </v-avatar>
                    </div>
                </v-sheet>

                <v-spacer />
                <br>

                <v-sheet 
                  class="d-flex justify-center align-center mx-10 py-10" 
                  style="border: 1px solid rgba(0, 0, 0, 1);"
                >
                    <div class="ml-12 flex-1 pr-10">
                      <p>Nível de habilidade</p>
                      <h3>{{ user.level }}</h3>
                    </div>
                    <div class="flex-1 pr-10">
                      <p>Áreas de preferência</p>
                      <h3>{{ user.areas }}</h3>
                    </div>
                    <div class="flex-1 pr-10">
                      <p>Habilidades técnicas</p>
                      <h3>{{ user.skills }}</h3>
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
  name: "MyComponent",
  components: {
    SimpleStemHeader,
    SimpleStemFooter
  },
  data() {
    return {
      user: {
        name: 'John Doe',
        email: 'johndoe@simplestem.com',
        level: 'Iniciante',
        areas: 'Ciência da computação',
        skills: 'Python, C++, Java'
      }
    };
  },
  methods: {
    editProfile() {
      createDialog({
        component: EditProfile,
        props: {
          user: this.user
        }
      })
    },
    // Outras funções que você deseja adicionar
  }
};
</script>

