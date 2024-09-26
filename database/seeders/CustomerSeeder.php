<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //dummy seed
        DB::table('customers')->insert([
            'username' => 'Liecardo Antonio',
            'email' => 'lie@gmail.com',
            'password' => Hash::make('wasd1234'),
            'created_at' => now()->subSeconds(4),
            'updated_at' => now()->subSeconds(4)
        ]);

        DB::table('customers')->insert([
            'username' => 'Ilham Hadi',
            'email' => 'ilham@gmail.com',
            'password' => Hash::make('wasd1234'),
            'created_at' => now()->subSeconds(3),
            'updated_at' => now()->subSeconds(3)
        ]);

        DB::table('customers')->insert([
            'username' => 'Elvano Jethro',
            'email' => 'elvano@gmail.com',
            'password' => Hash::make('wasd1234'),
            'created_at' => now()->subSeconds(2),
            'updated_at' => now()->subSeconds(2)
        ]);

        DB::table('customers')->insert([
            'username' => 'Diraja Qusayyi',
            'email' => 'diraja@gmail.com',
            'password' => Hash::make('wasd1234'),
            'created_at' => now()->subSeconds(1),
            'updated_at' => now()->subSeconds(1)
        ]);

        DB::table('customers')->insert([
            'username' => 'Hans Rhesa',
            'email' => 'hans@gmail.com',
            'password' => Hash::make('wasd1234'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
