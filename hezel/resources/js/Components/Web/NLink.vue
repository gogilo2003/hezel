<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'px-8 py-2 text-secondary-500 hover:text-secondary-500 md:px-2 md:py-6 duration-300 transition ease-in-out'
        : 'px-8 py-2 text-stone-50 md:text-primary-600 hover:text-secondary-500 md:px-2 md:py-6 duration-300 transition ease-in-out';
});
</script>

<template>
    <Link :href="href" :class="classes">
    <slot />
    </Link>
</template>
