window.axios = require("axios");
import { createApp } from "vue";

const vueSelectors = '#main-resources'
import App from './vue/PageResource.vue'

createApp(App).mount(vueSelectors);

// let App = createApp()
//     .mount(vueSelectors);

console.log(vueSelectors);