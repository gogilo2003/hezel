<script lang="ts" setup>
import { iProperty } from '../../../Interfaces/index';
import { formatCurrency } from '../../../helpers';
import Icon from '../../../Components/Icons/Icon.vue';
import SecondaryButton from '../../../Components/SecondaryButton.vue';

const props = defineProps<{
    property: iProperty | null
}>()

const emit = defineEmits(['edit', 'view'])

const edit = () => {
    emit('edit', props.property)
}

const view = () => {
    emit('view', props.property)
}
</script>
<template>
    <div class="flex flex-col md:flex-row justify-between items-center px-3 md:px-6 py-6 max-w-full">

        <div
            class="flex flex-col gap-3 md:flex-row items-center md:items-start text-gray-900 whitespace-nowrap dark:text-white flex-1">
            <div class="flex-none h-[128px] w-full md:w-[128px]">
                <img class="w-full h-full object-cover object-top rounded-lg" :src="`${property?.picture?.thumb}`"
                    :alt="property?.title">
            </div>
            <div class="max-w-full whitespace-normal">
                <div class="text-base font-semibold uppercase" v-text="property?.title"></div>
                <div class="font-normal text-gray-500 md:line-clamp-2" v-text="property?.description">
                </div>
                <div class="flex flex-col md:flex-row gap-1 text-sm">
                    <span class="font-semibold">Location:</span>
                    <span class="font-light" v-text="property?.location"></span>
                </div>
                <div class="mt-3 text-left font-medium" v-text="formatCurrency(property?.price)"></div>
                <div v-if="property?.status" class="flex items-center">
                    <div class="h-2.5 w-2.5 rounded-full mr-2" :class="{ 'bg-green-400': property.status == 'sold' }">
                    </div> {{ property?.status }}
                </div>
            </div>
        </div>
        <div class="flex-none flex gap-2 items-center h-full">
            <SecondaryButton @click="view" class="flex items-center gap-2">
                <Icon class="h-4 w-4" type="view" />
                <span>View</span>
            </SecondaryButton>
            <SecondaryButton @click="edit" class="flex items-center gap-2">
                <Icon class="h-4 w-4" type="edit" />
                <span>Edit</span>
            </SecondaryButton>
        </div>

    </div>
</template>
