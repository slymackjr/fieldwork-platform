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
        $students = [
            [
                'studentName' => 'Brandon Jacob',
                'registrationID' => 'REG123456',
                'studentEmail' => 'brandon.jacob@oxford.ac.uk',
                'studentPhone' => '255-123-456-789',
                'password' => Hash::make('password'),
                'university' => 'University of Dar es Salaam',
                'course' => 'Computer Science',
                'studyYear' => 2,
                'currentGPA' => 3.8,
                'introductionLetter' => 'https://via.placeholder.com/200x100.png?text=Introduction+Letter',
                'resultSlip' => 'https://via.placeholder.com/200x100.png?text=Result+Slip',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'studentName' => 'Bridie Kessler',
                'registrationID' => 'REG234567',
                'studentEmail' => 'bridie.kessler@harvard.edu',
                'studentPhone' => '255-234-567-890',
                'password' => Hash::make('password'),
                'university' => 'University of Dodoma',
                'course' => 'Law',
                'studyYear' => 3,
                'currentGPA' => 3.7,
                'introductionLetter' => 'https://via.placeholder.com/200x100.png?text=Introduction+Letter',
                'resultSlip' => 'https://via.placeholder.com/200x100.png?text=Result+Slip',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'studentName' => 'Ashleigh Langosh',
                'registrationID' => 'REG345678',
                'studentEmail' => 'ashleigh.langosh@stanford.edu',
                'studentPhone' => '255-345-678-901',
                'password' => Hash::make('password'),
                'university' => 'Ardhi University',
                'course' => 'Business',
                'studyYear' => 1,
                'currentGPA' => 3.9,
                'introductionLetter' => 'https://via.placeholder.com/200x100.png?text=Introduction+Letter',
                'resultSlip' => 'https://via.placeholder.com/200x100.png?text=Result+Slip',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'studentName' => 'Angus Grady',
                'registrationID' => 'REG456789',
                'studentEmail' => 'angus.grady@mit.edu',
                'studentPhone' => '255-456-789-012',
                'password' => Hash::make('password'),
                'university' => 'Nelson Mandela African Institute of Science and Technology',
                'course' => 'Engineering',
                'studyYear' => 4,
                'currentGPA' => 4.0,
                'introductionLetter' => 'https://via.placeholder.com/200x100.png?text=Introduction+Letter',
                'resultSlip' => 'https://via.placeholder.com/200x100.png?text=Result+Slip',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'studentName' => 'Raheem Lehner',
                'registrationID' => 'REG567890',
                'studentEmail' => 'raheem.lehner@cambridge.ac.uk',
                'studentPhone' => '255-567-890-123',
                'password' => Hash::make('password'),
                'university' => 'Kilimanjaro Christian Medical University College',
                'course' => 'Medicine',
                'studyYear' => 2,
                'currentGPA' => 3.6,
                'introductionLetter' => 'https://via.placeholder.com/200x100.png?text=Introduction+Letter',
                'resultSlip' => 'https://via.placeholder.com/200x100.png?text=Result+Slip',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('students')->insert($students);
    }
}
