<script lang="ts" setup>
import Modal from '../../../Components/Modal.vue';
import { useToast } from "primevue/usetoast";
import { useForm } from '@inertiajs/vue3';
import Toast from 'primevue/toast';
import FileUpload from 'primevue/fileupload';
import Badge from 'primevue/badge';
import Button from 'primevue/button';
import ProgressBar from 'primevue/progressbar';
import { ref } from 'vue';
import { iProperty } from '../../../Interfaces/index';
import Icon from '../../../Components/Icons/Icon.vue';
import PrimaryButton from '../../../Components/PrimaryButton.vue';
import SecondaryButton from '../../../Components/SecondaryButton.vue';

const props = defineProps<{
    property: iProperty | null,
    show: boolean
}>()

const emit = defineEmits(['closed'])

const form = useForm<{
    id: number | null
    files: any[]
}>({
    id: null,
    files: []
});

const toast = useToast();

const close = () => {
    form.reset()
    form.clearErrors()
    selectedFiles.value = []
    emit('closed')
}

const submit = () => {
    form.transform((data) => {
        return {
            ...data,
            id: props.property.id,
            files: selectedFiles.value
        }
    }).post(route('dashboard-pictures-store'), {
        onSuccess: () => {
            toast.add({
                severity: "info",
                summary: "Success",
                detail: "File Uploaded",
                life: 3000
            });
            close()
        },
        onError: () => {
            toast.add({
                severity: "error",
                summary: "Error",
                detail: "File Upload failed",
                life: 3000
            });
        },
        only: ['properties', 'notification', 'errors']
    })

};

const fileInput = ref<HTMLInputElement | null>(null);
const selectedFiles = ref<File[]>([]);
const filePreviewUrls = ref<string[]>([]);

const handleFileChange = () => {
    const files = fileInput.value?.files;
    if (files) {
        for (let i = 0; i < files.length; i++) {
            selectedFiles.value.push(files[i]);
            filePreviewUrls.value.push(URL.createObjectURL(files[i]));
        }
    }
};

const removeFile = (index: number) => {
    selectedFiles.value.splice(index, 1);
    filePreviewUrls.value.splice(index, 1);
};

const formatSize = (bytes: number): string => {
    const k = 1024;
    const dm = 2;
    const sizes = ["B", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"];

    if (bytes === 0) {
        return '0 Bytes';
    }

    const i = Math.floor(Math.log(bytes) / Math.log(k));
    const formattedSize = parseFloat((bytes / Math.pow(k, i)).toFixed(dm));

    return `${formattedSize} ${sizes[i]}`;
};

</script>
<template>
    <Toast position="top-center" />
    <Modal :show="show" maxWidth="3xl">
        <div class="flex justify-between mx-6 py-3 border-b text-lg uppercase font-light text-gray-800">
            <div>Upload Pictures</div>
            <button @click="close">
                <Icon class="h-5 w-5" type="close" />
            </button>
        </div>
        <form @submit.prevent="submit">
            <div class="px-6 py-4">
                <div class="flex gap-2 justify-between pb-4">
                    <SecondaryButton class="relative flex gap-2 items-center">
                        <Icon class="h-5 w-5" type="add" />
                        <span>Add File(s)</span>
                        <input class="opacity-0 absolute top-0 left-0 w-full h-full cursor-pointer" type="file"
                            ref="fileInput" multiple accept="image/*" @change="handleFileChange">
                    </SecondaryButton>
                    <PrimaryButton v-if="selectedFiles.length > 0" :class="{ 'opacity-30': form.processing }"
                        :disabled="form.processing" class="flex gap-2 items-center">
                        <Icon class="h-4 w-4" type="upload" />
                        <span class="hidden md:inline-flex">Upload</span>
                    </PrimaryButton>
                </div>
                <div v-if="selectedFiles.length > 0">
                    <h3>Selected Files:</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div v-for="(file, index) in selectedFiles" :key="index" class="">
                            <div>
                                <img :src="filePreviewUrls[index]" alt="Preview" class="w-full">
                                <span>{{ file.name }} - {{ formatSize(file.size) }}</span>
                            </div>
                            <button type="button" @click="removeFile(index)">
                                <Icon class="text-red-600 h-5 w-5" type="delete" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </Modal>
</template>
