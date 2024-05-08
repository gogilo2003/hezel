<script setup lang="ts">
import { onMounted, ref } from 'vue'
import { Link } from '@inertiajs/vue3';
import WebLayout from '../Layouts/WebLayout.vue';
import Container from '../Components/Web/Container.vue';
import PropertyItem from '../Components/Web/PropertyItem.vue';
import Heading1 from '../Components/Web/Heading2.vue';

const props = defineProps(['category', 'properties', 'categories'])

const title = ref('')

onMounted(() => {
    if (props.category?.data) {
        title.value = `${props.category?.data.name}`
    } else {
        title.value = 'Property Listing'
    }
})

const active = "bg-secondary-400 text-white"
const normal = "bg-white text-stone-800"

const classState = (cat: any) => {
    if (cat?.id === props.category?.data.id) {
        return active
    }
    else {
        return normal
    }
}
</script>

<template>
    <WebLayout :title="title">
        <template #header>
            <Container>
                <Heading1 class="uppercase text-2xl font-light" v-text="title"></Heading1>
            </Container>
        </template>
        <div class="bg-white">
            <Container>
                <div
                    class="flex gap-2 items-start md:items-center flex-col justify-center md:justify-start md:flex-row border-b mb-4 pb-4">
                    <span class=" self-center">Categories:</span>
                    <div class="flex gap-1 flex-wrap justify-center">
                        <Link class="py-1 px-3 border border-secondary-400" :class="classState(cat)"
                            v-for="cat in categories" :href="route('properties', cat.slug)" v-text="cat.name">
                        </Link>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 my-4 gap-8">
                    <PropertyItem :property="item" v-for="item in properties.data" />
                </div>
                <div class="flex items-center justify-center mt-12">
                    <Link v-for="href in properties.meta.links" :href="href.url" :as="href.url ? 'a' : 'span'"
                        :disabled="!href.url ? true : false" v-html="href.label"
                        class="p-2 h-8 min-w-[2rem] flex items-center justify-center"
                        :class="{ 'text-primary': href.url && !href.active ? true : false, 'text-gray-400': !href.url && !href.active ? true : false, 'text-secondary-default font-semibold': href.active }">
                    </Link>
                </div>
            </Container>
        </div>
    </WebLayout>
</template>

