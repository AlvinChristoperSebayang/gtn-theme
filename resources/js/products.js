window.axios = require("axios");
// window.axios.defaults.headers.common["X-WP-Nonce"] = settings.nonce;
import {
    createApp
} from "vue";
import mixins from "./mixins";
import api from "./api";
// import SvgVue from "svg-vue3";
import {
    UtilitiesHelpers
} from "./utils/Utilities";
import LazyLoadDirective from "./directives/LazyLoadDirective";
import ClickOutside from "./directives/ClickOutside";
import PageProduct from "./vueresources/pageProduct.vue";
let shopPage = document.getElementById('shop_page');
shopPage = createApp({
        beforeCreate() {
            UtilitiesHelpers.vueFixWpPlugins(document.querySelector('#shop_page'));
            UtilitiesHelpers.forceExternalLinks();
        },
    })
    .directive("lazyload", LazyLoadDirective)
    .directive("click-outside", ClickOutside);
shopPage.config.globalProperties.$images = settings.images;
shopPage.config.globalProperties.$settings = settings;
shopPage.config.globalProperties.$api = api;
shopPage.config.globalProperties.$nonce = settings.nonce;
shopPage.mixin(mixins);
shopPage.component("shop-page", PageProduct);
shopPage.mount('#shop_page');