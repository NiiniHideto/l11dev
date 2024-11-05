// fetch.js
import { ref } from 'vue'

export function useFetch(url) {

    console.log(`useFetch(url) start`)

    const data = ref(null)
    const error = ref(null)

    fetch(url)
        .then((res) => res.json())
        .then((json) => (data.value = json))
        .catch((err) => (error.value = err))

    console.log(`useFetch(url) end  ${data.value}`)

    return { data, error }
}