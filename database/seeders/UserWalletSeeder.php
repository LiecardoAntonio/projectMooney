<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserWalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Dompet 1, user 1 admin
        DB::table('user_wallets')->insert([
            'customer_id' => '1',
            'wallet_id' => '1',
            'role_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //multi member wallet
        //Dompet 2, user 1 admin
        DB::table('user_wallets')->insert([
            'customer_id' => '1',
            'wallet_id' => '2',
            'role_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Dompet 2, user 2 edit
        DB::table('user_wallets')->insert([
            'customer_id' => '2',
            'wallet_id' => '2',
            'role_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Dompet 2, user 3 edit
        DB::table('user_wallets')->insert([
            'customer_id' => '3',
            'wallet_id' => '2',
            'role_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Dompet 2, user 4 edit
        DB::table('user_wallets')->insert([
            'customer_id' => '4',
            'wallet_id' => '2',
            'role_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Dompet 2, user 5 edit
        DB::table('user_wallets')->insert([
            'customer_id' => '5',
            'wallet_id' => '2',
            'role_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //dompet 3, user 3 admin
        DB::table('user_wallets')->insert([
            'customer_id' => '3',
            'wallet_id' => '3',
            'role_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //dompet 3, user 4 edit
        DB::table('user_wallets')->insert([
            'customer_id' => '4',
            'wallet_id' => '3',
            'role_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
