<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
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
                'location' => 'Mwanza',
                'officeID' => 1,
                'supervisorName' => 'John Doe',
                'supervisorPhone' => '+255 712 345 678',
                'supervisorEmail' => 'john.doe@example.com',
                'password' => Hash::make('password'),
                'supervisorPosition' => 'HR Manager',
                'supervisorSignature' => '',
                'Muhuri' => '',
                'companyLogo' => '',
                'fieldworkTitle' => 'Fieldwork Title',
                'fieldworkDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'applicationDeadline' => '2024-06-30',
                'TIN' => '123456789', // Add TIN
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'companyName' => 'National Microfinance Bank (NMB)',
                'location' => 'Dar-es-Salaam',
                'officeID' => 2,
                'supervisorName' => 'Jane Smith',
                'supervisorPhone' => '+255 712 987 654',
                'supervisorEmail' => 'jane.smith@example.com',
                'password' => Hash::make('password'),
                'supervisorPosition' => 'Finance Manager',
                'supervisorSignature' => '',
                'Muhuri' => '',
                'companyLogo' => '',
                'fieldworkTitle' => 'Fieldwork Title',
                'fieldworkDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'applicationDeadline' => '2024-07-01',
                'TIN' => '987654321', // Add TIN
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'companyName' => 'Tanzania Electric Supply Company (TANESCO)',
                'location' => 'Pwani',
                'officeID' => 3,
                'supervisorName' => 'Alice Johnson',
                'supervisorPhone' => '+255 712 123 456',
                'supervisorEmail' => 'alice.johnson@example.com',
                'password' => Hash::make('password'),
                'supervisorPosition' => 'Operations Manager',
                'supervisorSignature' => '',
                'Muhuri' => '',
                'companyLogo' => '',
                'fieldworkTitle' => 'Fieldwork Title',
                'fieldworkDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'applicationDeadline' => '2024-07-02',
                'TIN' => '123123123', // Add TIN
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'companyName' => 'Tanzania Ports Authority (TPA)',
                'location' => 'Dar-es-Salaam',
                'officeID' => 4,
                'supervisorName' => 'Michael Williams',
                'supervisorPhone' => '+255 712 987 654',
                'supervisorEmail' => 'michael.williams@example.com',
                'password' => Hash::make('password'),
                'supervisorPosition' => 'Logistics Manager',
                'supervisorSignature' => '',
                'Muhuri' => '',
                'companyLogo' => '',
                'fieldworkTitle' => 'Fieldwork Title',
                'fieldworkDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'applicationDeadline' => '2024-07-04',
                'TIN' => '321321321', // Add TIN
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'companyName' => 'Vodacom Tanzania',
                'location' => 'Arusha',
                'officeID' => 5,
                'supervisorName' => 'David Brown',
                'supervisorPhone' => '+255 712 345 678',
                'supervisorEmail' => 'david.brown@example.com',
                'password' => Hash::make('password'),
                'supervisorPosition' => 'Sales Manager',
                'supervisorSignature' => '',
                'Muhuri' => '',
                'companyLogo' => '',
                'fieldworkTitle' => 'Fieldwork Title',
                'fieldworkDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'applicationDeadline' => '2024-07-05',
                'TIN' => '456456456', // Add TIN
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('employers')->insert($employers);
    }
}
