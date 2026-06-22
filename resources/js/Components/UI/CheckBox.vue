<script setup>
const model = defineModel();

const props = defineProps({
    name: String,
    label: String,
});
</script>

<template>
    <div class="flex items-center gap-2">
        <input
            type="checkbox"
            v-model="model"
            :id="name"
            class="rounded-md border outline-0 text-indigo-500 ring-indigo-500 border-slate-700"
        />
        <label
            :for="name"
            class="text-sm font-medium text-slate-700 dark:text-slate-300 cursor-pointer"
        >
            {{ label }}
        </label>
    </div>
</template>

<style scoped></style>
