<template>
    <span class="text-red-500" v-if="message" v-text="message"/>
</template>
<script setup>
defineProps({
    message: {
        required: false,
        type: String,
        default: ""
    }
})
</script>
