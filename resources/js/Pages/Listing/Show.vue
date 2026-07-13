<script setup>
import { router } from "@inertiajs/vue3";
import Container from "../../Components/UI/Container.vue";

const props = defineProps({
    listing: Object,
});

const deleteListing = () => {
    if (confirm("Are you sure you want to delete this listing?")) {
        router.delete(route("listing.destroy", props.listing.id));
    }
};
</script>

<template>
    <Head title="Listing Details - " />

    <Container class="flex gap-4">
        <!-- Listing Image -->
        <div class="w-1/4 rounded-md overflow-hidden">
            <img
                :src="
                    listing.image
                        ? `/storage/${listing.image}`
                        : '/storage/images/listing/default.jpg'
                "
                class="w-full h-full object-cover object-center"
                alt=""
            />
        </div>

        <!-- Listing Details -->
        <div class="w-3/4">
            <!-- Listing info -->
            <div class="mb-6">
                <div class="flex items-end justify-between mb-2">
                    <p class="text-gray-400 w-full border-b">Details</p>
                    <!-- Edit and Delete Buttons -->
                    <div class="pl-4 flex items-center gap-4">
                        <Link
                            :href="route('listing.edit', listing.id)"
                            class="bg-green-500 text-white px-6 py-2 rounded-full hover:bg-transparent hover:text-green-500 border-2 border-green-500 transition dark:hover:bg-transparent dark:hover:text-green-500"
                        >
                            Edit
                        </Link>
                        <button
                            @click="deleteListing"
                            class="bg-red-500 text-white px-6 py-2 rounded-full hover:bg-transparent hover:text-red-500 border-2 border-red-500 transition dark:hover:bg-transparent dark:hover:text-red-500 hover:cursor-pointer"
                        >
                            Delete
                        </button>
                    </div>
                </div>
                <h3 class="font-bold text-2xl mb-4">{{ listing.title }}</h3>
                <p>{{ listing.description }}</p>
            </div>

            <!-- Contact info -->
            <div class="mb-6">
                <p class="text-gray-400 w-full border-b">Contact Details</p>
            </div>

            <!-- Email -->
            <div v-if="listing.email" class="flex items-center mb-2 gap-2">
                <i class="fa-solid fa-at"></i>
                <p>Email:</p>
                <a :href="`mailto:${listing.email}`" class="text-link">
                    {{ listing.email }}
                </a>
            </div>

            <!-- Link -->
            <div v-if="listing.link" class="flex items-center mb-2 gap-2">
                <i class="fa-solid fa-up-right-from-square"></i>
                <p>External Link:</p>
                <a :href="listing.link" target="_blank" class="text-link">
                    {{ listing.link }}
                </a>
            </div>

            <!-- User -->
            <div class="flex items-center mb-2 gap-2">
                <i class="fa-solid fa-user"></i>
                <p>Listed by:</p>
                <Link
                    :href="route('home', { user_id: listing.user.id })"
                    class="text-link"
                >
                    {{ listing.user.name }}
                </Link>
            </div>

            <!-- Tags -->
            <div v-if="listing.tags" class="mb-6">
                <p class="text-slate-400 w-full border-b mb-2">Tags</p>
                <div class="flex items-center gap-3">
                    <div v-for="tag in listing.tags.split(',')" :key="tag">
                        <Link
                            :href="route('home', { tag })"
                            class="bg-slate-500 text-white px-2 py-px rounded-full hover:bg-slate-700 dark:hover:bg-slate-900"
                        >
                            {{ tag }}
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </Container>
</template>

<style scoped></style>
