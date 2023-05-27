<?php

namespace Database\Seeders;

use App\Models\RefDaySchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefDayScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daysOfWeek = [
            [
                'description' => 'MONDAY',
                'short_name' => 'MON'
            ], [
                'description' => 'TUESDAY',
                'short_name' => 'TUE'
            ], [
                'description' => 'WEDNESDAY',
                'short_name' => 'WED'
            ], [
                'description' => 'THURSDAY',
                'short_name' => 'THU'
            ], [
                'description' => 'FRIDAY',
                'short_name' => 'FRI'
            ], [
                'description' => 'SATURDAY',
                'short_name' => 'SAT'
            ], [
                'description' => 'SUNDAY',
                'short_name' => 'SUN'
            ]
        ];

        foreach($daysOfWeek as $days) {
            RefDaySchedule::create([
                'description' => $days['description'],
                'short_name' => $days['short_name']
            ]);
        }
    }
}
