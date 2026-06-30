<script setup>
import Container from "../../../Components/UI/Container.vue";
import Title from "../../../Components/UI/Title.vue";
import InputField from "../../../Components/UI/InputField.vue";
import PrimaryBtn from "../../../Components/UI/PrimaryBtn.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const showConfirmPassword = ref(false);

const form = useForm({
    password: "",
});

const submit = () => {
    form.delete(route('profile.destroy'), {
        onFinish: () => form.reset(),
        preserveScroll: true,
    });
};
</script>

<template>
    <Container class="w-3/4 mt-6">
        <div class="mb-6">
            <Title>Delete Account</Title>
            <p>
                Once`s you delete your account, all of its resources and data
                will be permanently deleted. This action cannot be undone.
            </p>
        </div>

        <div v-if="showConfirmPassword">
            <form
                @submit.prevent="submit"
                class="space-y-6 flex items-end gap-4"
            >
                <InputField
                    type="password"
                    v-model="form.password"
                    label="Confirm Password"
                    icon="key"
                    placeholder="Confirm your password"
                    :error="form.errors.password"
                    @focus="form.clearErrors('password')"
                    class="w-1/3"
                />

                <div class="flex items-center gap-4 mb-5.5!">
                    <PrimaryBtn :disabled="form.processing">Confirm</PrimaryBtn>
                    <button
                        @click="showConfirmPassword = false"
                        type="button"
                        class="px-6 py-2 rounded-lg hover:cursor-pointer bg-blue-500 text-white hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-700"
                    >
                        <i class="fa-solid fa-x mr-2"></i>
                        Cancel
                    </button>
                </div>
            </form>
        </div>

        <button
            v-if="!showConfirmPassword"
            @click="showConfirmPassword = true"
            class="px-6 py-2 rounded-lg hover:cursor-pointer bg-red-500 text-white hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-700"
        >
            <i class="fa-solid fa-triangle-exclamation mr-2"></i>
            Delete Account
        </button>
    </Container>
</template>

<style scoped></style>
