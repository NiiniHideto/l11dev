<script setup>
    import { ref } from 'vue'

    const props = defineProps({
        taskId: String
    })

</script>

<template>
    <form>
        <div>
            <label for="id">番号</label>
            <input type="text" readonly id="id" :value="taskId">
        </div>
        <div>
            <label for="title">タイトル</label>
            <input type="text" readonly id="title" value="仮のタイトルだよ">
        </div>
        <div>
            <label for="content">内容</label>
            <input type="text" readonly id="content" value="仮の内容だよ">
        </div>
        <div>
            <label for="person-in-charge">担当者</label>
            <input type="text" readonly id="person-in-charge" value="仮の担当者だよ">
        </div>
    </form>
</template>

