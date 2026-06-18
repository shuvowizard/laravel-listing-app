<script setup>
import { toggleTheme } from '../Composables/useTheme';

</script>

<template>
    <!-- Navbar -->
    <nav class="border-b border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-900">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-3 py-3">

            <!-- Logo -->
            <Link :href="route('home')" class="text-xl font-bold leading-tight rounded-lg px-2 py-1.5 text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">
                Home
            </Link>

            <!-- Navigation -->
            <div class="flex items-center gap-2">
                
                 <Link href="#" class=" text-sm font-medium rounded-lg px-3 py-2 text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">
                    Login
                </Link>

                <Link href="#" class=" text-sm font-medium rounded-lg px-3 py-2 text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">
                    Register
                </Link>
                
                <!-- Theme Toggle -->
                <button
                    @click="toggleTheme"                    
                    class="ml-2 grid h-9 w-9 place-items-center rounded-full text-slate-600 transition hover:bg-slate-100 hover:text-slate-900 dark:text-slate-300 dark:hover:bg-slate-800 dark:hover:text-white">
                    <i class="fa-solid fa-circle-half-stroke"></i>
                </button>
            </div>
        </div>
    </nav>
</template>

<style scoped></style>