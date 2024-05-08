<script setup>
import Carousel from './Carousel.vue';
import Slide from './Slide.vue';
defineProps({ slides: Array })

</script>
<template>
    <div class="relative h-vh w-vw slides">
        <Carousel v-slot="{ currentSlide }" :slideCount="slides.length">
            <div class="absolute top-0 left-0 slides w-full h-full">
                <Slide v-for="(slide, index) in slides" :currentSlide="currentSlide === index + 1" :slide="slide" />
            </div>
        </Carousel>
    </div>
</template>
