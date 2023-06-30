require('./bootstrap');


require('alpinejs');

import { createApp } from "vue";
import router from './router'
import PaymentIndex from "./components/pettycashes/PaymentIndex";
import PaymentEdit from "./components/pettycashes/PaymentEdit";
createApp({
    components: {
        PaymentIndex,
        PaymentEdit,
        
    }
}).use(router).mount('#app')