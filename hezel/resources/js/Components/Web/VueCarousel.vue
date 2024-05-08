<script setup>
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'
import PropertyItem from './PropertyItem.vue';
defineProps(['properties'])

const settings = {
    snapAlign: "left",
    wrapAround: true,
    itemsToShow: 3,
    autoPlay: true
}
</script>
<template>
    <Carousel v-bind="settings">
        <Slide v-for="slide in properties" :key="slide.id" class="p-3 first:pl-0 last:pr-0">
            <PropertyItem :property="slide" />
        </Slide>

        <template #addons>
            <Navigation />
            <Pagination />
        </template>
    </Carousel>
</template>
<style lang="scss">
:root {
    --vc-icn-width: 32px;
}

.carousel__track {
    min-height: 200px;
    width: 100%;
    /* background-color: var(--vc-clr-primary);
    color: var(--vc-clr-white); */
    font-size: 20px;
    border-radius: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.carousel__slide {
    padding: 10px;
    min-height: 200px;
}

.carousel__prev,
.carousel__next {
    box-sizing: content-box;
    background-color: rgba($color: white, $alpha: 0.35);
    padding: 1rem;
}

.carousel__slide--active {
    @apply border-secondary-default;
}
</style>
