<?php

namespace Database\Seeders;

use App\Models\RefTimeSlot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefTimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timesSlots = ['09:00 AM - 10:00 AM', '10:01 AM - 11:00 AM', '11:01 AM - 12:00 PM', '12:01 PM - 01:00 PM', '01:01 PM - 02:00 PM', '02:01 PM - 03:00 PM', '03:01 PM - 04:00 PM', '04:01 PM - 05:00 PM', '05:01 PM - 06:00 PM'];

        foreach ($timesSlots as $time) {
            // Split the time string into start and end times
            $times = explode(' - ', $time);

            // Create a new RefTimeSlot with start and end times
            RefTimeSlot::create([
                'description' => $time,
                'start' => date("H:i:s", strtotime($times[0])),  // Convert the start time to the 24-hour format
                'end' => date("H:i:s", strtotime($times[1])),  // Convert the end time to the 24-hour format
            ]);
        }
    }
}
