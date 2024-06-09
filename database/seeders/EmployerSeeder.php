<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employers = [
            [
                'companyName' => 'Tanzania Breweries Limited',
                'officeID' => 1,
                'supervisorName' => 'John Doe',
                'supervisorPhone' => '+255 712 345 678',
                'supervisorEmail' => 'john.doe@example.com',
                'password' => Hash::make('password'),
                'supervisorPosition' => 'HR Manager',
                'supervisorSignature' => 'https://via.placeholder.com/200x100',
                'Muhuri' => 'https://via.placeholder.com/200x100',
                'fieldworkTitle' => 'Fieldwork Title',
                'fieldworkDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'companyName' => 'National Microfinance Bank (NMB)',
                'officeID' => 2,
                'supervisorName' => 'Jane Smith',
                'supervisorPhone' => '+255 712 987 654',
                'supervisorEmail' => 'jane.smith@example.com',
                'password' => Hash::make('password'),
                'supervisorPosition' => 'Finance Manager',
                'supervisorSignature' => 'https://via.placeholder.com/200x100',
                'Muhuri' => 'https://via.placeholder.com/200x100',
                'fieldworkTitle' => 'Fieldwork Title',
                'fieldworkDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'companyName' => 'Tanzania Electric Supply Company (TANESCO)',
                'officeID' => 3,
                'supervisorName' => 'Alice Johnson',
                'supervisorPhone' => '+255 712 123 456',
                'supervisorEmail' => 'alice.johnson@example.com',
                'password' => Hash::make('password'),
                'supervisorPosition' => 'Operations Manager',
                'supervisorSignature' => 'https://via.placeholder.com/200x100',
                'Muhuri' => 'https://via.placeholder.com/200x100',
                'fieldworkTitle' => 'Fieldwork Title',
                'fieldworkDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'companyName' => 'Tanzania Ports Authority (TPA)',
                'officeID' => 4,
                'supervisorName' => 'Michael Williams',
                'supervisorPhone' => '+255 712 987 654',
                'supervisorEmail' => 'michael.williams@example.com',
                'password' => Hash::make('password'),
                'supervisorPosition' => 'Logistics Manager',
                'supervisorSignature' => 'https://via.placeholder.com/200x100',
                'Muhuri' => 'https://via.placeholder.com/200x100',
                'fieldworkTitle' => 'Fieldwork Title',
                'fieldworkDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'companyName' => 'Vodacom Tanzania',
                'officeID' => 5,
                'supervisorName' => 'David Brown',
                'supervisorPhone' => '+255 712 345 678',
                'supervisorEmail' => 'david.brown@example.com',
                'password' => Hash::make('password'),
                'supervisorPosition' => 'Sales Manager',
                'supervisorSignature' => 'https://via.placeholder.com/200x100',
                'Muhuri' => 'https://via.placeholder.com/200x100',
                'fieldworkTitle' => 'Fieldwork Title',
                'fieldworkDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('employers')->insert($employers);
    }
}
