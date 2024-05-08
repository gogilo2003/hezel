<script setup lang="ts">
import { ref } from "vue"
import WebLayout from '../Layouts/WebLayout.vue';
import Container from '../Components/Web/Container.vue';
import Heading1 from '../Components/Web/Heading1.vue';
import Heading from '../Components/Web/Heading.vue';
import { Link } from '@inertiajs/vue3';
import MiniProperty from '../Components/Web/MiniProperty.vue';
import Icon from '../Components/Icons/Icon.vue';

defineProps({ property: Object, categories: Object, properties: Object })

const imagePreview = ref(null)

</script>
<template>
    <WebLayout :title="property.data.title">
        <template #header>
            <Container>
                <Heading1 class="uppercase text-2xl font-light" v-text="property.data.title"></Heading1>
            </Container>
        </template>
        <div class="bg-white">
            <Container>
                <div class="w-full grid grid-cols-1 md:grid-cols-[auto_20rem] gap-8">
                    <div class="space-y-8">
                        <div class="max-w-[54rem]">
                            <div class="relative max-h-[32rem] overflow-hidden rounded-xl">
                                <img ref="imagePreview" :src="property.data.picture.url" alt=""
                                    class="h-full w-full object-cover object-center" />
                            </div>
                            <div class="">
                                <div class="rounded-xl my-3 w-full overflow-x-auto">
                                    <div class="flex justify-center gap-3">
                                        <img @click="imagePreview.src = image.url" v-for="image in property.data.pictures"
                                            :src="image.thumb" alt="" class="max-w-[8rem] rounded-lg cursor-pointer">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <ul class="flex gap-2 text-xs">
                            <li class="text-secondary-600">Categories:</li>
                            <li v-for="  cat   in categories.data" class="">
                                <Link :href="route('properties', cat.slug)" v-text="cat.name"
                                    class="block py-1 px-3 rounded-full bg-primary-500 text-gray-50">
                                </Link>
                            </li>
                        </ul>
                        <div class="text-md grid grid-cols-1 md:grid-cols-2 items-center justify-start gap-8">
                            <div class="flex items-center gap-1">
                                <Icon
                                    class="w-8 h-8 p-1 rounded-full border border-secondary-default text-secondary-default"
                                    type="money" />
                                <div v-text="`${new Intl.NumberFormat('en-KE', { style: 'currency', currency: 'KES' }).format(parseFloat(property.data.price))}`"
                                    class="text-secondary-default font-light">
                                </div>
                            </div>
                            <div class="flex items-center gap-1">
                                <Icon
                                    class="w-8 h-8 p-1 rounded-full border border-secondary-default text-secondary-default"
                                    type="location" />
                                <div v-text="property.data.location" class="text-secondary-default font-light">
                                </div>
                            </div>
                        </div>
                        <div>
                            <Heading level="h4">Product description</Heading>
                            <div v-html="property.data.description" class=" prose max-w-full min-w-full"></div>
                        </div>
                    </div>
                    <div>
                        <Heading level="h3">Similar Properties</Heading>
                        <!-- <pre v-text="properties.data[0]"></pre> -->
                        <div class="flex flex-col gap-3">
                            <MiniProperty :property="prop" v-for="prop in properties.data" />
                        </div>
                    </div>
                </div>
                <!-- <pre v-text="$page.props"></pre> -->
            </Container>
        </div>
    </WebLayout>
</template>
