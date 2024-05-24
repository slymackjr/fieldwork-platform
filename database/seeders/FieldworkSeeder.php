<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FieldworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $fieldworks = [];

        for ($i = 0; $i < 50; $i++) {
            $fieldworks[] = [
                'employerID' => $faker->numberBetween(1, 10),
                'studentID' => $faker->numberBetween(1, 50),
                'status' => $faker->randomElement(['pending', 'in-progress', 'completed']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('fieldworks')->insert($fieldworks);
    }
}
