<script setup>
import Container from "../../Components/UI/Container.vue";
import Title from "../../Components/UI/Title.vue";
import TextLink from "../../Components/UI/TextLink.vue";
import InputField from "../../Components/UI/InputField.vue";
import PrimaryBtn from "../../Components/UI/PrimaryBtn.vue";
</script>

<template>
    <Head title="Register -" />

    <Container class="w-1/3">
        <div class="mb-8 text-center">
            <Title>Register a new account</Title>
            <p>
                Already have an account?
                <TextLink routeName="login" label="Login" />
            </p>
        </div>

        <form class="space-y-6">
            <InputField label="Name" icon="id-badge" />
            <InputField label="Email" icon="at" />
            <InputField label="Password" icon="key" />
            <InputField label="Confirm Password" icon="key" />

            <p class="text-slate-500 test-sm dark:text-slate-400">
                By creating an account, you agree to our Terms of Service and
                Privacy Policy.
            </p>

            <PrimaryBtn>Register</PrimaryBtn>
        </form>
    </Container>
</template>

<style scoped></style>
