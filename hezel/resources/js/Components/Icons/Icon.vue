<script setup>
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

defineProps(['type'])
</script>
<template>
    <Dashboard v-bind="$attrs" v-if="type == 'dashboard'" />
    <Product v-bind="$attrs" v-if="type == 'product'" />
    <Logout v-bind="$attrs" v-if="type == 'logout'" />
    <Add v-bind="$attrs" v-if="type == 'add'" />
    <Edit v-bind="$attrs" v-if="type == 'edit'" />
    <Times v-bind="$attrs" v-if="type == 'times'" />
    <Chart v-bind="$attrs" v-if="type == 'chart'" />
    <Location v-bind="$attrs" v-if="type == 'location'" />
    <Money v-bind="$attrs" v-if="type == 'money'" />
    <Home v-bind="$attrs" v-if="type == 'home'" />
    <Menu v-bind="$attrs" v-if="type == 'menu'" />
    <Facebook v-bind="$attrs" v-if="type == 'facebook'" />
    <Instagram v-bind="$attrs" v-if="type == 'instagram'" />
    <Youtube v-bind="$attrs" v-if="type == 'youtube'" />
    <Twitter v-bind="$attrs" v-if="type == 'twitter'" />
    <Phone v-bind="$attrs" v-if="type == 'phone'" />
    <Email v-bind="$attrs" v-if="type == 'email'" />
    <Address v-bind="$attrs" v-if="type == 'address'" />
    <Close v-bind="$attrs" v-if="type == 'close'" />
    <Person v-bind="$attrs" v-if="type == 'person'" />
</template>
