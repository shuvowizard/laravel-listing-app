<script setup>
defineProps({
    disabled: {
        type: Boolean,
        default: false,
    },
});
</script>

<template>
    <button
        :disabled="disabled"
        class="group relative flex min-h-11 min-w-30 items-center justify-center gap-2 rounded-lg border-2 border-slate-900 bg-slate-900 px-6 py-2 text-white transition-all duration-200 hover:cursor-pointer hover:bg-transparent hover:text-slate-900 disabled:cursor-default disabled:bg-transparent disabled:text-slate-900 dark:border-white dark:bg-white dark:text-slate-900 dark:hover:bg-transparent dark:hover:text-white dark:disabled:bg-transparent dark:disabled:text-white"
    >
        <svg
            v-if="disabled"
            class="h-5 w-5 animate-spin"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
        >
            <circle
                class="opacity-25"
                cx="12"
                cy="12"
                r="10"
                stroke="currentColor"
                stroke-width="4"
            ></circle>
            <path
                class="opacity-75"
                fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"
            ></path>
        </svg>

        <span v-if="!disabled"><slot /></span>
    </button>
</template>
