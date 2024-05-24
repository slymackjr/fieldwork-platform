<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LogBook;
use App\Models\Student;
use App\Models\Employer;

class LogBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all students and employers
        $students = Student::all();
        $employers = Employer::all();

        // Define possible statuses for the log book
        $statuses = ['Absent', 'Present', 'Sick', 'Vacation', 'Holiday'];

        // Loop through students and employers to create log book entries
        foreach ($students as $student) {
            foreach ($employers as $employer) {
                $logBook = new LogBook();
                $logBook->student_id = $student->id;
                $logBook->employer_id = $employer->id;
                
                // Generate random status for each day (day_1 to day_40)
                for ($day = 1; $day <= 40; $day++) {
                    $fieldName = "day_$day";
                    $logBook->$fieldName = $statuses[array_rand($statuses)];
                }

                $logBook->save();
            }
        }
    }
}
