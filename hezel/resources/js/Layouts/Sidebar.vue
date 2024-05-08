<script setup lang="ts">
import { router } from '@inertiajs/vue3';
import SidebarLink from '../Components/SidebarLink.vue';
import { ref } from 'vue'

const logout = () => {
    router.post(route('logout'));
};

const links = ref([
    {
        name: 'dashboard',
        text: 'Dashboard',
        icon: 'dashboard',
    },
    {
        name: 'dashboard-properties',
        text: 'Properties',
        icon: 'home',
    },
])
</script>
<template>
    <div class="p-3">
        <SidebarLink v-for="link in links" :active="route().current(link.name)" :href="route(link.name)" :icon="link.icon">
            {{ link.text }}
        </SidebarLink>
    </div>
    <div class="px-3 py-4 border-t border-gray-200 dark:border-gray-600">
        <SidebarLink :href="route('profile.show')" icon="person" :active="route().current('profile.show')">
            <template v-if="$page.props.jetstream.managesProfilePhotos" #icon>
                <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url"
                    :alt="$page.props.auth.user.name">
            </template>
            Profile
        </SidebarLink>
        <form @submit.prevent="logout">
            <SidebarLink as="button" icon="logout">
                Log Out
            </SidebarLink>
        </form>
    </div>
</template>
