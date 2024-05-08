<script setup lang="ts">
import AppLayout from '../../../Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import debounce from 'lodash'
import { formatCurrency } from '../../../helpers';
import { iProperties } from '../../../Interfaces/index';
import SecondaryButton from '../../../Components/SecondaryButton.vue';
import Icon from '../../../Components/Icons/Icon.vue'

const props = defineProps<{
    properties: iProperties
}>()

const search = ref()

watch(() => search.value, debounce((value) => {
    console.log(value);
}, 500))

</script>

<template>
    <AppLayout title="Properties">
        <template #header>
            Properties
        </template>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900 px-4 pt-4">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" v-model="search"
                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-full w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for users">
                </div>
                <div>

                    <SecondaryButton class="flex items-center gap-2">
                        <Icon class="h-5 w-5" type="add" /> <span>Add Property</span>
                    </SecondaryButton>
                </div>
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Property Details
                        </th>
                        <th scope="col" class="px-6 py-3 max-w-md">
                            Location
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3 w-48">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                        v-for="property in properties.data">
                        <td scope="row"
                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-16 h-16 rounded-lg" :src="`${property.picture.thumb}`" alt="Jese image">
                            <div class="pl-3">
                                <div class="text-base font-semibold uppercase" v-text="property.title"></div>
                                <div class="font-normal text-gray-500 w-full overflow-hidden whitespace-normal line-clamp-2"
                                    v-text="property.description">
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="line-clamp-2" v-text="property.location"></div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full mr-2"
                                    :class="{ 'bg-green-400': property.status == 'sold' }"></div> {{ property.status }}
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right" v-text="formatCurrency(property.price)">
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2 items-center h-full">
                                <SecondaryButton class="flex items-center gap-2">
                                    <Icon class="h-4 w-4" type="edit" />
                                    <span>View</span>
                                </SecondaryButton>
                                <SecondaryButton class="flex items-center gap-2">
                                    <Icon class="h-4 w-4" type="edit" />
                                    <span>Edit</span>
                                </SecondaryButton>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5">

                            <nav aria-label="Page navigation" class="py-1 flex justify-center">
                                <div class="flex items-center -space-x-px h-10 text-sm">
                                    <Link :as="link.url ? 'a' : 'span'" v-for="link in properties.links"
                                        :href="link.url ?? '#'"
                                        class="flex items-center justify-center px-3 h-10 min-w-[2.5rem] leading-tight border dark:border-gray-700 first:rounded-l-lg last:rounded-r-lg"
                                        :class="{ 'z-10 text-blue-600 border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:bg-gray-700 dark:text-white': link.active, 'text-gray-500 bg-white border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white': !link.active }"
                                        v-html="link.label">
                                    </Link>
                                </div>
                            </nav>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </AppLayout>
</template>
