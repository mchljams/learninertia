import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Layout from "./Shared/Layout"
import Pagination from "./Shared/Pagination"

createInertiaApp({
  resolve: async name => {
    let page = (await import(`./Pages/${name}`)).default;

    if( page.layout === undefined ) {
      page.layout = Layout
    }

    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component('Link', Link)
      .component('Head', Head)
      .component('Pagination', Pagination)
      .mount(el)
  },
});

InertiaProgress.init({
  showSpinner: true,
});