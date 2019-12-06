import Vue from "vue";
Vue.config.productionTip = false;

// Auto-register all Vue components in ./Shared
const files = require.context("./Shared", true, /\.vue$/i);
files.keys().map(key => {
    return Vue.component(
        key
            .split("/")
            .pop()
            .split(".")[0],
        files(key).default
    );
});
