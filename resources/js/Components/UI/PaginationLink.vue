<script setup>
defineProps({
    paginator: Object,
});

const makeLabel = (label) => {
    if (label === '&laquo; Previous') {
        return '<<<';
    } else if (label === 'Next &raquo;') {
        return '>>>';
    } else {
        return label;
    }
};
</script>

<template>
    <div class="flex justify-between items-start">
        <!-- LEFT: Pagination Links -->
        <div class="flex items-center rounded-md bg-white dark:bg-gray-800 px-2 py-1 gap-1">
            <div v-for="(link, index) in paginator.links" :key="index">
                <Component
                    :is="link.url ? 'Link' : 'span'"
                    :href="link.url"
                    v-html="makeLabel(link.label)"
                    class="px-2 py-1 cursor-pointer"
                    :class="[
                        link.url
                            ? 'text-gray-600 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400'
                            : 'text-gray-300 dark:text-gray-600 hover:cursor-not-allowed',
                        link.active
                            ? 'font-bold text-indigo-600 dark:text-indigo-400'
                            : '',
                    ]"
                />
            </div>
        </div>

        <!-- RIGHT: Info Text -->
        <p class="text-gray-600 dark:text-gray-400 text-sm">
            Showing
            <span class="font-medium">{{ paginator.from }}</span>
            to
            <span class="font-medium">{{ paginator.to }}</span>
            of
            <span class="font-medium">{{ paginator.total }}</span>
            results
        </p>
    </div>
</template>
