<script setup>
defineProps({
    status: String,
});
</script>

<template>
    <p class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </p>
</template>
