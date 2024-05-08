<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import Icon from '../Icons/Icon.vue';
import Heading from './Heading.vue';
const props = defineProps({ property: Object })

const features = computed(() => props.property.features.filter(item => item.highlighted))
</script>
<template>
    <Link :href="route('property', property.slug)"
        class="relative hover:shadow group transition-shadow duration-300 border border-primary/25 h-[30rem]">
    <div
        class="bg-secondary-default pt-3 pr-5 pb-3 pl-5 absolute top-2 -left-[6px] rounded-tr-3xl z-[2] before:border-t-[0px] before:border-r-[6px] before:border-b-[6px] before:border-l-[0px] before:border-t-transparent before:border-r-[#751814]/50 before:border-b-transparent before:border-l-transparent before:absolute before:left-0 before:-bottom-[6px] before:h-0 before:w-0 before:border-solid">
        <div class="flex text-sm gap-1 items-center text-stone-50">
            <Icon class="h-4 w-4" type="home" />
            For <span v-text="property.status"></span>
        </div>
        <p class=" text-white">{{ new Intl.NumberFormat('en-KE', {
            style: 'currency', currency: 'KES'
        }).format(property.price) }}</p>
    </div>
    <div class="relative z-[1] overflow-hidden h-[18rem]">
        <img class="group-hover:transform group-hover:scale-125 transition duration-300" :src="property.picture.thumb ?? ''"
            alt="property.picture.caption">
    </div>

    <div class="">
        <div class="text-primary-default p-4 relative ">
            <Heading level="h4" class="text-xl text-left mb-2 uppercase font-semibold" v-text="property.title"></Heading>
            <h4 class="flex gap-2 text-secondary-default text-sm text-center md:text-left">
                <Icon class="h-4" type="location" /><span v-text="property.location"></span>
            </h4>
            <div class="text-sm text-primary/50 py-3 flex gap-3 flex-wrap items-center">
                <div class="flex gap-2" v-for="feature in features">
                    <Icon class="h-4" :type="feature.icon" />
                    <span v-text="feature.value"></span>
                </div>
            </div>
        </div>
    </div>
    </Link>
</template>
