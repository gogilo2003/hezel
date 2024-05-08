<script setup lang="ts">
import { onMounted, ref } from "vue"
const props = defineProps({ level: { type: String, default: "h1" } })

const classes = ref('');

onMounted(() => {
    if (props.level.toLowerCase() == 'h1') {
        classes.value = "text-3xl md:text-5xl font-extralight mb-7 after:mt-2"
    }
    if (props.level.toLowerCase() == 'h2') {
        classes.value = "text-2xl md:text-3xl font-light mb-5 after:mt-2"
    }
    if (props.level.toLowerCase() == 'h3') {
        classes.value = "text-xl md:text-2xl mb-3 after:mt-1"
    }
    if (props.level.toLowerCase() == 'h4') {
        classes.value = "text-md md:text-lg font-semibold mb-1 after:mt-1"
    }
    if (props.level.toLowerCase() == 'h5') {
        classes.value = "text-sm md:text-md font-semibold mb-0 after:mt-0"
    }
})
</script>
<template>
    <Component :is="level"
        class="text-secondary-default after:mx-auto md:after:mx-0 text-center md:text-left after:border-b after:border-secondary-500 after:max-w-[6rem] after:block"
        :class="classes">
        <slot />
    </Component>
</template>
