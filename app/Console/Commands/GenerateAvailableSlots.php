<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GenerateAvailableSlots extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slots:generate {days=7}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates available slots for the specified number of days';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $days = $this->argument('days');
        $startTime = strtotime('today 9:00 AM');
        $endTime = strtotime('today 6:00 PM');
        $interval = 15 * 60; // 15 minutes in seconds

        for ($i = 0; $i < $days; $i++) {
            $date = date('Y-m-d', strtotime("+{$i} days"));
            $times = [];

            for ($time = $startTime; $time < $endTime; $time += $interval) {
                $times[] = [
                    'start_time' => date('H:i:s', $time),
                    'end_time' => date('H:i:s', $time + $interval),
                    'date' => $date,
                ];
            }

            DB::table('available_timeslots')->insert($times);
        }

        $this->info("Generated available time slots for {$days} days");
        return Command::SUCCESS;
    }
}
