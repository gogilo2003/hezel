<script lang="ts" setup>
import Modal from '../../../Components/Modal.vue';
import { iProperty } from '../../../Interfaces/index';
import Icon from '../../../Components/Icons/Icon.vue';
import { formatCurrency } from '../../../helpers';

defineProps<{ show: boolean | false, property: iProperty | null }>()
const emit = defineEmits(['closed'])

const close = () => {
    emit('closed')
}
</script>
<template>
    <Modal :show="show" max-width="5xl" closeable>
        <div class="flex justify-between items-center mx-6 py-4">
            <div class="text-lg font-light font-sans">View Property</div>
            <button @click="close">
                <Icon class="h-5 w-5" type="close" />
            </button>
        </div>
        <div class="mx-6 py-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="hidden md:block">
                    <img class="h-full w-full object-cover" :src="property?.picture.thumb">
                </div>
                <div class="col-span-2 flex flex-col gap-3">
                    <div class="text-lg font-light uppercase" v-text="property?.title"></div>
                    <div>
                        <div class="flex flex-col text-sm">
                            <span class="font-semibold uppercase">Location</span>
                            <span class="font-light text-gray-800" v-text="property?.location"></span>
                        </div>
                        <div class="flex flex-col text-sm">
                            <span class="font-semibold uppercase">Description</span>
                            <span class="font-light text-gray-800" v-text="property?.description"></span>
                        </div>
                        <div class="flex gap-2">
                            <div class="flex flex-col text-sm">
                                <span class="font-semibold uppercase">Price</span>
                                <span class="font-light text-gray-800" v-text="formatCurrency(property?.price)"></span>
                            </div>
                            <div class="flex flex-col text-sm">
                                <span class="font-semibold uppercase">Status</span>
                                <span class="font-light text-gray-800" v-text="property?.status"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-h-[calc(100svh_-_25rem)] overflow-y-auto mt-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-3">
                    <div class="p-1 bg-gray-100 border rounded-lg shadow" v-for="{ url } in property?.pictures">
                        <img class="rounded" :src="url" />
                    </div>
                </div>
            </div>
        </div>
    </Modal>
</template>
