<template>
  <v-footer style="display: flex; width: 100%; height: 138px; background-color: #2D4356; margin: 0; flex-direction: column; padding: 20px 0">
    <v-row class="flex justify-between w-full text-white">
        <div>
            <a href="/">
              <img width="84" height="84" viewBox="0 0 250 184" fill="none"  src="@/Assets/logo_atualizada.svg" alt="logo" />
            </a>
        </div>
    </v-row>
    <v-row class="gap-y-4">
        <v-divider class="divider"></v-divider>
    </v-row>
    <v-row class="flex justify-between w-full text-white">
        <div class="mr-8">
            &copy; {{ new Date().getFullYear() }}
        </div>
        <div> Made with love at IFAL :)</div>
    </v-row>
  </v-footer>
</template>


<style scoped>

div {
    display: flex;
    justify-content: center;
    align-items: center;
}

a {
    text-decoration: none;
}

.divider {

    position: absolute;
    width: 70%;
    color: #000000;
    opacity: 1;
    z-index: 1;

}
</style>
