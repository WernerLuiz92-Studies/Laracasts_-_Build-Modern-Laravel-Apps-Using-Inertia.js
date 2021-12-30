import { createApp, h } from "vue";
import { createInertiaApp, Link, Head } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import axios from "axios";
import VueAxios from "vue-axios";
import Layout from "./Layouts/AppLayout";

createInertiaApp({
    resolve: async (name) => {
        let page = (await import(`./Pages/${name}`)).default;

        page.layout ??= Layout;

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("InertiaLink", Link)
            .component("InertiaHead", Head)
            .use(VueAxios, axios)
            .mixin({ methods: { route: window.route } })
            .mount(el);
    },
    title: (title) =>
        title ? `${title} | Lumiun Tecnologia` : "Lumiun Tecnologia",
});

InertiaProgress.init({
    showSpinner: true,
});
