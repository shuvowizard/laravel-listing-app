import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/vue3'
import { ZiggyVue } from '../../vendor/tightenco/ziggy'
import AppLayout from '@/Layouts/AppLayout.vue'
import { setThemeOnLoad } from './Composables/useTheme';

createInertiaApp({
    title: title => `${title} ${import.meta.env.VITE_APP_NAME}`,
    resolve: async (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue')
        let page = await pages[`./Pages/${name}.vue`]()
        page.default.layout ??= AppLayout;
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component('Link', Link)
            .component('Head', Head)
            .mount(el)
    },
});

setThemeOnLoad();
