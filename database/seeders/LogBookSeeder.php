<?php
namespace Database\Seeders;

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
        // Dummy data for log book
        $logBookData = [
            'employerID' => 1,
            'studentID' => 1,
            'status' => 'pending',
        ];

        // Generate dummy events for each day
        for ($day = 1; $day <= 40; $day++) {
            $logBookData["day_$day"] = $this->generateRandomEvent();
        }

        // Insert the data into the log_books table
        DB::table('log_books')->insert($logBookData);
    }

    /**
     * Generate a random event for demonstration purposes.
     *
     * @return string
     */
    private function generateRandomEvent()
    {
        // List of sample events
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
