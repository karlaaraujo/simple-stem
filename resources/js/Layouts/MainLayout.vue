<template>
    <v-app>
        <v-main style="height: fit-content;">
            <SimpleStemHeader />
                <div class="simple-stem-main">
                    <div class="" style="width: 100%; background-color: #ECC8AF; ">
                        <slot></slot> <!-- Inertia will render the page content here -->
                    </div>
                </div>
            <SimpleStemFooter />
        </v-main>
    </v-app>
</template>

<script setup>
import SimpleStemHeader from '@/Components/SimpleStemHeader.vue';
import SimpleStemFooter from '@/Components/SimpleStemFooter.vue';
</script>

<style>
v-main {
    font-family: 'Sen', sans-serif !important;
}
</style>

