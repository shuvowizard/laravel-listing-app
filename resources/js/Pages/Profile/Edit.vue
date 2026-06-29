<script setup>
import UpdateInfo from './Sections/UpdateInfo.vue';
import UpdatePassword from './Sections/UpdatePassword.vue';

defineProps({
    user: Object,
    status: String
})

</script>

<template>
   <Head title="Edit Profile -"/>

    <UpdateInfo :user="user" :status="status"/>
    <UpdatePassword />

</template>

<style scoped>

</style>