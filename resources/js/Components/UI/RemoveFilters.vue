<script setup>
defineProps({
    params: Object,
    userName: String,
});
</script>

<template>
    <div class="flex items-center gap-2">
        <p class="text-md font-semibold">Search:</p>
        <Link
            v-if="params.search"
            :href="route('home', { ...params, search: null, page: null })"
            class="px-2 py-1 text-sm rounded-2xl bg-indigo-500 text-white flex items-center gap-2"
        >
            {{ params.search }}
            <i class="fa-solid fa-x"></i>
        </Link>
        <Link
            v-if="params.user_id"
            :href="route('home', { ...params, user_id: null, page: null })"
            class="px-2 py-1 text-sm rounded-2xl bg-indigo-500 text-white flex items-center gap-2"
        >
            {{ userName }}
            <i class="fa-solid fa-x"></i>
        </Link>
        <Link
            v-if="params.tag"
            :href="route('home', { ...params, tag: null, page: null })"
            class="px-2 py-1 text-sm rounded-2xl bg-indigo-500 text-white flex items-center gap-2"
        >
            {{ params.tag }}
            <i class="fa-solid fa-x"></i>
        </Link>
    </div>
</template>
