require('./bootstrap');


require('alpinejs');

import { createApp } from "vue";
import router from './router'
import PaymentIndex from "./components/pettycashes/PaymentIndex.vue";
import PaymentEdit from "./components/pettycashes/PaymentEdit.vue";

createApp({
    components: {
        PaymentIndex,
        PaymentEdit,
        
    }
}).use(router).mount('#app')