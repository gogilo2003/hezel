<script setup lang="ts">
import { ref } from 'vue'
import NLink from './NLink.vue'
import { Link } from '@inertiajs/vue3'
import Icon from '../Icons/Icon.vue'

const navbar = ref(null)
const show = ref(false)

const links = [
    {
        name: "home",
        caption: "Home"
    },
    {
        name: "about",
        caption: "About Us"
    },
    {
        name: "services",
        caption: "Services"
    },
    {
        name: "properties",
        caption: "Properties"
    },
    {
        name: "contact",
        caption: "Contact Us"
    },
]

const contactClasses = 'md:text-primary-600 md:hover:text-stone-50 md:bg-secondary-default text-white hover:text-primary-default transition-colors duration-200 px-4 md:px-8 md:py-8 md:ml-8'

</script>
<template>
    <div class="z-20 sticky top-0 dark:bg-gray-900/80 dark:text-stone-50 shadow-xl backdrop-blur-sm bg-stone-50/75">
        <div class="max-w-7xl mx-auto py-0 px-4 sm:px-6 lg:px-8 flex items-center relative">
            <div class="h-20 py-4 block">
                <Link :href="route('home')">
                <img src="/logo.svg" alt="Hezel Logo" class="h-full"></Link>
            </div>
            <!-- Small screens -->
            <nav ref="navbar" :class="{ 'block': show, 'hidden': !show }"
                class="absolute z-20 left-0 w-[80%] bg-primary-500/95 top-[100%] sm:hidden py-8 h-screen text-lg">
                <NLink class="block w-full" v-for="link in links" :href="route(link.name)"
                    :active="route().current(link.name)" v-text="link.caption"></NLink>
            </nav>
            <!-- Medium and Large screens -->
            <nav class="hidden md:flex ml-auto items-center text-primary-600 uppercase transition-all">
                <NLink v-for="link in links" :class="link.name === 'contact' ? contactClasses : ''" :href="route(link.name)"
                    :active="route().current(link.name)" v-text="link.caption"></NLink>
            </nav>
            <span class="text-5xl md:hidden ml-auto cursor-pointer">
                <Icon class="text-primary-default h-8" @click="show = !show" type="close" v-if="show" />
                <Icon class="text-primary-default w-8" @click="show = !show" type="menu" v-else />
            </span>
        </div>
    </div>
</template>

<!--
    flex flex-col items-start

    items-center hidden md:flex ml-auto
 -->
