<?php

namespace App\Http\Livewire\Pages\Appointments;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\RefTimeSlot;
use App\Models\Slot;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Update extends Component
{
    public $appointmentId ;
    public $patient;
    public $staff;
    public $oldDate;
    public $date;
    public $type;
    public $slots;
    public $oldSelectedSlot;
    public $selectedSlot;
    public $schedule = [];

    protected $rules = [
        'patient' => 'required',
        'staff' => 'required',
        'date' => 'required',
        'type' => 'required',
        'selectedSlot' => 'required',
    ];

    public function mount($id)
    {
        $this->appointmentId = $id;
        // Load existing data
        $appointment = Appointment::find($this->appointmentId);
        $this->patient = $appointment->patient_id;
        $this->staff = $appointment->staff_id;
        $this->oldDate = $appointment->slots->date->format('Y-m-d');
        $this->date = $appointment->slots->date->format('Y-m-d');
        $this->type = $appointment->type;
        $this->selectedSlot = $appointment->slot_id;
        $this->oldSelectedSlot = $appointment->slot_id;

        // Load available staff schedule
        $staff = User::with('schedules', 'schedules.days', 'schedules.start_times', 'schedules.end_times')->whereId($this->staff)->first();
        foreach ($staff->schedules as $data) {
            $this->schedule[] = array(
                "day" => $data->days->description,
                "start_time" => $data->start_times ? $data->start_times->description : 'NULL',
                "end_time" => $data->end_times ? $data->end_times->description : 'NULL',
            );
        }

        // local anonymous function to get start and end time
        $getTimeRange = function ($value) {
            $date = Carbon::createFromFormat('Y-m-d', $value);
            $dayName = strtoupper($date->dayName);

            $start_time = $end_time = null;

            // loop through the schedule
            foreach ($this->schedule as $schedule) {
                // check if the day in schedule matches the day name
                if ($schedule['day'] == $dayName) {
                    $start_time = date("H:i:s", strtotime($schedule['start_time']));
                    $end_time = date("H:i:s", strtotime($schedule['end_time']));
                }
            }

            return [$start_time, $end_time];
        };

        // local anonymous function to update slots
        $updateSlots = function ($value, $start_time, $end_time) {
            if ($start_time == null || $end_time == null) {
                $this->slots = collect([]);
            } else {
                $this->slots = Slot::with(['slotDetails' => function ($query) use ($start_time, $end_time) {
                    $query->whereTime('start', '>=', $start_time)
                        ->whereTime('end', '<=', $end_time);
                }])->whereDate('date', $value)->get()
                    ->reject(function ($slot) {
                        return is_null($slot->slotDetails);
                    });
            }
        };

        // get slot data
        $dateSlot = Slot::whereDate('date', $this->date)->get();

        // if slot for date does not exist
        if ($dateSlot->isEmpty()) {
            $slots = RefTimeSlot::get();

            foreach ($slots as $slot) {
                Slot::create([
                    'date' => $this->date,
                    'slot' => $slot->id
                ]);
            }
        }

        // get time range
        [$start_time, $end_time] = $getTimeRange($this->date);

        // update slots
        $updateSlots($this->date, $start_time, $end_time);
    }

    public function updatedStaff($value)
    {
        $staff = User::with('schedules', 'schedules.days', 'schedules.start_times', 'schedules.end_times')->whereId($value)->first();
        foreach ($staff->schedules as $data) {
            $this->schedule[] = array(
                "day" => $data->days->description,
                "start_time" => $data->start_times ? $data->start_times->description : 'NULL',
                "end_time" => $data->end_times ? $data->end_times->description : 'NULL',
            );
        }
    }

    public function updatedDate($value)
    {
        // store the selected patient ID
        $selectedPatient = $this->patient;

        // local anonymous function to get start and end time
        $getTimeRange = function ($value) {
            $date = Carbon::createFromFormat('Y-m-d', $value);
            $dayName = strtoupper($date->dayName);

            $start_time = $end_time = null;

            // loop through the schedule
            foreach ($this->schedule as $schedule) {
                // check if the day in schedule matches the day name
                if ($schedule['day'] == $dayName) {
                    $start_time = date("H:i:s", strtotime($schedule['start_time']));
                    $end_time = date("H:i:s", strtotime($schedule['end_time']));
                }
            }

            return [$start_time, $end_time];
        };

        // local anonymous function to update slots
        $updateSlots = function ($value, $start_time, $end_time) {
            if ($start_time == null || $end_time == null) {
                $this->slots = collect([]);
            } else {
                $this->slots = Slot::with(['slotDetails' => function ($query) use ($start_time, $end_time) {
                    $query->whereTime('start', '>=', $start_time)
                        ->whereTime('end', '<=', $end_time);
                }])->whereDate('date', $value)->get()
                    ->reject(function ($slot) {
                        return is_null($slot->slotDetails);
                    });
            }
        };

        // get slot data
        $dateSlot = Slot::whereDate('date', $value)->get();

        // if slot for date does not exist
        if ($dateSlot->isEmpty()) {
            $slots = RefTimeSlot::get();

            foreach ($slots as $slot) {
                Slot::create([
                    'date' => $value,
                    'slot' => $slot->id
                ]);
            }
        }

        // get time range
        [$start_time, $end_time] = $getTimeRange($value);

        // update slots
        $updateSlots($value, $start_time, $end_time);

        // restore the selected patient
        $this->patient = $selectedPatient;
    }

    public function submit()
    {
        $this->validate();

        Slot::whereId($this->oldSelectedSlot)->update([
            'status' => 0,
        ]);

        Slot::whereSlot($this->selectedSlot)->whereDate('date', $this->date)->update([
            'status' => 1,
        ]);

        $slotData = Slot::whereSlot($this->selectedSlot)->whereDate('date', $this->date)->first();

        Appointment::whereId($this->appointmentId)->update([
            'patient_id' => $this->patient,
            'staff_id' => $this->staff,
            'type' => $this->type,
            'slot_id' => $slotData->id,
        ]);

        // if ($slotData) {
        //     $appointment = Appointment::find($slotData->id);
        //     $patient = Patient::find($this->patient);
        //     $staff = User::find($this->staff);

        //     if ($appointment && $patient && $staff) {
        //         if ($appointment->wasRecentlyCreated) {
        //             // Appointment created
        //             Mail::to($staff->email)->send(new AppointmentCreated($appointment, $patient, $staff));
        //         } else {
        //             // Appointment updated
        //             Mail::to($staff->email)->send(new AppointmentUpdated($appointment, $patient, $staff));
        //         }
        //     }
        // }

        session()->flash('success', 'Appoinment updated successfully.');

        return redirect()->route('appointments.index');
    }

    public function render()
    {
        $patients = Patient::all();
        $role = Role::findByName('Veterinarian');
        $staffs = User::role($role)->latest()->get();

        return view('livewire.pages.appointments.update', [
            'patients' => $patients,
            'staffs' => $staffs
        ])->extends(('layout.master-page'));
    }
}
