<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder{
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Ricardo Juarez Gonzalez',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'Ricardo Juarez Flores',
            'email' => 'ricardo@example.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}