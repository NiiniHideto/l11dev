<script setup>
    import { ref } from 'vue';
    import axios from 'axios';

    const buttonClicked = async () => {
        await createAudio(message.value);
    };

    const message = ref('');

    async function createAudio(text) {
        const audio = document.querySelector(".audio");
        audio.src = await getAudioURL(text);
        audio.play();
    }

    async function getAudioURL(text) {
        const query = await getQuery(text);
        // console.log(query);
        const response = await axios.post(
            "http://localhost:10101/synthesis?speaker=888753760",
            query,
            { responseType: "blob" }
        );
        return URL.createObjectURL(response.data);
    }

    async function getQuery(text) {
        const response = await axios.post(
            `http://localhost:10101/audio_query?speaker=888753760&text=${text}`
        );
        return response.data;
    }

    // ※ firefox は対応していない
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    // ブラウザが API をサポートしているかどうかを確認します
    const isSupported = Boolean(SpeechRecognition)
    // 音声認識コンストラクター
    const recognition = SpeechRecognition ? new SpeechRecognition() : false

    const language = "ja";
    if (isSupported) {
        recognition.lang = language;
        recognition.interimResults = true;
        recognition.continuous = true;
    }
</script>


<template>
    <div v-if="isSupported">
        <span>AivisSpeech:</span>
        <br>
        <p style="white-space: pre-line">{{ message }}</p>
        <textarea style="color:black" v-model="message" placeholder="add multiple lines"></textarea>
        <br>
        <button @click="buttonClicked">
            送信
        </button>

        <audio class="audio"></audio>

        <div class="output"></div>

    </div>

    <div v-if="!isSupported">
        <span>Your browser does not support SpeechRecognition.</span>
    </div>
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
