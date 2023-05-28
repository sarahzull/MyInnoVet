<?php

namespace App\Http\Livewire\Pages\Staffs;

use App\Models\RefDaySchedule;
use App\Models\RefTimeSchedule;
use App\Models\StaffSchedule;
use App\Models\User;
use Livewire\Component;

class Schedule extends Component
{
    public $user;
    public $days = [];
    public $name;
    public $times;
    public $checkedDays = [];
    public $startTime = [];
    public $endTime = [];

    public function mount($id)
    {
        // $x = substr(strtoupper(now()->dayName), 0, 3);
        $this->days = RefDaySchedule::all();
        $this->times = RefTimeSchedule::all();

        $this->user = User::find($id);
        $this->name = $this->user->name;

        // Get StaffSchedules for the user
        $staffSchedules = StaffSchedule::where('user_id', $id)->get();

        foreach ($this->days as $day) {
            // Get the schedule for the day if it exists
            $schedule = $staffSchedules->firstWhere('day_id', $day->id);

            if ($schedule) {
                $this->startTime[$day->id] = $schedule->start_time;
                $this->endTime[$day->id] = $schedule->end_time;

                // Check the day if it has start time and end time
                if ($schedule->start_time && $schedule->end_time) {
                    $this->checkedDays[] = $day->id;
                }
            }
        }
    }

    public function submit()
    {
        foreach ($this->days as $day) {
            if (in_array($day->id, $this->checkedDays)) {
                StaffSchedule::updateOrCreate(
                    [
                        'user_id' => $this->user->id,
                        'day_id' => $day->id,
                    ],
                    [
                        'start_time' => $this->startTime[$day->id] ?? null,
                        'end_time' => $this->endTime[$day->id] ?? null,
                    ]
                );
            } else {
                StaffSchedule::updateOrCreate(
                    [
                        'user_id' => $this->user->id,
                        'day_id' => $day->id,
                    ],
                    [
                        'start_time' => null,
                        'end_time' => null,
                    ]
                );
            }
        }

        session()->flash('success', 'Staff schedules saved successfully.');

        return redirect()->route('staffs.index');
    }

    public function render()
    {
        return view('livewire.pages.staffs.schedule')->extends(('layout.master-page'));
    }
}
