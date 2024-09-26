<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //single member wallet
        DB::table('wallets')->insert([
            'name' => 'Dompet 1',
            'created_at' => now()->subSeconds(4),
            'updated_at' => now()->subSeconds(4)
        ]);

        //multi member wallet
        DB::table('wallets')->insert([
            'name' => 'Dompet 2',
            'created_at' => now()->subSeconds(3),
            'updated_at' => now()->subSeconds(3)
        ]);

        DB::table('wallets')->insert([
            'name' => 'Dompet 3',
            'created_at' => now()->subSeconds(2),
            'updated_at' => now()->subSeconds(2)
        ]);



    }
}
