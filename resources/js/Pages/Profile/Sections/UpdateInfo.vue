<script setup>
import Container from "../../../Components/UI/Container.vue";
import Title from "../../../Components/UI/Title.vue";
import InputField from "../../../Components/UI/InputField.vue";
import PrimaryBtn from "../../../Components/UI/PrimaryBtn.vue";
import SessionMessage from "../../../Components/UI/SessionMessage.vue";
import { useForm, router } from "@inertiajs/vue3";

const props = defineProps({
    user: Object,
    status: String
});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
});

const submit = () => {
    form.patch(route('profile.info.update'));
}

const resendEmail = (e) => {
    router.post(route('verification.send'),  {}, {
        onStart: () => (e.target.disabled = true),
        onFinish: () => (e.target.disabled = false),
    });
}
</script>

<template>
    <Container class="w-3/4 mt-6">
        <div class="mb-6">
            <Title>Update Information</Title>
            <p>Update your account's profile information and email address.</p>
        </div>

        <form @submit.prevent="submit" class="space-y-6">
            <InputField
                type="text"
                v-model="form.name"
                label="Name"
                icon="id-badge"
                placeholder="Enter full name"
                :error="form.errors.name"
                @focus="form.clearErrors('name')"
            />
            <InputField
                type="email"
                v-model="form.email"
                label="Email"
                icon="at"
                placeholder="email@example.com"
                :error="form.errors.email"
                @focus="form.clearErrors('email')"
            />

            <div v-if="user.email_verified_at === null" class="flex items-center gap-2">
                <SessionMessage :status="status" />
                <p class="text-sm text-amber-500 font-medium mb-4 dark:text-amber-400">
                    Your email address is unverified. 
                    <button @click="resendEmail" class="text-sm text-amber-600 hover:underline hover:cursor-pointer disabled:cursor-wait dark:text-amber-500">
                        Click here to resend the verification email.
                    </button>
                </p>
            </div>

            <div class="flex items-center gap-4">
                <PrimaryBtn :disabled="form.processing">Save</PrimaryBtn>
                <p v-if="form.recentlySuccessful" class="text-md font-medium text-green-500 dark:text-green-400">Saved!</p>
            </div>
        </form>

    </Container>
</template>

<style scoped>

</style>