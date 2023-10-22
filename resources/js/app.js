import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { createVuetify } from 'vuetify';
import '@mdi/font/css/materialdesignicons.min.css';  // Material Design Icons
import 'vuetify/styles';  // Import Vuetify styles


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const appInstance = createApp({ render: () => h(App, props) });

        appInstance.use(plugin);
        appInstance.use(ZiggyVue, Ziggy);

        // Setup Vuetify
        const vuetify = createVuetify();

        appInstance.use(vuetify);

        appInstance.mount(el);

        // This allows you to use `this.$vuetify` inside your Vue components
        return { vuetify };
    },
    progress: {
        color: '#4B5563',
    },
});
