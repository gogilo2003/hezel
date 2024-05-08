<script setup>
import { Link } from '@inertiajs/vue3'
import Container from './Container.vue';

</script>
<template>
    <div class="relative w-full bg-gray-800 text-gray-400 md:mt-36">
        <div class="w-full relative md:absolute md:transform md:-translate-y-[50%]">
            <div
                class="max-w-5xl mx-auto bg-secondary-default text-stone-100 p-16 items-center justify-center flex flex-col md:flex-row">
                <div>
                    <h3 class=" text-3xl font-bold">Looking for a property/dreaam home?</h3>
                    <p class=" ">We can help with that</p>
                </div>
                <Link
                    class="md:ml-auto flex items-center justify-center py-6 px-5 bg-stone-200 text-secondary-default font-semibold hover:text-secondary/75 transition-color duration-300"
                    :href="route('properties')">
                Explore Properties
                </Link>
            </div>
        </div>
        <Container class="pt-36">
            <div class="w-full grid grid-cols-1 md:grid-cols-3 lg:grid-cols-8 gap-16">
                <div class="flex items-center justify-center col-span-3 gap-4">
                    <img class="h-20" src="/logo.svg" alt="Hezel Investments">
                    <div class="">
                        <h3 class="text-gray-100">About Us</h3>
                        <p v-text="$page.props.aboutIntro"></p>
                    </div>
                </div>
                <div>
                    <h3 class="text-gray-100">Quick Links</h3>
                    <ul>
                        <li>
                            <Link :href="route('home')">Home
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('about')">About
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('services')">Services
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('properties')">Properties
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('contact')">Contact Us
                            </Link>
                        </li>
                    </ul>
                </div>
                <div class=" col-span-2">
                    <h3 class="text-gray-100">Contact Us</h3>
                    <ul>
                        <li v-text="$page.props.contact.email"></li>
                        <li v-text="$page.props.contact.location"></li>
                        <li v-text="$page.props.contact.postal"></li>
                        <li v-text="$page.props.contact.phone"></li>
                    </ul>
                </div>
                <div class="col-span-2">
                    <h3 class="text-gray-100">Follow Us</h3>
                    <ul>
                        <li>
                            <i class="fa-brands fa-facebook-f"></i>
                            Facebook
                        </li>
                    </ul>
                </div>
            </div>
        </Container>

    </div>
    <div class="text-white text-sm bg-gradient-to-t to-gray-700 from-gray-800">
        <Container>
            <div class="grid grid-cols-1 gap-2 md:grid-cols-3">
                <div class="text-center md:text-left">&copy Hezel Investments {{ new Date().getFullYear() }}</div>
                <div class="text-center">Designed and developed by <a href="https://micartech.co.ke" target="_BLANK"
                        class="text-stone-100 hover:text-stone-200 transition duration-200">Micartech Ltd.</a>
                </div>
                <div class="space-x-4 text-center md:text-right">
                    <Link href="privacy" class="text-stone-100 hover:text-stone-200 transition duration-200">Privacy
                    Policy</Link>
                    <Link href="terms" class="text-stone-100 hover:text-stone-200 transition duration-200">Terms
                    </Link>
                </div>
            </div>
        </Container>
    </div>
</template>
