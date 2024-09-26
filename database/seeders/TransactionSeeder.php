<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //transaction dompet 1 user 1 (income)
        DB::table('transactions')->insert([
            'customer_id' => '1',
            'wallet_id' => '1',
            'transaction_type_id' => '1',
            'transaction_category_id' => '1',
            'date' => now()->format('Y-m-d H:i:s'),
            'amount' => '10000000',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s')
        ]);

        DB::table('transactions')->insert([
            'customer_id' => '1',
            'wallet_id' => '1',
            'transaction_type_id' => '1',
            'transaction_category_id' => '2',
            'date' => now()->format('Y-m-d H:i:s'),
            'amount' => '4000000',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s')
        ]);

        DB::table('transactions')->insert([
            'customer_id' => '1',
            'wallet_id' => '1',
            'transaction_type_id' => '1',
            'transaction_category_id' => '3',
            'date' => now()->format('Y-m-d H:i:s'),
            'amount' => '5000000',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s')
        ]);

        //transaction dompet 1 user 1 (outcome)
        DB::table('transactions')->insert([
            'customer_id' => '1',
            'wallet_id' => '1',
            'transaction_type_id' => '2',
            'transaction_category_id' => '7',
            'date' => now()->format('Y-m-d H:i:s'),
            'amount' => '3000000',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s')
        ]);

        DB::table('transactions')->insert([
            'customer_id' => '1',
            'wallet_id' => '1',
            'transaction_type_id' => '2',
            'transaction_category_id' => '8',
            'date' => now()->format('Y-m-d H:i:s'),
            'amount' => '9000000',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s')
        ]);

        //multi member wallet
        //transaction dompet 2 user 1 (income)
        DB::table('transactions')->insert([
            'customer_id' => '1',
            'wallet_id' => '2',
            'transaction_type_id' => '1',
            'transaction_category_id' => '4',
            'date' => now()->format('Y-m-d H:i:s'),
            'amount' => '30000000',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s')
        ]);

        DB::table('transactions')->insert([
            'customer_id' => '2',
            'wallet_id' => '2',
            'transaction_type_id' => '1',
            'transaction_category_id' => '3',
            'date' => now()->format('Y-m-d H:i:s'),
            'amount' => '12000000',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s')
        ]);

        //transaction dompet 2 user 1 (outcome)
        DB::table('transactions')->insert([
            'customer_id' => '1',
            'wallet_id' => '2',
            'transaction_type_id' => '2',
            'transaction_category_id' => '9',
            'date' => now()->format('Y-m-d H:i:s'),
            'amount' => '500000',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s')
        ]);

        //transaction dompet 2 user 2 (outcome)
        DB::table('transactions')->insert([
            'customer_id' => '2',
            'wallet_id' => '2',
            'transaction_type_id' => '2',
            'transaction_category_id' => '7',
            'date' => now()->format('Y-m-d H:i:s'),
            'amount' => '400000',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s')
        ]);

        //transaction dompet 2 user 3 (outcome)
        DB::table('transactions')->insert([
            'customer_id' => '3',
            'wallet_id' => '2',
            'transaction_type_id' => '2',
            'transaction_category_id' => '7',
            'date' => now()->format('Y-m-d H:i:s'),
            'amount' => '500000',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s')
        ]);
    }
}
