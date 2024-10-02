<script setup>
    import { ref } from 'vue'
    import Header from './components/Header.vue'

    const message = ref('Hello vue!')
</script>

<template>
    <h1>{{ message }}</h1>
    <Header />
    <router-view></router-view>
</template>
