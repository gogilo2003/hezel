<script setup lang="ts">
import Chart from 'chart.js/auto';
import { onMounted, ref } from 'vue';
import { ChartItem } from 'chart.js';

const props = defineProps({ sales: Array })

const data = ref({
    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
    datasets: [{
        label: 'Total Sales',
        data: props.sales,
        borderWidth: 1,
        tension: 0.3
    }]
})

const config = {
    type: 'line',
    data: data.value,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
}
onMounted(() => {
    const ctx = <ChartItem>document.getElementById('myChart');

    new Chart(ctx, config);
})
</script>
<template>
    <canvas id="myChart" class="w-full object-cover"></canvas>
</template>
