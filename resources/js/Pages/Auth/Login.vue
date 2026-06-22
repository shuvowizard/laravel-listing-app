<script setup>
import Container from "../../Components/UI/Container.vue";
import Title from "../../Components/UI/Title.vue";
import TextLink from "../../Components/UI/TextLink.vue";
import InputField from "../../Components/UI/InputField.vue";
import PrimaryBtn from "../../Components/UI/PrimaryBtn.vue";
import CheckBox from "../../Components/UI/CheckBox.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    email: "",
    password: "",
    remember: null,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Login -" />

    <Container class="w-1/3">
        <div class="mb-8 text-center">
            <Title>Login to your account</Title>
            <p>
                Create account?
                <TextLink routeName="register" label="Register" />
            </p>
        </div>

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
            <InputField
                type="password"
                label="Password"
                icon="key"
                placeholder="Enter password"
                v-model="form.password"
                :error="form.errors.password"
                @focus="form.clearErrors('password')"
            />
            <div class="flex items-center justify-between">
                <CheckBox v-model="form.remember" name="remember" label="Remember me" />
                <TextLink routeName="home" label="Forgot Password?" />
            </div>
            <PrimaryBtn :disabled="form.processing">Login</PrimaryBtn>
        </form>
    </Container>
</template>

<style scoped></style>
