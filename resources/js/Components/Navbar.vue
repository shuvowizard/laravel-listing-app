<script setup>

</script>

<template>
        <!-- Navbar -->
    <nav class="bg-gray-800 text-white p-4">
        <div class="container mx-auto">
            <ul class="flex space-x-4">
                <li><Link :href="route('home')" class="hover:text-blue-300">Home</Link></li>
                <li><Link :href="route('about')" class="hover:text-blue-300">About</Link></li>
                <li><Link :href="route('contact')" class="hover:text-blue-300">Contact</Link></li>
            </ul>
        </div>
    </nav>
</template>

<style scoped>

</style>