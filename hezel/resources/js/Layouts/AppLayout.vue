<script setup>
import { Head } from '@inertiajs/vue3';
import Banner from '@/Components/Banner.vue';
import Navbar from './Navbar.vue';
import { ref, watch, onMounted } from 'vue';
import Sidebar from './Sidebar.vue';

defineProps({
    title: String,
});

const toggled = ref(parseInt(localStorage.getItem('toggleMenu')))

watch(() => toggled.value, () => {
    localStorage.setItem('toggleMenu', toggled.value ? 1 : 0)
})

onMounted(() => {
    toggled.value = parseInt(localStorage.getItem('toggleMenu'))
})

</script>

<template>
    <div>

        <Head :title="title" />

        <Banner />

        <div class="fixed flex flex-col h-screen top-0 left-0 bg-gray-50 dark:bg-gray-950 transition-all duration-500"
            :class="{ 'w-64': !toggled, 'w-0': toggled }">

            <div class="flex-none p-3 border-b mb-3">
                <img src="/logo-horizontal.png" class="w-full" />
            </div>
            <div class="flex flex-col justify-between flex-1">
                <Sidebar />
            </div>

        </div>
        <div :class="{ 'left-64 w-[calc(100vw_-_16rem)]': !toggled, 'left-0 w-screen': toggled }"
            class="absolute top-0 min-h-screen flex flex-col bg-gray-100 dark:bg-gray-900 transition-all duration-500">
            <Navbar class="flex-none" @toggle="toggled = !toggled">
                <!-- Page Heading -->
                <template #header v-if="$slots.header">
                    <slot name="header" />
                </template>
            </Navbar>
            <!-- Page Content -->
            <main class="flex-1 py-12 px-3 md:px-8 overflow-x-hidden">
                <slot />
            </main>
        </div>
    </div>
</template>
