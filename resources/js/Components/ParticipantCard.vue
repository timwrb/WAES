<script setup>

defineProps([
    'participant',
    'id'
])
</script>

<template>
<div class="w-[20rem] flex items-center flex-col px-4 py-2 border border-gray-300 rounded-[1rem]">
    <h1 class="font-semibold text-[1.2rem]">{{ participant }}</h1>
    <h2 class="font-medium text-[1rem]">Matrikelnr.: {{ id }}</h2>

</div>
</template>

<style scoped>

</style>
