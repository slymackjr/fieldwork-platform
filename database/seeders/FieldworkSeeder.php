<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dummy data
        $fieldworks = [
            ['employerID' => 1, 'studentID' => 1, 'status' => 'accepted', 'confirmed' => 'yes'],
            ['employerID' => 2, 'studentID' => 1, 'status' => 'pending', 'confirmed' => 'no'],
            ['employerID' => 3, 'studentID' => 1, 'status' => 'rejected', 'confirmed' => 'no'],
            ['employerID' => 4, 'studentID' => 1, 'status' => 'accepted', 'confirmed' => 'no'],
            ['employerID' => 5, 'studentID' => 1, 'status' => 'pending', 'confirmed' => 'no'],

            // New data for employerID 1 with studentIDs from 1 to 5
            ['employerID' => 1, 'studentID' => 2, 'status' => 'accepted', 'confirmed' => 'no'],
            ['employerID' => 1, 'studentID' => 3, 'status' => 'pending', 'confirmed' => 'no'],
            ['employerID' => 1, 'studentID' => 4, 'status' => 'rejected', 'confirmed' => 'no'],
            ['employerID' => 1, 'studentID' => 5, 'status' => 'accepted', 'confirmed' => 'no'],
        ];

        // Insert dummy data into the fieldworks table
        foreach ($fieldworks as $fieldwork) {
            DB::table('fieldworks')->insert($fieldwork);
        }
    }
}
