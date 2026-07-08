<script setup>
import Container from "../../Components/UI/Container.vue";
import Title from "../../Components/UI/Title.vue";
import TextLink from "../../Components/UI/TextLink.vue";
import InputField from "../../Components/UI/InputField.vue";
import PrimaryBtn from "../../Components/UI/PrimaryBtn.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    token: String,
    email: String
})

const form = useForm({
    token: props.token,
    email: props.email,
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("password.update"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Register -" />

    <Container class="w-1/2 mt-30">
        <div class="mb-8 text-center">
            <Title>Enter your new password</Title>
        </div>

        <form @submit.prevent="submit" class="space-y-6">
            <InputField
                type="email"
                v-model="form.email"
                label="Email"
                icon="at"
                placeholder="email@example.com"
                :error="form.errors.email"
                @focus="form.clearErrors('email')"
            />
            <InputField
                type="password"
                v-model="form.password"
                label="Password"
                icon="key"
                placeholder="Enter password"
                :error="form.errors.password"
                @focus="form.clearErrors('password')"
            />
            <InputField
                type="password"
                v-model="form.password_confirmation"
                label="Confirm Password"
                icon="key"
                placeholder="Confirm password"
                :error="form.errors.confirm_password"
                @focus="form.clearErrors('confirm_password')"
            />

            <PrimaryBtn :disabled="form.processing">Reset Password</PrimaryBtn>
        </form>
    </Container>
</template>

<style scoped></style>
