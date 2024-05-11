<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3';
import Icon from './Icons/Icon.vue';
import { computed } from 'vue';

const props = defineProps<{
    href?: string,
    active?: boolean,
    icon: string,
    as?: string
}>()

const type = computed(() => {
    if (props.as == 'button') {
        return 'button'
    }
    return Link
})
</script>
<template>
    <component :is="type" :href="href"
        class="flex gap-2 items-center px-4 py-3 rounded-lg hover:bg-gray-100 hover:dark:bg-gray-900 w-full"
        :class="{ 'bg-gray-100': active, 'bg-gray-50 dark:bg-gray-950 text-gray-950 dark:text-gray-50': !active }">

        <template v-if="$slots.icon">
            <slot name="icon" />
        </template>
        <template v-else>
            <Icon v-if="icon" :type="icon" class="w-6 h-6" />
        </template>
        <span>
            <slot />
        </span>
    </component>
</template>
