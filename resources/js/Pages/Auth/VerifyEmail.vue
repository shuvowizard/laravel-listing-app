<script setup>
import Title from "@/Components/UI/Title.vue";
import Container from "@/Components/UI/Container.vue";
import PrimaryBtn from "@/Components/UI/PrimaryBtn.vue";
import { useForm } from "@inertiajs/vue3";
import SessionMessage from "../../Components/UI/SessionMessage.vue";

defineProps({
    status: String,
});

const form = useForm({});

const submit = () => {
    form.post(route("verification.send"));
};
</script>

<template>
    <Head title="Verify Email -" />

    <Container class="w-1/2 mt-30">
        <div class="mb-8">
            <Title class="text-center text-slate-700">Verify your email</Title>
            <p>
                Thanks for signing up! Before getting started, could you verify
                your email address by clicking on the link we just emailed to
                you? If you didn't receive the email, we will gladly send you
                another.
            </p>
        </div>

        <SessionMessage :status="status" v-if="status" />

        <form @submit.prevent="submit">
            <PrimaryBtn :disabled="form.processing" class="w-full">
                Resend Verification Email
            </PrimaryBtn>
        </form>
    </Container>
</template>

<style scoped></style>
