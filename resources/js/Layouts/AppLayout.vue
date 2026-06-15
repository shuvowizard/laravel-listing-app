<script setup>
import Navbar from '@/Components/Navbar.vue'
</script>

<template>
   <div>
        <Head>
            <title>My App - </title>
            <meta head-key="description" name="description" content="This is default fallback description for meta tags." />
        </Head>

        <!-- navbar -->
        <Navbar />

        <!-- Page content -->
        <main class="p-6">
            <slot />
        </main>
    </div>
</template>

<style scoped>

</style>