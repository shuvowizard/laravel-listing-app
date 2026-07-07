<script setup>
import Container from "../../Components/UI/Container.vue";
import Title from "../../Components/UI/Title.vue";
import InputField from "../../Components/UI/InputField.vue";
import PrimaryBtn from "../../Components/UI/PrimaryBtn.vue";
import TextArea from "../../Components/UI/TextArea.vue";
import ImageUpload from "../../Components/UI/ImageUpload.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    title: "",
    description: "",
    tags: "",
    email: "",
    link: "",
    image: "",
});
</script>

<template>
    <Head title="Create Listing -" />

    <h1 class="mb-5 text-3xl font-bold underline text-center text-red-600 mt-5">
        Create Listing
    </h1>

    <Container class="mx-auto max-w-5xl px-4 py-6">
        <div class="mb-6">
            <Title>Create a new Listing</Title>
        </div>

        <form @submit.prevent="form.post(route('listing.store'))" class="grid grid-cols-2 gap-6">
            <InputField
                label="Title"
                icon="heading"
                placeholder="Enter listing title"
                v-model="form.title"
                :error="form.errors.title"
                @focus="form.clearErrors('title')"
            />
            <InputField
                type="email"
                label="Email"
                icon="at"
                placeholder="example@example.com"
                v-model="form.email"
                :error="form.errors.email"
                @focus="form.clearErrors('email')"
            />
            <InputField
                label="Tags (comma separated)"
                icon="tags"
                placeholder="Ex: one, two, three"
                v-model="form.tags"
                :error="form.errors.tags"
                @focus="form.clearErrors('tags')"
            />
            <InputField
                label="External Link"
                icon="up-right-from-square"
                placeholder="https://example.com"
                v-model="form.link"
                :error="form.errors.link"
                @focus="form.clearErrors('link')"
            />
            <TextArea
                label="Description"
                icon="file-lines"
                placeholder="Enter listing description"
                v-model="form.description"
                :error="form.errors.description"
                @focus="form.clearErrors('description')"
            />
            <ImageUpload
                :error="form.errors.image"
                @image="
                    (e) => {
                        form.image = e;
                    }
                "
            />
            <PrimaryBtn class="col-span-2"> Create Listing </PrimaryBtn>
        </form>
    </Container>
</template>
