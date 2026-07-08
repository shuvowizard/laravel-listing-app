<script setup>
import { ref, watch } from "vue";
import { useForm, router } from "@inertiajs/vue3";
import Card from "../Components/UI/Card.vue";
import InputField from "../Components/UI/InputField.vue";
import PaginationLink from "../Components/UI/PaginationLink.vue";
import RemoveFilters from "../Components/UI/RemoveFilters.vue";

const props = defineProps({
    listings: Object,
    filters: Object,
});

const params = route().params;

const search = ref(props.filters?.search || "");

let debounceTimer = null;
watch(search, (value) => {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => {
        router.get(
            route("home"),
            {
                search: value,
                user_id: params.user_id,
                tag: params.tag,
            },
            {
                replace: true,
            },
        );
    }, 300);
});

const userName = params.user_id
    ? props.listings.data.find(
          (listing) => listing.user_id === Number(params.user_id),
      )?.user?.name
    : null;
</script>

<template>
    <Head title="Home -" />

    <div>
        <!-- Search & Filters -->
        <div class="flex items-center justify-between mb-4">
            <!-- Remove Filters Component -->
            <RemoveFilters :params="params" :userName="userName" />

            <div class="w-1/4">
                <InputField
                    type="search"
                    label=""
                    icon="magnifying-glass"
                    placeholder="Search..."
                    v-model="search"
                />
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
