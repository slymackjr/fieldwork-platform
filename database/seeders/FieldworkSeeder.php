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
            ['employerID' => 1, 'studentID' => 1, 'status' => 'accepted'],
            ['employerID' => 2, 'studentID' => 1, 'status' => 'pending'],
            ['employerID' => 3, 'studentID' => 1, 'status' => 'rejected'],
            ['employerID' => 4, 'studentID' => 1, 'status' => 'accepted'],
            ['employerID' => 5, 'studentID' => 1, 'status' => 'pending'],
        ];

        // Insert dummy data into the fieldworks table
        foreach ($fieldworks as $fieldwork) {
            DB::table('fieldworks')->insert($fieldwork);
        }
    }
}
