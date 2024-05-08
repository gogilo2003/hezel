<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import Icon from '../Icons/Icon.vue';

defineProps({ property: Object })
</script>
<template>
    <Link :href="route('property', property.slug)"
        class="grid grid-cols-[5rem_auto] gap-2 border border-gray-100/90 shadow my-1 overflow-hidden rounded backdrop-blur-sm items-center">
    <div class="h-20 w-20">
        <img :src="property.picture.thumb" alt="" class="w-full h-full object-cover rounded">
    </div>
    <div>
        <div class="text-md font-bold text-primary-500 mb-1" v-text="property.title"></div>
        <div class="flex justify-between items-start text-stone-600 gap-1">
            <Icon class="w-4" type="money" />
            <div v-text="new Intl.NumberFormat('en-KE', { style: 'currency', currency: 'KES' }).format(property.price)"
                class="text-sm grow"></div>
        </div>
        <div class="flex justify-between items-start text-stone-600 gap-1">
            <Icon class="w-4" type="location" />
            <div v-text="property.location" class="text-sm grow"></div>
        </div>
    </div>
    </Link>
</template>
