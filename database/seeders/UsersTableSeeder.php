<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Alice Example',
                'email' => 'alice@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Bob Example',
                'email' => 'bob@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ],
        ]);
    }
}
