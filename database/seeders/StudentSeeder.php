<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $students = [];

        for ($i = 0; $i < 100; $i++) {
            $students[] = [
                'studentName' => $faker->name,
                'registrationID' => $faker->unique()->uuid,
                'studentEmail' => $faker->unique()->safeEmail,
                'studentPhone' => $faker->phoneNumber,
                'password' => Hash::make('password'), // default password for all entries
                'course' => $faker->word,
                'studyYear' => $faker->numberBetween(1, 4),
                'currentGPA' => $faker->randomFloat(2, 0, 4),
                'introductionLetter' => $faker->imageUrl(200, 100, 'business', true, 'Faker'),
                'resultSlip' => $faker->imageUrl(200, 100, 'business', true, 'Faker'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('students')->insert($students);
    }
}
