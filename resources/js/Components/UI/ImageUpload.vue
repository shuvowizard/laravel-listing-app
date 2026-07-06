<script setup>
import { ref } from "vue";
defineProps({
    error: {
        type: String,
        default: "",
    },
});

const emit = defineEmits(["image"]);

const preview = ref(null);
const oversizedImage = ref(false);

const imageSelected = (e) => {
    preview.value = URL.createObjectURL(e.target.files[0]);
    oversizedImage.value = e.target.files[0].size > 3145728;
    emit("image", e.target.files[0]);
};
</script>

<template>
    <div>
        <span
            class="block text-sm font-medium text-slate-700 dark:text-slate-300"
            :class="{ 'text-red-500!': oversizedImage }"
        >
            {{
                oversizedImage
                    ? "The selected image exceeds 3Mb"
                    : "Image (Max size 3Mb)"
            }}
        </span>

        <label
            for="image"
            class="block rounded-md mt-1 bg-slate-300 h-35 overflow-hidden cursor-pointer border-slate-300 border"
            :class="{ 'border-red-500!': oversizedImage }"
        >
            <img
                :src="preview ?? '/storage/images/listing/default.jpg'"
                class="w-full h-full object-cover object-center"
                alt=""
            />
        </label>

        <input
            @input="imageSelected"
            type="file"
            name="image"
            id="image"
            hidden
        />
        <!-- Error message -->
        <p
            v-if="error"
            class="absolute left-4 top-full mt-1 text-xs text-red-500"
        >
            {{ error }}
        </p>
    </div>
</template>
