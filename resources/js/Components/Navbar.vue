<script setup>
import NavLink from '@/Components/NavLink.vue'
import UserDropdown from '@/Components/UI/UserDropdown.vue';
import { toggleTheme } from '../Composables/useTheme';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth.user);
</script>

<template>
    <!-- Navbar -->
    <nav class="sticky top-0 z-50 border-b border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-900">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-3 py-3">

            <!-- Logo -->
            <NavLink routeName="home" componentName="HomePage">Home</NavLink>

            <!-- Navigation -->
            <div class="flex items-center space-x-2">

                <!-- Authenticated -->
                <UserDropdown v-if="user" :user="user" />
                
                <!-- Guest -->
                 <div v-else class="space-x-6">
                     <NavLink routeName="login" componentName="Auth/Login">Login</NavLink>
     
                     <NavLink routeName="register" componentName="Auth/Register">Register</NavLink>
                 </div>

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