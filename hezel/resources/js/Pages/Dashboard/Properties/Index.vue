<script setup lang="ts">
import AppLayout from '../../../Layouts/AppLayout.vue';
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';
import debounce from 'lodash/debounce'
import { iProperties, iProperty } from '../../../Interfaces/index';
import SecondaryButton from '../../../Components/SecondaryButton.vue';
import Icon from '../../../Components/Icons/Icon.vue';
import PropertyItem from './PropertyItem.vue';
import Paginator from '../../../Components/Paginator.vue';
import View from './View.vue';
import Property from './Property.vue';

const props = defineProps<{
    properties: iProperties,
    search?: string | "" | null

}>()

const searchVal = ref<string | "" | null | undefined>(props.search)

const handleSearch = debounce((value) => {
    let options: { search?: string | null }
    let searchQuery = value.target.value
    if (searchQuery) {
        options = { search: searchQuery }
    }
    router.get(route('dashboard-properties'), options, {
        only: ['properties', 'search'],
        preserveScroll: true,
        preserveState: true
    })
}, 500)

const view = ref<boolean>(false)
const edit = ref<boolean>(false)
const selectedProperty = ref<iProperty | null>(null)

const viewProperty = (property: iProperty) => {
    view.value = true;
    selectedProperty.value = property;
}

const editProperty = (property: iProperty | null) => {
    edit.value = true;
    selectedProperty.value = property;
}

const close = () => {
    view.value = false
    edit.value = false

    selectedProperty.value = null
}
</script>

<template>
    <View :show="view" :property="selectedProperty" @closed="close" />
    <Property :show="edit" :property="selectedProperty" @closed="close" />
    <AppLayout title="Properties">
        <template #header>
            Properties
        </template>
        <div class="flex flex-col gap-2">
            <div class="flex items-center justify-between gap-2 pb-4 bg-white dark:bg-gray-900 px-4 pt-4">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" v-model="searchVal"
                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-full w-full md:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for users" @input="handleSearch($event)">
                </div>
                <div>
                    <SecondaryButton class="flex items-center gap-2" @click="editProperty(null)">
                        <Icon class="h-5 w-5" type="add" /> <span class="hidden md:inline-flex">Add Property</span>
                    </SecondaryButton>
                </div>
            </div>
            <div class="flex flex-col">
                <PropertyItem @view="viewProperty(property)" @edit="editProperty(property)"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    v-for="property in properties.data" :property="property" />
                <Paginator :items="properties" />
            </div>
        </div>
    </AppLayout>
</template>
