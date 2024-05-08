<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import WebLayout from '../Layouts/WebLayout.vue';
import Container from '../Components/Web/Container.vue';
import Heading1 from '../Components/Web/Heading1.vue';
import Heading2 from '../Components/Web/Heading2.vue';

</script>

<template>
    <WebLayout title="About Us">
        <template #header>
            <Container>
                <Heading1>About Us</Heading1>
            </Container>
        </template>
        <div class="bg-white md:py-12">
            <Container>
                <div class="grid grid-cols-1 md:grid-cols-2 items-center dark:bg-gray-600 border-primary-500">
                    <div class="h-full">
                        <img src="/images/about_us.png" alt="" class="object-cover h-full w-full">
                    </div>
                    <div class="py-6 md:px-12">
                        <Heading2>Who we are</Heading2>
                        <p v-text="$page.props.aboutIntro"></p>
                    </div>
                    <div class="py-6 md:px-12">
                        <Heading2 class="mb-4">
                            Core Values
                            <span class="block text-sm text-secondary-default">
                                At Hezel Investments, we value and prioritize:
                            </span>
                        </Heading2>
                        <ul class="list-disc list-outside ml-4 ">
                            <li>Integrity is a key to our success.</li>
                            <li>We are open and honest with our employees, customers and suppliers.</li>
                            <li>We comply with all rules, laws and regulations of all governmental and regulatory agencies.
                            </li>
                            <li>We are concerned for and committed to the communities we serve by operating in a safe and
                                environmentally responsible manner.</li>
                            <li>We take responsibility for our actions and live by our values to build and protect our
                                Company's reputation.</li>
                            <li>Our word is our bond and we stand behind our work.</li>
                            <li>All employees will adhere to our ethical code - this is non-negotiable.</li>
                        </ul>
                    </div>
                    <div class="h-full">
                        <img src="/images/core_values.png" alt="" class="object-cover h-full w-full">
                    </div>
                </div>
            </Container>

        </div>
    </WebLayout>
</template>

