<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';
import WebLayout from '../Layouts/WebLayout.vue';
import Slides from '../Components/Web/Slides.vue';
import Container from '../Components/Web/Container.vue';
import PropertyItem from '../Components/Web/PropertyItem.vue';
import Heading2 from '../Components/Web/Heading2.vue';
import VueCarousel from '../Components/Web/VueCarousel.vue';

defineProps({
    slides: Object,
    featured: Object,
    latest: Object,
    hot: Object,
})

</script>

<template>
    <WebLayout title="Home">
        <template #header>
            <Slides :slides="slides.data" />
        </template>
        <div class="py-10 bg-image-one bg-fixed bg-cover bg-center bg-no-repeat bg-blend-overlay bg-primary-600">
            <Container>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-20 items-center justify-center">
                    <div class="illustration-image w-full h-full">
                        <img class="w-full" src="/images/about.png" alt="About Us" />
                    </div>
                    <div class="col-span-2 flex flex-col gap-5">
                        <Heading2>Who we are <span class="block text-sm font-extralight text-orange-600">Know more
                                about
                                us</span></Heading2>
                        <p class="text-gray-100 text-lg" v-text="$page.props.aboutIntro"></p>
                        <div>
                            <Link
                                class=" text-gray-200 bg-secondary-500 hover:bg-secondary-600 transition duration-300 py-4 px-6 inline-block"
                                :href="route('about')">More
                            About Us</Link>
                        </div>
                    </div>
                </div>
            </Container>
        </div>
        <div class="py-10 bg-stone-300">
            <Container>
                <Heading2 class="text-primary-default">Featured Properties
                    <span class="block text-sm font-extralight text-orange-600">A collection of featured properties</span>
                </Heading2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 my-4 gap-8">
                    <PropertyItem class="bg-white" :property="featuredItem" v-for="featuredItem in featured.data" />
                </div>
            </Container>
        </div>
        <div class="bg-white pt-12">
            <Container>
                <Heading2 class="text-primary-default">Latest Properties
                    <span class="block text-sm font-extralight text-orange-600">Recently posted properties</span>
                </Heading2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 my-4 gap-8">
                    <PropertyItem :property="item" v-for="item in latest.data" />
                </div>
                <Heading2 class="text-primary-default">Hot cake Properties
                    <span class="block text-sm font-extralight text-orange-600">Fast selling properties</span>
                </Heading2>
                <VueCarousel :properties="hot.data" />
            </Container>
        </div>
    </WebLayout>
</template>

