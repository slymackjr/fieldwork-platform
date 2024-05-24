<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $employers = [];

        for ($i = 0; $i < 100; $i++) {
            $employers[] = [
                'companyName' => $faker->company,
                'officeID' => $faker->numberBetween(1, 50),
                'supervisorName' => $faker->name,
                'supervisorPhone' => $faker->phoneNumber,
                'supervisorEmail' => $faker->unique()->safeEmail,
                'supervisorPassword' => Hash::make('password'), // default password for all entries
                'supervisorPosition' => $faker->jobTitle,
                'supervisorSignature' => $faker->imageUrl(200, 100, 'business', true, 'Faker'),
                'Muhuri' => $faker->imageUrl(200, 100, 'business', true, 'Faker'),
                'fieldworkTitle' => $faker->sentence,
                'fieldworkDescription' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('employers')->insert($employers);
    }
}
