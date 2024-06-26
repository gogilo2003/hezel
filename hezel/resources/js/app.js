import './bootstrap';
import '../css/app.css';
import '@fortawesome/fontawesome-free';
import 'primeicons/primeicons.css';


// theme
import 'primevue/resources/themes/lara-light-green/theme.css';
import PrimeVue from 'primevue/config';
import ToastService from 'primevue/toastservice';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import VueClickAway from "vue3-click-away";

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(PrimeVue)
            .use(ToastService)
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(VueClickAway)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
