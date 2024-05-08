<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({ currentSlide: { type: Boolean, default: null }, slide: Object })
</script>
<template>
    <transition name="slide" v-show="currentSlide" as="div">
        <div class="absolute w-full h-full slide bg-gradient-to-tr from-yellow-300 to-blue-500">
            <img :src="slide.url" :alt="slide.title" class="object-cover mix-blend-overlay">
            <div class="absolute top-0 left-0 flex items-center justify-center h-full w-full">
                <div
                    class="text-center z-10 max-w-3xl md:mx-auto mx-5 bg-stone-50 rounded-xl p-3 md:py-10 px-5 shadow-xl space-y-8 flex flex-col bg-opacity-20 backdrop-blur-sm min-w-full md:min-w-[48rem]">
                    <h3
                        class="text-2xl md:text-3xl lg:text-5xl mix-blend-multiply font-light uppercase inline-block pb-2 after:block after:w-12 after:h-2 after:rounded-xl after:mt-4 after:mx-auto after:bg-secondary-default text-secondary-default">
                        {{
                            slide.title
                        }}</h3>
                    <div v-if="slide.caption"
                        class=" inline-block my-6 md:my-8 lg:my-10 text-lg md:text-xl lg:text-2xl text-gray-50">{{
                            slide.caption }}
                    </div>
                    <div v-if="slide.link">
                        <Link :href="slide.link"
                            class=" inline-block py-2 px-4 border-2 border-orange-600 rounded-full uppercase font-semibold text-orange-600 hover:text-orange-700 hover:border-orange-700 transition duration-300">
                        Read More...
                        </Link>
                    </div>
                </div>
            </div>
        </div>

    </transition>
</template>
<style lang="scss">
.slide-enter-active,
.slide-leave-active {
    transition: opacity 2s ease-in-out;
}

.slide-enter-from,
.slide-leave-to {
    opacity: 0
}

.slide-enter-to,
.slide-leave-from {
    opacity: 1
}
</style>
