<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employers')->insert([
            'name' => 'Johnny Wizer',
            'email' => 'wizer@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
