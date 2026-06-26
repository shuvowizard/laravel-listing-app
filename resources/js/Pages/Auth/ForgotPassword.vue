<script setup>
import Container from "@/Components/UI/Container.vue";
import InputField from "@/Components/UI/InputField.vue";
import PrimaryBtn from "@/Components/UI/PrimaryBtn.vue";
import SessionMessage from "@/Components/UI/SessionMessage.vue";
import { useForm } from "@inertiajs/vue3";

defineProps({ status: String })

const form = useForm({
    email: "",
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Forgot Password -" />

    <Container class="w-1/3 mt-30">
        <div class="mb-8 text-center">
            <p>
                Forgot your password? No problem. Just let us know your email
                address and we will email you a password reset link that will
                allow you to choose a new one.
            </p>
        </div>

        <SessionMessage :status="status" />

        <form @submit.prevent="submit" class="space-y-6">
            <InputField
                type="email"
                label="Email"
                icon="at"
                placeholder="email@example.com"
                v-model="form.email"
                :error="form.errors.email"
                @focus="form.clearErrors('email')"
            />
            <PrimaryBtn :disabled="form.processing" class="w-full">Send Password Reset Link</PrimaryBtn>
        </form>
    </Container>
</template>

<style scoped></style>
