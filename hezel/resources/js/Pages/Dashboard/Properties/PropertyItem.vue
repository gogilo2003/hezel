<script lang="ts" setup>
import { iProperty } from '../../../Interfaces/index';
import { formatCurrency } from '../../../helpers';
import Icon from '../../../Components/Icons/Icon.vue';
import SecondaryButton from '../../../Components/SecondaryButton.vue';
import { ref, computed } from 'vue';
import { router, usePage } from '@inertiajs/vue3';
import { useToast } from 'primevue/usetoast';
import Toast from 'primevue/toast'

const props = defineProps<{
    property: iProperty | null
}>()

const toast = useToast()

const emit = defineEmits(['edit', 'view', 'pictures'])

const edit = () => {
    emit('edit', props.property)
}

const view = () => {
    emit('view', props.property)
}

const pictures = () => {
    emit('pictures', props.property)
}

const menuState = ref(false)

const openMenu = computed(() => {
    if (menuState.value) {
        return 'grid-rows-[1fr]'
    } else {
        return 'grid-rows-[0fr]'
    }
})

const onClickAway = () => {
    menuState.value = false
}

const publish = () => {
    router.post(route('dashboard-properties-publish', props.property.id), { _method: 'patch' }, {
        only: ['properties', 'notification'],
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            toast.add({
                severity: 'success',
                summary: 'Success',
                detail: usePage().props.notification.success,
                life: 300
            })
        },
        onError: () => {
            toast.add({
                severity: 'error',
                summary: 'Error',
                detail: usePage().props.notification.danger ?? 'An error occurred! Please try again',
                life: 300
            })
        }

    })
}

const feature = () => {
    router.post(route('dashboard-properties-feature', props.property.id), { _method: 'patch' }, {
        only: ['properties', 'notification'],
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            toast.add({
                severity: 'success',
                summary: 'Success',
                detail: usePage().props.notification.success,
                life: 300
            })
        },
        onError: () => {
            toast.add({
                severity: 'error',
                summary: 'Error',
                detail: usePage().props.notification.danger ?? 'An error occurred! Please try again',
                life: 300
            })
        }

    })
}
</script>
<template>
    <Toast position="top-center" />
    <div v-bind="$attrs"
        class="flex flex-col md:flex-row md:justify-between md:items-start px-3 md:px-6 py-6 max-w-full">

        <div
            class="flex flex-col gap-3 md:flex-row items-start md:items-start text-gray-900 whitespace-nowrap dark:text-white flex-1">
            <div class="flex-none h-[128px] w-full md:w-[128px]">
                <img class="w-full h-full object-cover object-top rounded-lg" :src="`${property?.picture?.thumb}`"
                    :alt="property?.title">
            </div>
            <div class="max-w-full whitespace-normal">
                <div class="text-base font-semibold uppercase" v-text="property?.title"></div>
                <div class="font-normal text-gray-500 line-clamp-2" v-text="property?.description">
                </div>
                <div class="flex flex-col md:flex-row gap-1 text-sm">
                    <span class="font-semibold">Location:</span>
                    <span class="font-light text-gray-500" v-text="property?.location"></span>
                </div>
                <div class="mt-3 text-left font-medium" v-text="formatCurrency(property?.price)"></div>
                <div v-if="property?.status" class="flex items-center">
                    <div class="h-2.5 w-2.5 rounded-full mr-2" :class="{ 'bg-green-400': property.status == 'sold' }">
                    </div> {{ property?.status }}
                </div>
            </div>
        </div>
        <div class="flex items-end justify-end relative flex-none" v-click-away="onClickAway">
            <button @click="menuState = true">
                <Icon class="h-4 w-4" type="more" />
            </button>
            <div class="absolute z-10 w-fit right-0 top-full overflow-x-hidden transition-[grid-template-rows] duration-200 grid"
                :class="openMenu">
                <div class="overflow-hidden w-fit border rounded-lg bg-gray-50 flex gap-1 flex-col"
                    :class="{ 'p-3 transition-[padding]': menuState, 'border-transparent': !menuState }">
                    <SecondaryButton @click="publish"
                        class="flex items-center gap-2 w-full justify-start whitespace-nowrap">
                        <Icon class="h-4 w-4" :type="property?.published ? 'arrow-down' : 'arrow-up'" />
                        <span class="" v-text="property?.published ? 'Un-Publish' : 'Publish'"></span>
                    </SecondaryButton>
                    <SecondaryButton @click="feature"
                        class="flex items-center gap-2 w-full justify-start whitespace-nowrap">
                        <Icon class="h-4 w-4" :type="property?.featured ? 'arrow-down' : 'arrow-up'" />
                        <span class="" v-text="property?.featured ? 'Demote' : 'Feature'"></span>
                    </SecondaryButton>
                    <SecondaryButton @click="view" class="flex items-center gap-2 w-full justify-start">
                        <Icon class="h-4 w-4" type="view" />
                        <span class="">View</span>
                    </SecondaryButton>
                    <SecondaryButton @click="edit" class="flex items-center gap-2 w-full justify-start">
                        <Icon class="h-4 w-4" type="edit" />
                        <span class="">Edit</span>
                    </SecondaryButton>
                    <SecondaryButton @click="pictures" class="flex items-center gap-2 w-full justify-start">
                        <Icon class="h-4 w-4" type="images" />
                        <span class="">Pictures</span>
                    </SecondaryButton>
                </div>
            </div>
        </div>

    </div>
</template>
