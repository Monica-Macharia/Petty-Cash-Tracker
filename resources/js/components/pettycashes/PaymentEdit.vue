<script>

import { onMounted, reactive, ref } from "vue";
import axios from "axios";

  export default{
    setup(){
        const pettycashes = ref([])
        const items = reactive({
            'name': '',
            'payment_details': '',
            'service': '',
            'cash_payable': '',
            'status': '', 

        });

        //GET REQUEST
        const getPettycashes = () => {
            axios.get('http://127.0.0.1:8000/api/pettycashes')
            .then(response => {
                pettycashes.value = colleges.value.concat(response.data.data);
            });
        };

        //push data to form when a row is selected in the display table
        const selectedPayment = (entry) => {
            items.name = entry.name;
            items.payment_details = entry.payment_details;
            items.service = entry.service;
            items.cash_payable = entry.cash_payable;
            items.status = entry.status;
        };

        //delete a payment entry
        const deletePayment = async (id) => {
            axios.delete(`http://localhost:8000/api/pettycashes/${id}`)
            .then(response => {
                const item = pettycashes.value.findItem(entry => entry.id === id);
                if (item !== -1){
                    pettycashes.value.splice(item, 1);
                }
            })
            .catch(error => {
                console.error(error);
            });
        };

        //edit a payment using a form after a row is selected in the display table
        const editPayment = async(items) => {
            try{
                const response = await axios.put(`http://localhost:8000/api/pettycashes/${items.id}`, items);
                const updatePayment = response.data;

                const item = pettycashes.value.findItem((entry) => entry.id === updatePayment.id);
                if (item !== -1){
                    pettycashes.value.splice(item, 1, updatePayment);
                }
            }
            catch(error){
                console.error(error);
            }
        };

    //function that triggers edit logic upon button click
    const handleEdit = async() => {
        editPayment(items);
        getPettycashes();
        window.location.reload();
    }

    onMounted(getPettycashes);

    return{
        pettycashes,
        items,
        handleEdit,
        selectedPayment,
        deletePayment
    }

    }
}
</script>
<template>

    //Form for editing payment
    <form class="space-y-6" @submit.prevent="handleEdit">
        <div class="space-y-4 rounded-md shadow-sm">
          
          
          <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name" placeholder="Enter Name"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="items.name">
                </div>
            </div>

            <div>
                <label for="payment_details" class="block text-sm font-medium text-gray-700">Payment Details</label>
                <div class="mt-1">
                    <input type="number" name="payment_details" id="payment_details" placeholder="Enter Payment Details"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                          v-model="items.payment_details">
                </div>
            </div>
            <div>
                <label for="service" class="block text-sm font-medium text-gray-700">Service</label>
                <div class="mt-1">
                    <input type="text" name="service" id="service" placeholder="Enter Service"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="items.service">
                </div>
            </div>
            <div>
                <label for="cash_payable" class="block text-sm font-medium text-gray-700">Cash Payable</label>
                <div class="mt-1">
                    <input type="number" name="cash_payable" id="cash_payable" placeholder="Enter Cash Payable"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="items.cash_payable">
                </div>
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <div class="mt-1">
                    <input type="text" name="status" id="status" placeholder="Enter Status"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="items.status">
                </div>
            </div>

            <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Edit a Payment
        </button>
        </div>
    </form>


    //Payments display table that allows row selection and entry deletion
  <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
      <div class="flex place-content-end mb-4">
        
      </div>
      
      <table v-cloak class="min-w-full border divide-y divide-gray-200">
          <thead>
         
          <tr>
              <th class="px-6 py-3 bg-gray-50">
                  <span
                      class="text-xs font-large tracking-wider leading-4 text-left text-dark">Name</span>
              </th>
              <th class="px-6 py-3 bg-gray-50">
                  <span
                      class="text-xs font-large  tracking-wider leading-4 text-left text-dark">Payment Details</span>
              </th>
              <th class="px-6 py-3 bg-gray-50">
                  <span
                      class="text-xs font-large  tracking-wider leading-4 text-left text-bold text-dark ">Service</span>
              </th>
              <th class="px-6 py-3 bg-gray-50">
                  <span
                      class="text-xs font-large  tracking-wider leading-4 text-left text-dark">Cash Payable</span>
              </th>
              <th class="px-6 py-3 bg-gray-50">
                  <span
                      class="text-xs font-large  tracking-wider leading-4 text-left text-dark">Status</span>
              </th>
              <th class="px-6 py-3 bg-gray-50">
                  <span
                      class="text-xs font-large  tracking-wider leading-4 text-left text-dark">Select</span>
              </th>
              <th class="px-6 py-3 bg-gray-50">
                  <span
                      class="text-xs font-large  tracking-wider leading-4 text-left text-dark">Remove</span>
              </th>
               
          </tr>
          </thead>

          <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <template v-for="entry in pettycashes" :key="entry.id">
              <tr class="bg-white">
                  <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                  {{ entry.name }}
                  </td>
                  <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                    {{ entry.payment_details }}
                  </td>
                  <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                     {{ entry.service }}
                  </td>
                  <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                     {{ entry.cash_payable }}
                  </td>
                  <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                     {{ entry.status }}
                  </td>
                  <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                     <button @click="selectedPayment(entry)" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Select</button>
                  </td>
                  <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                     <button @click="deleteCourse(items.id)" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Delete</button>
                  </td>
                                
              </tr>
            </template>  
          </tbody>
      </table>
  </div>
</template>