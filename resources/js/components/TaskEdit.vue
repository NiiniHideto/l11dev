<script setup>
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
            <input type="text" id="title">
        </div>
        <div>
            <label for="content">内容</label>
            <input type="text" id="content">
        </div>
        <div>
            <label for="person-in-charge">担当者</label>
            <input type="text" id="person-in-charge">
        </div>
        <button type="submit">保存</button>
    </form>
</template>
