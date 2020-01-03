import "./bootstrap";
import { InertiaApp } from "@inertiajs/inertia-vue";
import Vue from "vue";
import Dropdown from "@/components/Utilities/Dropdown";
import Toasted from "vue-toasted";
import VModal from "vue-js-modal";
import money from "v-money";
import moment from "moment";

Vue.use(InertiaApp);
Vue.use(Toasted);
Vue.use(money, { precision: 2 });
Vue.use(moment);

const app = document.getElementById("app");

// Global components
Vue.component("dropdown", Dropdown);
Vue.use(VModal);

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

// Convert Integer to Money eg. 10050 = $100.50 (With Dollar sign)
Vue.filter("currency", function(amount) {
    const formatter = new Intl.NumberFormat("en-US", {
        style: "currency",
        currency: "USD",
        minimumFractionDigits: 2
    });

    const newAmount = amount / 100;

    return formatter.format(newAmount);
});

Vue.filter("money", function(amount) {
    const formatter = new Intl.NumberFormat("en-US", {
        style: "decimal",
        currency: "USD",
        minimumFractionDigits: 2
    });

    const newAmount = amount / 100;

    return formatter.format(newAmount);
});

// Truncates by words and not by characters
Vue.filter("truncate", function(str, maxWords) {
    const array = str.trim().split(" ");
    const ellipsis = array.length > maxWords ? "..." : "";

    return array.slice(0, maxWords).join(" ") + ellipsis;
});

// Format Dates
Vue.filter("formatDate", function(strDate) {
    return moment(strDate).format("MMM DD, YYYY");
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
