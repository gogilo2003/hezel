<script lang="ts" setup>
import Modal from '../../../Components/Modal.vue';
import { iProperty, iItem } from '../../../Interfaces/index';
import Icon from '../../../Components/Icons/Icon.vue';
import SecondaryButton from '../../../Components/SecondaryButton.vue';
import PrimaryButton from '../../../Components/PrimaryButton.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import InputLabel from '../../../Components/InputLabel.vue';
import InputError from '../../../Components/InputError.vue';
import InputText from 'primevue/inputtext';
import InputNumber from 'primevue/inputnumber';
import { watchEffect, computed } from 'vue';
import { inputtext, inputnumber, textarea, dropdown } from '../../../primevue/index';
import { useToast } from 'primevue/usetoast'
import Toast from 'primevue/toast';
import Textarea from 'primevue/textarea';

const props = defineProps<{ show: boolean | false, property: iProperty | null }>()
const emit = defineEmits(['closed'])

const toast = useToast()

const form = useForm<{
    id: number | null
    title: string | ""
    description: string | ""
    price: number | null
    longitude: string | ""
    latitude: string | ""
    location: string | ""
    county: number | null
    sub_county: number | null
    ward: number | null
    town: number | null
}>({
    id: null,
    title: "",
    description: "Some description here",
    price: 0,
    latitude: "",
    longitude: "",
    location: "",
    county: null,
    sub_county: null,
    ward: null,
    town: null,
});

const close = () => {
    form.reset()
    form.clearErrors()
    emit('closed')
}

watchEffect(() => {
    props.property
    form.id = props.property?.id
    form.title = props.property?.title
    form.description = props.property?.description
    form.price = props.property?.price ? parseInt(props.property?.price.toString()) : null
    form.location = props.property?.location

})

const edit = computed(() => {
    if (props.property?.id) {
        return true
    }
    return false;
})

const title = computed(() => {
    if (edit.value) {
        return 'Edit Property'
    }
    return 'New Property'
})
const submit = () => {
    if (edit.value) {
        form.transform((data) => {
            return {
                ...data,
                _method: 'patch'
            }
        }).post(route('dashboard-properties-update', form.id), {
            only: ['properties', 'errors', 'notification'],
            preserveScroll: true,
            preserveState: true,
            onSuccess: () => {
                toast.add({
                    severity: 'success',
                    summary: 'Success',
                    detail: usePage().props.notification?.success,
                    life: 4000
                })
                close()
            },
            onError: () => {
                toast.add({
                    severity: 'error',
                    summary: 'Error',
                    detail: usePage().props.notification?.danger ?? 'An Error occurred! Please check your fields and try again.',
                    life: 4000
                })
            }
        })
    } else {
        form.post(route('dashboard-properties-store'), {
            only: ['properties', 'errors', 'notification'],
            preserveScroll: true,
            preserveState: true,
            onSuccess: () => {
                toast.add({
                    severity: 'success',
                    summary: 'Success',
                    detail: usePage().props.notification?.success,
                    life: 4000
                })
                close()
            },
            onError: () => {
                toast.add({
                    severity: 'error',
                    summary: 'Error',
                    detail: usePage().props.notification?.danger ?? 'An Error occurred! Please check your fields and try again.',
                    life: 4000
                })
            }
        })
    }
}
</script>
<template>
    <Toast position="top-center" />
    <Modal :show="show" max-width="5xl" closeable>
        <div class="flex justify-between items-center mx-6 py-4">
            <div class="text-lg font-light font-sans" v-text="title"></div>
            <button @click="close">
                <Icon class="h-5 w-5" type="close" />
            </button>
        </div>
        <form @submit.prevent="submit">
            <div class="mx-6 py-4">
                <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-2">
                        <InputLabel value="Title" />
                        <InputText :pt="inputtext" v-model="form.title" />
                        <InputError :message="form.errors.title" />
                    </div>
                    <div class="">
                        <InputLabel value="Price" />
                        <InputNumber :useGrouping="false" :pt="inputnumber" v-model="form.price" />
                        <InputError :message="form.errors.price" />
                    </div>
                </div>
                <div class="mb-6">
                    <InputLabel value="Location" />
                    <InputText :pt="inputtext" v-model="form.location" />
                    <InputError :message="form.errors.location" />
                </div>
                <div class="mb-6">
                    <InputLabel value="Description" />
                    <Textarea :pt="textarea" v-model="form.description" rows="4" />
                    <InputError :message="form.errors.description" />
                </div>
            </div>
            <div class="mx-6 mb-6 flex justify-between">
                <PrimaryButton :class="{ 'opacity-30': form.processing }" :disabled="form.processing">Save
                </PrimaryButton>
                <SecondaryButton type="button" @click="close">Cancel</SecondaryButton>
            </div>
        </form>
    </Modal>
</template>
