<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const props = defineProps({
    routeName: {
        type: String,
        required: true,
    },
    componentName: {
        type: String,
        required: true,
    },
});

const page = usePage();

const isActive = computed(() => page.component === props.componentName);

const linkClasses = computed(() => [
    // Default Base classes
    "text-sm font-medium rounded-lg px-3 py-2 transition",
    // Active state
    isActive.value
        ? "bg-slate-100 text-slate-900 dark:bg-slate-800 dark:text-white"
        : "text-slate-600 hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white",
]);
</script>

<template>
    <Link :href="route(routeName)" :class="linkClasses">
        <slot />
    </Link>
</template>
