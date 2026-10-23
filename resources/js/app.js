import { createApp, h } from 'vue'
import "../css/app.css"
import { createInertiaApp } from '@inertiajs/vue3'
import "@/utils/flash.js"

// The auth and laratail Blade layouts load this bundle for its CSS but render no Inertia page.
// The initial page is either a data-page attribute or, with INERTIA_USE_SCRIPT_ELEMENT_FOR_INITIAL_PAGE, a script tag.
const hasInertiaPage = document.getElementById('app')?.dataset.page
    || document.querySelector('script[data-page="app"][type="application/json"]')

if (hasInertiaPage) {
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
}
