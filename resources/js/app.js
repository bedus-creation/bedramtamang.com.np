import { createApp, h } from 'vue'
import "../css/app.css"
import { createInertiaApp } from '@inertiajs/vue3'
import "@/utils/flash.js"

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el)
    },
})
