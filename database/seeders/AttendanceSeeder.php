<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = range(1, 5); // Student IDs 1 to 5

        foreach ($students as $studentID) {
            DB::table('attendance')->insert([
                'employerID' => 1,
                'studentID' => $studentID,
                // Defaulting all days for simplicity, modify as needed
                'day_1' => 'absent',
                'day_2' => 'present',
                'day_3' => 'absent',
                'day_4' => 'present',
                'day_5' => 'absent',
                'day_6' => 'present',
                'day_7' => 'absent',
                'day_8' => 'present',
                'day_9' => 'absent',
                'day_10' => 'present',
                'day_11' => 'absent',
                'day_12' => 'present',
                'day_13' => 'absent',
                'day_14' => 'present',
                'day_15' => 'absent',
                'day_16' => 'present',
                'day_17' => 'absent',
                'day_18' => 'present',
                'day_19' => 'absent',
                'day_20' => 'present',
                'day_21' => 'absent',
                'day_22' => 'present',
                'day_23' => 'absent',
                'day_24' => 'present',
                'day_25' => 'absent',
                'day_26' => 'present',
                'day_27' => 'absent',
                'day_28' => 'present',
                'day_29' => 'absent',
                'day_30' => 'present',
                'day_31' => 'absent',
                'day_32' => 'present',
                'day_33' => 'absent',
                'day_34' => 'present',
                'day_35' => 'absent',
                'day_36' => 'present',
                'day_37' => 'absent',
                'day_38' => 'present',
                'day_39' => 'absent',
                'day_40' => 'present',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
