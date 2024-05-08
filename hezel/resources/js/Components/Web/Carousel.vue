<script setup>
import { onMounted, ref } from 'vue';

const currentSlide = ref(2)
const props = defineProps({
    slideCount: Number,
    autoPlayEnabled: {
        type: Boolean,
        default: true
    },
    timeoutDuration: {
        type: Number,
        default: 10000
    }
})

const changeSlide = (newIndex) => {
    if (newIndex < 1) {
        currentSlide.value = props.slideCount
    } else {
        if (newIndex > props.slideCount) {
            currentSlide.value = 1
        } else {
            currentSlide.value = newIndex
        }
    }

}

const nextSlide = () => {
    changeSlide(++currentSlide.value)
}
const prevSlide = () => {
    changeSlide(--currentSlide.value)
}

const autoPlay = () => {
    setInterval(() => {
        nextSlide()
    }, props.timeoutDuration);
}

if (props.autoPlayEnabled) {
    autoPlay()
}
</script>
<template>
    <div class="relative h-screen -mt-[8rem]">
        <slot :currentSlide="currentSlide" />
        <div class="py-0 px-4 w-full h-full absolute flex items-center justify-center">
            <div class="flex flex-1">
                <svg @click="prevSlide"
                    class="cursor-pointer hover:text-stone-300/90 text-stone-100/25 transition duration-300"
                    xmlns="http://www.w3.org/2000/svg" width="86.35" height="264.029" viewBox="0 0 86.35 264.029">
                    <path d="M140,672,57.709,540.251,140,410.1" transform="translate(-55.346 -409.031)" fill="none"
                        stroke="currentColor" stroke-linecap="round" stroke-width="4" />
                </svg>
            </div>
            <div class="flex flex-1 justify-end">
                <svg @click="nextSlide"
                    class="cursor-pointer hover:text-stone-300/90 text-stone-100/25 transition duration-300"
                    xmlns="http://www.w3.org/2000/svg" width="87.413" height="267.416" viewBox="0 0 87.413 267.416">
                    <path d="M140,672,57.709,540.251,140,410.1" transform="translate(142.759 674.756) rotate(180)"
                        fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="4" />
                </svg>
            </div>

        </div>
        <div class="absolute bottom-2 flex w-full gap-4 justify-center items-center">
            <span @click="changeSlide(slide)"
                :class="{ 'bg-orange-600': (index + 1) === currentSlide, 'bg-stone-50': !((index + 1) === currentSlide) }"
                class=" flex items-center justify-center cursor-pointer w-[20px] h-[20px] rounded-full shadow-md text-orange-400"
                v-for="(slide, index) in slideCount"></span>
        </div>
    </div>
</template>
