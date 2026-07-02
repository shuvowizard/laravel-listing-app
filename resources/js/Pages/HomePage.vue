<script setup>
import Card from '../Components/UI/Card.vue';
import PaginationLink from '../Components/UI/PaginationLink.vue';
defineProps({
    listings: Object,
})
</script>

<template>
    <Head title="Home -" />

    <h1 class="mb-5 text-3xl font-bold underline text-center text-red-600 mt-5">Home Page</h1>

    <div v-if="Object.keys(listings.data).length" class="mx-auto max-w-7xl px-4 py-6">
        <div class="grid grid-cols-3 gap-4">
            <div v-for="listing in listings.data" :key="listing.id">
                <Card :listing="listing" />
            </div>
        </div>

        <div class="mt-8">
            <PaginationLink :paginator="listings" />
        </div>   
    </div>

</template>

<style scoped>

</style>