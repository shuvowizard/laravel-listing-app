<script setup>
import { useForm, router } from "@inertiajs/vue3";
import Card from "../Components/UI/Card.vue";
import InputField from "../Components/UI/InputField.vue";
import PaginationLink from "../Components/UI/PaginationLink.vue";

const props = defineProps({
    listings: Object,
    filters: String,
});

const form = useForm({
    search: props.filters?.search || "",
});

const params = route().params;

const search = () => {
    router.get(route("home"), {
        search: form.search,
        user_id: params.user_id,
        tag: params.tag
    });
};
</script>

<template>
    <Head title="Home -" />

    <h1 class="mb-5 text-3xl font-bold underline text-center text-red-600 mt-5">
        Home Page
    </h1>

    <div class="mx-auto max-w-7xl px-4 py-6">
        <!-- Search & Filters -->
        <div class="flex items-center justify-between mb-4">
            <div>FIlters</div>

            <div class="w-1/4">
                <form @submit.prevent="search">
                    <InputField
                        type="search"
                        label=""
                        icon="magnifying-glass"
                        placeholder="Search..."
                        v-model="form.search"
                    />
                </form>
            </div>
        </div>

        <!-- Listing Card -->
        <div v-if="Object.keys(listings.data).length">
            <div class="grid grid-cols-3 gap-4">
                <div v-for="listing in listings.data" :key="listing.id">
                    <Card :listing="listing" />
                </div>
            </div>

            <!-- Pagination Links -->
            <div class="mt-8">
                <PaginationLink :paginator="listings" />
            </div>
        </div>

        <div v-else class="mx-auto max-w-7xl px-4 py-6">
            <p class="text-center">No listings found.</p>
        </div>
    </div>
</template>
