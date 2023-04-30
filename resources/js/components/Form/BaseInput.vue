<template>
    <input type='text'
           :value="modelValue"
           name="title"
           placeholder="Enter your article title"
           class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500"
           @input="$emit('update:modelValue', $event.target.value)"/>
</template>

<script setup>
defineProps({
    modelValue: {
        type: String,
    }
})
</script>
