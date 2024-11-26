<script setup>
    import { ref } from 'vue';
    import axios from 'axios';

    const buttonClicked = async () => {
        await createAudio(message.value);
    };

    // const chatGptClick = async () => {
    //     const responseText = await requestChatAPI(chatgpt.value);
    //     await createAudio(responseText);
    //     const output = document.querySelector(".output");
    //     output.textContent = responseText;
    // };

    const message = ref('initial');
    const chatgpt = ref('chatGPT initial');

    async function createAudio(text) {
        const audio = document.querySelector(".audio");
        audio.src = await getAudioURL(text);
        audio.play();
    }

    async function getAudioURL(text) {
        const query = await getQuery(text);

        console.log(query);


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

    const api_key = "各自のキー";

    async function requestChatAPI(text) {
        const headers = {
            "Content-Type": "application/json",
            Authorization: `Bearer ${api_key}`,
        };

        const messages = [
            {
                role: "user",
                content: text,
            },
        ];

        const payload = {
            model: "gpt-3.5-turbo",
            max_tokens: 128,
            messages: messages,
        };

        const response = await axios.post(
            "https://api.openai.com/v1/chat/completions",
            payload,
            {
                headers: headers,
            }
        );
        console.log('ChatGPT送信');
        return response.data.choices[0].message.content;
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
        recognition.onresult = handleResult;
    }

    async function handleResult(event) {
        let finalTranscript = '';
        
        for (let i = event.resultIndex; i < event.results.length; i++) {
            const transcript = event.results[i][0].transcript;
            console.log(transcript);

            if (event.results[i].isFinal) {
                finalTranscript += transcript;
                const responseText = await requestChatAPI(finalTranscript);
                await createAudio(responseText);
                const output = document.querySelector(".output");
                output.textContent = responseText;
            }
        }
    }

    const start = () => {
        recognition.start();
    };
    const stop = () => {
        recognition.stop();
    };

</script>


<template>

    <div v-if="isSupported">
        <span>AivisSpeech:</span>
        <br>
        <p style="white-space: pre-line">{{ message }}</p>
        <textarea style="color:black" v-model="message" placeholder="add multiple lines"></textarea>

        <button @click="buttonClicked">
            送信
        </button>

        <audio class="audio"></audio>

        <div class="output"></div>

    </div>

    <div v-if="!isSupported">
        <span>Your browser does not support SpeechRecognition.</span>
    </div>



    <!-- <v-row>
      <v-col cols="4">
        <v-card
            class="mx-auto"
            max-width="344"
            variant="outlined"
          >
          <v-card-item>
            <div class="text-overline mb-1">
              入力したものをずんだもんに話してもらう
              <v-text-field v-model="val"></v-text-field>
            </div>
          </v-card-item>
  
          <v-card-actions>
            <v-btn variant="outlined" v-on:click="buttonClicked">
              送信
            </v-btn>
          </v-card-actions>
        </v-card>
        <audio class="audio"></audio>
      </v-col>
  
      <v-col cols="4">
        <v-card
            class="mx-auto"
            max-width="344"
            variant="outlined"
          >
          <v-card-item>
            <div class="text-overline mb-1">
              入力したものをChatGPTに飛ばす
              <v-text-field v-model="chatgpt"></v-text-field>
            </div>
          </v-card-item>
  
          <v-card-actions>
            <v-btn variant="outlined" v-on:click="chatGptClick">
              ChatGPTへ送信
            </v-btn>
          </v-card-actions>
        </v-card>
        <audio class="audio"></audio>
      </v-col>
  
      <v-col cols="4">
        <v-card
            class="mx-auto"
            max-width="344"
            variant="outlined"
          >
          <v-card-item>
              ずんだもんに話しかける
          </v-card-item>
  
          <v-card-actions>
            <v-btn variant="outlined" v-on:click="start">
              開始
            </v-btn>
            <v-btn variant="outlined" v-on:click="end">
              終了
            </v-btn>
          </v-card-actions>
        </v-card>
        <audio class="audio"></audio>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <div class="output"></div>
      </v-col>
    </v-row> -->


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
