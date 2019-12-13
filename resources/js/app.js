import "./bootstrap";
import { InertiaApp } from "@inertiajs/inertia-vue";
import Vue from "vue";
import Dropdown from "@/components/Utilities/Dropdown";
import Toasted from "vue-toasted";
//import VModal from "vue-js-modal";

Vue.use(InertiaApp);
Vue.use(Toasted);
const app = document.getElementById("app");

// Global components
Vue.component("dropdown", Dropdown);
//Vue.use(VModal);

//Global Mixins
Vue.mixin({
    methods: {
        route: (...args) => window.route(...args)
    }
});

//Global Filters
Vue.filter("capitalize", function(value) {
    if (!value) return "";
    value = value.toString();
    return value.charAt(0).toUpperCase() + value.slice(1);
});

new Vue({
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name => import(`@/Pages/${name}`).then(module => module.default)
            }
        })
}).$mount(app);
