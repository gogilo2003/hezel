<script setup lang="ts">
import AppLayout from '../../Layouts/AppLayout.vue';
import SalesChart from '../../Components/SalesChart.vue'

const props = defineProps({
    stats: Object
})


</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            Dashboard
        </template>

        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            <div class="shadow rounded-2xl overflow-hidden border-2 p-3">
                <div v-text="stats.properties" class="text-5xl"></div>
                Listed Properties
            </div>
            <div class="shadow rounded-2xl overflow-hidden border-2 p-3">
                <div v-text="stats.sold" class="text-5xl"></div>
                Sold Properties
            </div>
            <div class="p-3 col-span-2 md:col-span-3 shadow rounded-2xl overflow-hidden border-2">
                <SalesChart :sales="stats.sales" />
            </div>
        </div>
    </AppLayout>
</template>
