<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    user: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div class="group relative">
        <div
            class="flex items-center gap-2 px-2 py-1 rounded-lg cursor-pointer transition text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 group-hover:bg-slate-100 group-hover:dark:bg-slate-800 group-hover:dark:text-white"
        >
            <p>{{ user.name }}</p>
            <i class="fa-solid fa-angle-down"></i>
        </div>

        <div
            class="absolute z-50 top-full right-0 pt-2 hidden group-hover:block"
        >
            <div
                class="text-slate-600 bg-slate-100 dark:bg-slate-900 dark:text-white rounded-lg border-slate-600 border overflow-hidden w-40"
            >
                <Link
                    href="#"
                    class="block w-full px-6 py-2 hover:bg-slate-300 dark:hover:bg-slate-700 text-left"
                    >Profile</Link
                >
                <Link
                    href="#"
                    class="block w-full px-6 py-2 hover:bg-slate-300 dark:hover:bg-slate-700 text-left"
                    >Dashboard</Link
                >
                <Link
                    :href="route('logout')"
                    as="button"
                    method="post"
                    class="block w-full px-6 py-2 hover:bg-slate-300 dark:hover:bg-slate-700 text-left"
                    >Logout</Link
                >
            </div>
        </div>
    </div>
</template>
