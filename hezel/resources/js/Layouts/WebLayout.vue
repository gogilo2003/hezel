<script setup>
import { Head } from '@inertiajs/vue3';
import Navbar from '../Components/Web/Navbar.vue';
import Footer from '../Components/Web/Footer.vue';

defineProps({
    title: String,
});


</script>

<template>
    <Head :title="title" />
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 dark:text-gray-50 mb-20">
        <Navbar />

        <!-- Page Heading -->
        <template v-if="$slots.header" class="bg-white dark:bg-gray-800 shadow">
            <slot name="header" />
        </template>

        <!-- Page Content -->
        <main>
            <slot />
        </main>
    </div>
    <Footer />
</template>
