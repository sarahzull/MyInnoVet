<?php

namespace App\Http\Livewire\Pages\Appointments;

use App\Models\Appointment;
use App\Models\RefTimeSlot;
use App\Models\Slot;
use Livewire\Component;

class Index extends Component
{
    public function mount()
    {
        $todaySlot = Slot::whereDate('date', now()->format('Y-m-d'))->get();

        if (count($todaySlot) == 0) {
            $slot = RefTimeSlot::get();

            foreach($slot as $slots) {
                Slot::create([
                    'date' => now()->format('Y-m-d'),
                    'slot' => $slots->id
                ]);
            }
        }
    }

    public function render()
    {
        $appointments = Appointment::with(['patient', 'staffs', 'slots', 'slots.slotDetails'])
                                    ->join('slots', 'appointments.slot_id', '=', 'slots.id')
                                    ->orderBy('slots.date', 'asc')
                                    ->orderBy('slots.slot', 'asc')
                                    ->select('appointments.*') // Avoids ambiguity in SQL select
                                    ->get();

        return view('livewire.pages.appointments.index', [
            'appointments' => $appointments
        ])->extends('layout.master');
    }
}
