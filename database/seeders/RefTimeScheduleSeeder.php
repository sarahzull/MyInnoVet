<?php

namespace Database\Seeders;

use App\Models\RefTimeSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefTimeScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timesOfDays = ['09:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '01:00 PM', '02:00 PM', '03:00 PM', '04:00 PM', '05:00 PM', '06:00 PM'];

        foreach($timesOfDays as $time) {
            RefTimeSchedule::create([
                'description' => $time
            ]);
        }
    }
}
