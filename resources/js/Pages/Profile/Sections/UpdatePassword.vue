<script setup>
import Container from "../../../Components/UI/Container.vue";
import Title from "../../../Components/UI/Title.vue";
import InputField from "../../../Components/UI/InputField.vue";
import PrimaryBtn from "../../../Components/UI/PrimaryBtn.vue";
import SessionMessage from "../../../Components/UI/SessionMessage.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    current_password: "",
    password: "",
    password_confirmation: "",

});

const submit = () => {
    form.put(route("profile.password.update"), {
        onSuccess: () => form.reset(),
        preserveScroll: true,
    });
}

</script>

<template>
    <Container class="w-3/4 mt-6">
        <div class="mb-6">
            <Title>Update Password</Title>
            <p>Ensue your account is using a long, hard to guess password.</p>
        </div>

        <form @submit.prevent="submit" class="space-y-6">
            <InputField
                type="password"
                v-model="form.current_password"
                label="Current Password"
                icon="key"
                placeholder="Enter current password"
                :error="form.errors.current_password"
                @focus="form.clearErrors('current_password')"
            />
            <InputField
                type="password"
                v-model="form.password"
                label="New Password"
                icon="key"
                placeholder="Enter new password"
                :error="form.errors.password"
                @focus="form.clearErrors('password')"
            />
            <InputField
                type="password"
                v-model="form.password_confirmation"
                label="Confirm New Password"
                icon="key"
                placeholder="Confirm new password"
                :error="form.errors.password_confirmation"
                @focus="form.clearErrors('password_confirmation')"
            />

            <div class="flex items-center gap-4">
                <PrimaryBtn :disabled="form.processing">Save</PrimaryBtn>
                <p v-if="form.recentlySuccessful" class="text-md font-medium text-green-500 dark:text-green-400">Saved!</p>
            </div>
            
        </form>

    </Container>
</template>

<style scoped>

</style>