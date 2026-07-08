<script setup>
import Container from "../../Components/UI/Container.vue";
import Title from "../../Components/UI/Title.vue";
import TextLink from "../../Components/UI/TextLink.vue";
import InputField from "../../Components/UI/InputField.vue";
import PrimaryBtn from "../../Components/UI/PrimaryBtn.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register.store"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Register -" />

    <Container class="w-1/2">
        <div class="mb-8 text-center">
            <Title>Register a new account</Title>
            <p>
                Already have an account?
                <TextLink routeName="login" label="Login" />
            </p>
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

            <p class="text-slate-500 test-sm dark:text-slate-400">
                By creating an account, you agree to our Terms of Service and
                Privacy Policy.
            </p>

            <PrimaryBtn :disabled="form.processing">Register</PrimaryBtn>
        </form>
    </Container>
</template>

<style scoped></style>
