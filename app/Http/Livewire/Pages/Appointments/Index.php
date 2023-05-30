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
        $user = auth()->user();
        $userRole = $user->getRoleNames()->first();

        // dd($userRole);

        $query = Appointment::with(['patient', 'staffs', 'slots', 'slots.slotDetails'])
            ->join('slots', 'appointments.slot_id', '=', 'slots.id')
            ->join('patients', 'appointments.patient_id', '=', 'patients.id')
            ->orderBy('slots.date', 'asc')
            ->orderBy('slots.slot', 'asc')
            ->select('appointments.*'); // avoids ambiguity in SQL select

        if ($userRole === 'Client') {
            $query->where('patients.owner_id', $user->id);
        }

        $appointments = $query->get();

        // dd($appointments);

        return view('livewire.pages.appointments.index', [
            'appointments' => $appointments
        ])->extends('layout.master');
    }
}
