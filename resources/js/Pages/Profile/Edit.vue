<script setup>
import DeleteAccount from './Sections/DeleteAccount.vue';
import UpdateInfo from './Sections/UpdateInfo.vue';
import UpdatePassword from './Sections/UpdatePassword.vue';

defineProps({
    user: Object,
    status: String
})

</script>

<template>
   <Head title="Edit Profile -"/>

    <UpdateInfo :user="user" />
    <UpdatePassword />
    <DeleteAccount />

</template>

<style scoped>

</style>