<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //income (1-5)
        DB::table('transaction_categories')->insert([
            'name' => 'Salary and Wages',
        ]);

        DB::table('transaction_categories')->insert([
            'name' => 'Freelance',
        ]);

        DB::table('transaction_categories')->insert([
            'name' => 'Investment Returns',
        ]);

        DB::table('transaction_categories')->insert([
            'name' => 'Gifts',
        ]);

        DB::table('transaction_categories')->insert([
            'name' => 'Property Income',
        ]);


        //outcome 6-10
        DB::table('transaction_categories')->insert([
            'name' => 'Rent/Mortgage',
        ]);
        DB::table('transaction_categories')->insert([
            'name' => 'Utilities',
        ]);
        DB::table('transaction_categories')->insert([
            'name' => 'Groceries',
        ]);
        DB::table('transaction_categories')->insert([
            'name' => 'Transportation',
        ]);
        DB::table('transaction_categories')->insert([
            'name' => 'Education',
        ]);
    }
}
