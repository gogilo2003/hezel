<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import WebLayout from '../Layouts/WebLayout.vue';
import Container from '../Components/Web/Container.vue';
import Heading1 from '../Components/Web/Heading1.vue';
import Heading2 from '../Components/Web/Heading2.vue';
import Icon from '../Components/Icons/Icon.vue';
import InputError from '../Components/InputError.vue';

defineProps({
    contact: Object
})

const form = useForm({
    email: null,
    name: null,
    message: null
});

const submit = () => {
    form.post(route('post-contact'), {
        onFinish: () => form.reset(),
    });
};

</script>

<template>
    <WebLayout title="Contacts Us">
        <template #header>
            <Container>
                <Heading1>Contacts Us</Heading1>
            </Container>
        </template>
        <div class="bg-white md:py-12">
            <Container>
                <div class=" grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                    <div
                        class="md:space-y-4 bg-[url(/images/contact.jpg)] bg-center bg-cover bg-no-repeat backdrop-blur-md py-12 px-0 rounded-xl">
                        <div
                            class="py-8 px-8 md:px-16 backdrop-blur-md border border-white/25 bg-primary-default bg-opacity-70">
                            <Heading2>Our Contacts</Heading2>
                            <div class="space-y-12 my-12 text-white">
                                <div class="flex flex-col md:flex-row gap-2 items-start text-center md:text-left">
                                    <span
                                        class="flex items-center justify-center h-12 w-12 p-2 md:h-8 md:w-8 rounded-full md:p-1 border border-secondary-default">
                                        <Icon type="phone" class="text-secondary-600 h-full w-full object-contain" />
                                    </span>
                                    <span v-text="contact.phone"></span>
                                </div>
                                <div class="flex flex-col md:flex-row gap-2 items-start text-center md:text-left">
                                    <span
                                        class="flex items-center justify-center h-12 w-12 p-2 md:h-8 md:w-8 rounded-full md:p-1 border border-secondary-default">
                                        <Icon type="email" class="text-secondary-600 h-full w-full object-contain" />
                                    </span>
                                    <span v-text="contact.email"></span>
                                </div>
                                <div class="flex flex-col md:flex-row gap-2 items-start text-center md:text-left">
                                    <span
                                        class="flex items-center justify-center h-12 w-12 p-2 md:h-8 md:w-8 rounded-full md:p-1 border border-secondary-default">
                                        <Icon type="address" class="text-secondary-600 h-full w-full object-contain" />
                                    </span>
                                    <span v-text="contact.postal"></span>
                                </div>
                                <div class="flex flex-col md:flex-row gap-2 items-start text-center md:text-left">
                                    <span
                                        class="flex items-center justify-center h-12 w-12 p-2 md:h-8 md:w-8 rounded-full md:p-1 border border-secondary-default">
                                        <Icon type="location" class="text-secondary-600 h-full object-contain" />
                                    </span>
                                    <span v-text="contact.location"></span>
                                </div>
                            </div>
                            <div
                                class="block before:block before:mx-auto before:md:mx-0 before:w-[60%] before:max-w-[6rem] before:h-[1px] before:rounded-full before:bg-white after:block after:mx-auto after:md:mx-0 after:w-[60%] after:max-w-[6rem] after:h-[1px] after:rounded-full after:bg-white mt-8">
                                <div class="flex gap-2 py-5 items-center justify-center md:justify-start">
                                    <Icon class="h-10 cursor-pointer" type="facebook" />
                                    <Icon class="h-10 cursor-pointer" type="twitter" />
                                    <Icon class="h-10 cursor-pointer" type="youtube" />
                                    <Icon class="h-10 cursor-pointer" type="instagram" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div>
                        <Heading2>You can drop us a message</Heading2>
                        <form @submit.prevent="submit">
                            <div class="relative z-0 mb-6">
                                <input type="text" id="nameInput"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-secondary-500 focus:outline-none focus:ring-0 focus:border-secondary-600 peer"
                                    placeholder=" " v-model="form.name" />
                                <label for="nameInput"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-secondary-600 peer-focus:dark:text-secondary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                                <InputError :message="form.errors.name" />
                            </div>
                            <div class="relative z-0 mb-6">
                                <input type="text" id="emailInput"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-secondary-500 focus:outline-none focus:ring-0 focus:border-secondary-600 peer"
                                    placeholder=" " v-model="form.email" />
                                <label for="emailInput"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-secondary-600 peer-focus:dark:text-secondary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                                <InputError :message="form.errors.email" />
                            </div>
                            <div class="relative z-0 mb-6">
                                <textarea id="messageInput" rows="5"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-secondary-500 focus:outline-none focus:ring-0 focus:border-secondary-600 peer"
                                    placeholder=" " v-model="form.message"></textarea>
                                <label for="messageInput"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-secondary-600 peer-focus:dark:text-secondary-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Message</label>
                                <InputError :message="form.errors.message" />
                            </div>
                            <div>
                                <button type="submit"
                                    class="text-white bg-gradient-to-br from-primary-400 to-secondary-600 hover:bg-gradient-to-bl transition duration-200 focus:ring-4 focus:outline-none focus:ring-secondary-200 dark:focus:ring-secondary-800 font-medium rounded-full text-sm px-6 py-3 text-center mr-2 mb-2 flex gap-2 uppercase"
                                    :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    <Icon class="h-5" type="send" /><span>Send</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </Container>
        </div>
    </WebLayout>
</template>

