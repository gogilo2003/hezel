<script lang="ts" setup>
import { computed } from 'vue';
import Dashboard from './Dashboard.vue'
import Product from './Product.vue';
import Logout from './Logout.vue';
import Add from './Add.vue';
import Edit from './Edit.vue';
import Times from './Times.vue';
import Chart from './Chart.vue';
import Location from './Location.vue';
import Money from './Money.vue';
import Home from './Home.vue';
import Menu from './Menu.vue';
import Facebook from './Facebook.vue';
import Instagram from './Instagram.vue';
import Youtube from './Youtube.vue';
import Twitter from './Twitter.vue';
import Phone from './Phone.vue';
import Email from './Email.vue';
import Address from './Address.vue';
import Close from './Close.vue';
import Person from './Person.vue';
import ChevronCircleBack from './ChevronCircleBack.vue';
import ChevronCircleForward from './ChevronCircleForward.vue';
import ArrowLeft from './ArrowLeft.vue';
import ArrowRight from './ArrowRight.vue';
import View from './View.vue';

const props = defineProps<{
    type: string
}>()

const icon = computed(() => {
    if (props.type == 'dashboard') {
        return Dashboard
    }
    if (props.type == 'product') {
        return Product
    }
    if (props.type == 'logout') {
        return Logout
    }
    if (props.type == 'add') {
        return Add
    }
    if (props.type == 'edit') {
        return Edit
    }
    if (props.type == 'times') {
        return Times
    }
    if (props.type == 'chart') {
        return Chart
    }
    if (props.type == 'location') {
        return Location
    }
    if (props.type == 'money') {
        return Money
    }
    if (props.type == 'home') {
        return Home
    }
    if (props.type == 'menu') {
        return Menu
    }
    if (props.type == 'facebook') {
        return Facebook
    }
    if (props.type == 'instagram') {
        return Instagram
    }
    if (props.type == 'youtube') {
        return Youtube
    }
    if (props.type == 'twitter') {
        return Twitter
    }
    if (props.type == 'phone') {
        return Phone
    }
    if (props.type == 'email') {
        return Email
    }
    if (props.type == 'address') {
        return Address
    }
    if (props.type == 'close') {
        return Close
    }
    if (props.type == 'person') {
        return Person
    }
    if (props.type == 'chevron-back') {
        return ChevronCircleBack
    }
    if (props.type == 'chevron-forward') {
        return ChevronCircleForward
    }
    if (props.type == 'arrow-right') {
        return ArrowRight
    }
    if (props.type == 'arrow-left') {
        return ArrowLeft
    }
    if (props.type == 'view') {
        return View
    }
    return 'span';
})

</script>
<template>
    <component :is="icon" />
</template>
