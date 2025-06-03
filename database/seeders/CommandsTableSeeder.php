<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CommandsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('commands')->insert([
            [
                'number' => 'CMD-001',
                'user_id' => 1,
                'type' => 'only',
                'for_user' => 'student',
                'date' => Carbon::create(2024, 5, 20),
                'description' => 'Приказ о переводе студента на следующий курс.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => 'CMD-002',
                'user_id' => 1,
                'type' => 'more',
                'for_user' => 'employee',
                'date' => Carbon::create(2024, 6, 1),
                'description' => 'Приказ о назначении преподавателя на кафедру.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'number' => 'CMD-003',
                'user_id' => 1,
                'type' => 'only',
                'for_user' => 'student',
                'date' => Carbon::create(2024, 6, 2),
                'description' => 'Приказ об отчислении студента за неуспеваемость.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
