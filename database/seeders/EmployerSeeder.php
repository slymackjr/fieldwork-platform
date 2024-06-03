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
        $companies = [
            'Tanzania Breweries Limited',
            'National Microfinance Bank (NMB)',
            'Tanzania Electric Supply Company (TANESCO)',
            'Tanzania Ports Authority (TPA)',
            'Vodacom Tanzania'
        ];

        $employers = [];
        $faker = Faker::create();

        foreach ($companies as $company) {
            $employers[] = [
                'companyName' => $company,
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
