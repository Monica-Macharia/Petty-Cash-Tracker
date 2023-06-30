import { createRouter, createWebHistory } from "vue-router";
import PaymentIndex from "../components/pettycashes/PaymentIndex";
import PaymentEdit from "../components/pettycashes/PaymentEdit";
const routes = [
    {
        path: '/dashboard',
        name: 'pettycashes.index',
        component: PaymentIndex
    },
    {
        path: '/dashboard/customize',
        name: 'pettycashes.edit',
        component: PaymentEdit
    }
    
];

export default createRouter({
    history: createWebHistory(),
    routes
});

