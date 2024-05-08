<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import WebLayout from '../Layouts/WebLayout.vue';
import Container from '../Components/Web/Container.vue';
import Heading1 from '../Components/Web/Heading1.vue';
import Heading2 from '../Components/Web/Heading2.vue';

</script>

<template>
    <WebLayout title="Services">
        <template #header>
            <Container>
                <Heading1>Services</Heading1>
            </Container>
        </template>
        <div class="bg-white md:py-12">
            <Container>
                <div class="grid grid-cols-1 md:grid-cols-2 items-center">
                    <div class="h-full illustration-image">
                        <img src="/images/services.jpg" alt="" class="">
                    </div>
                    <div class="md:px-16">
                        <Heading2>Our service are</Heading2>
                        <ul class="list-disc list-outside ml-4 ">
                            <li>Real estate consultancy</li>
                            <li>Property management</li>
                            <li>Marketing, selling and letting beach plots</li>
                        </ul>
                    </div>
                </div>
            </Container>
        </div>
    </WebLayout>
</template>

