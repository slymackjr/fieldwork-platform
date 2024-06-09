<?php

namespace Database\Seeders;

use App\Models\LogBook;
use App\Models\Student;
use App\Models\Employer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Generate dummy data for log books
       for ($week = 1; $week <= 8; $week++) {
        for ($day = 1; $day <= 5; $day++) {
            // Calculate the day index for each week
            $dayIndex = ($week - 1) * 5 + $day;

            DB::table('log_books')->insert([
                'employerID' => 1,
                'studentID' => 1,
                'status' => 'pending',
                "day_$dayIndex" => $this->generateRandomEvent(), // Generate random event for each day
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}


    /**
     * Generate a random event for demonstration purposes.
     *
     * @return string
     */
    private function generateRandomEvent()
    {
        // List of sample events for Tanzania Breweries Limited
        $events = [
            'Visited production facilities',
            'Attended training session on safety protocols',
            'Participated in quality control assessment',
            'Conducted market research',
            'Attended meeting with management',
            'Provided assistance to production team',
            'Reviewed production reports',
            'Performed inventory management tasks',
            'Assisted with packaging operations',
            'Collaborated with marketing department',
            // Add 30 more events
            'Conducted product testing',
            'Assisted in setting up new machinery',
            'Analyzed production data',
            'Assisted in organizing company event',
            'Attended workshop on new technology',
            'Coordinated with logistics team',
            'Met with suppliers',
            'Conducted consumer surveys',
            'Assisted in troubleshooting production issues',
            'Developed marketing strategy',
            'Participated in team building activities',
            'Assisted in implementing new policies',
            'Visited distribution centers',
            'Attended safety briefing',
            'Participated in production planning meeting',
            'Reviewed customer feedback',
            'Assisted in designing promotional materials',
            'Conducted employee training session',
            'Assisted in developing new product line',
            'Attended seminar on industry trends',
            'Participated in sustainability initiative',
        ];

        // Select a random event from the list
        return $events[array_rand($events)];
    }
}
