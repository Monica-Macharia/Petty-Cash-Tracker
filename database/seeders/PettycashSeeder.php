<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PettycashSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pettycashes = [
            [
             'name' => 'Dominic Mwanza',
             'payment_details' => '0078009900',
             'service' => 'Products transportation',
             'cash_payable' => 600,
             'status' => 'Not Paid',
            ],
            [
                'name' => 'Angela Mwanza',
                'payment_details' => '0078009901',
                'service' => 'Packaging materials',
                'cash_payable' => 6000,
                'status' => 'Not Paid',
            ],
            [
                'name' => 'Alize Mwanzako',
                'payment_details' => '0078909900',
                'service' => 'Products packaging',
                'cash_payable' => 800,
                'status' => 'Not Paid',
            ],
            [
                'name' => 'Elisha Mwata',
                'payment_details' => '0978089900',
                'service' => 'Book purchase',
                'cash_payable' => 600,
                'status' => 'Paid',
               ]
         ];
        
        
         DB::table('pettycashes')->insert($pettycashes);
    }
}
