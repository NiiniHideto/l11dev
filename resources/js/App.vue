<script setup>
    import { ref } from 'vue';
    import { onMounted } from 'vue';
    import Header from './components/Header.vue';

    import { useMouse } from './components/mouse.js';
    import { useFetch } from './components/fetch.js';

    import Speech from './components/Speech.vue'

    const message = ref('↓ vue router-view での画面切替 バックエンドの処理は無いよ');

    // const count = ref(0);
    // const increment = () => {
    //     count.value++;
    // };
    // const decrement = () => {
    //     count.value--;
    // };
    // 
    // const reset = () => {
    //     count.value = 0;
    // };
    //
    // onMounted(() => {
    //     console.log(`The initial count is ${count.value}.`);
    // });

    // const { x, y } = useMouse();

    const fetchUrl = ref('https://httpbin.org/get');
    const { data, error } = useFetch(fetchUrl.value);

    const isLoading = ref(true);

    async function doFetch(url) {
        data.value = null;
        error.value = null;
        try {
            isLoading.value = true;
            const response = await fetch(url);
            const actualData = await response.json();
            data.value = actualData;
        } catch(e) {
            console.error('catch error: ', e);
            error.value = e;
        } finally {
            isLoading.value = false;
        };
    };

</script>

<template>
    <div>
        <Speech />
        <br>
        <!-- <p>Fetch data: {{ data }}</p><br>
        <p>Fetch error: {{ error }}</p> -->
        
        <br>
        <br>
        <br>
        {{ fetchUrl }}<br>
        <button @click="fetchUrl = 'https://httpbin.org/get'; doFetch(fetchUrl)">
            get
        </button>
        <button @click="fetchUrl = 'https://httpbin.org/post'; doFetch(fetchUrl)">
            post
        </button>
        <!-- <button @click="doFetch(fetchUrl)">
            doFetch
        </button> -->
    </div>

    <!-- <div>
        <p>Mouse position: {{ x }}, {{ y }}</p>
        <br>
    </div> -->

    <!-- <div class="flex justify-around">
        <button @click="reset">
            Reset
        </button>
        <button @click="decrement">
            Decrement
        </button>
        {{ count }}
        <button @click="increment">
            Increment
        </button>
    </div> -->

    <br>
    <br>
    <h1>{{ message }}</h1>
    <Header />
    <!-- vue-router router.js で定義 -->
    <router-view></router-view>
</template>

<style scoped>

    button {
        font-weight: bold;
        background-color: #04AA6D;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        transition-duration: 0.2s;
        cursor: pointer;
        border-radius: 5px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    }
    button:hover {
        background-color: orange;
        color: black;
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    }

</style>
