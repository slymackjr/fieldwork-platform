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

        // Assuming we have 5 students and 5 employers as per the updated seeders
        for ($i = 0; $i < 5; $i++) {
            $fieldworks[] = [
                'employerID' => $faker->numberBetween(1, 5), // IDs 1 to 5 for employers
                'studentID' => $faker->numberBetween(1, 5), // IDs 1 to 5 for students
                'status' => $faker->randomElement(['pending', 'in-progress', 'completed']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('fieldworks')->insert($fieldworks);
    }
}
