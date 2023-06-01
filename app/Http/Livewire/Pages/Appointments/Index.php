<?php

namespace App\Http\Livewire\Pages\Appointments;

use App\Models\Slot;
use Livewire\Component;
use App\Models\Appointment;
use App\Models\RefTimeSlot;
use App\Services\TwilioService;

class Index extends Component
{
    protected $listeners = ['confirmDeleteAppointment'];

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

    public function deleteAppointment($id)
    {
        $this->emit('showDeleteConfirmation', $id);
    }

    public function confirmDeleteAppointment(TwilioService $twilioService, $id)
    {
        $appointment = Appointment::with(['patient', 'staffs', 'slots', 'slots.slotDetails'])
                            ->join('slots', 'appointments.slot_id', '=', 'slots.id')
                            ->where('appointments.id', $id)
                            ->select('appointments.*')
                            ->first();

        if (!$appointment) {
            session()->flash('success', 'Appoinment doesnt exist.');
            return redirect()->route('appointments.index');
        }

        $ownerName = $appointment->patient->owner->name;
        $petName = $appointment->patient->name;

        $appointment->slots->update(['status' => 0]);

        $bodyMessage = "Hello *$ownerName*,\n\n";
        $bodyMessage .= "We regret to inform you that your pet *$petName* appointment has been canceled.\n";
        $bodyMessage .= "If you have any questions or would like to reschedule, please feel free to contact us.\n\n";
        $bodyMessage .= "Thank you for considering MyInnoVet for your veterinary services.";

        $twilioService->sendWhatsAppMessage($bodyMessage);

        Appointment::whereId($id)->delete();

        session()->flash('success', 'Appoinment deleted successfully.');

        // redirect to users list after deleting
        return redirect()->route('appointments.index');
    }

    public function render()
    {
        $user = auth()->user();
        $userRole = $user->getRoleNames()->first();

        // dd($userRole);

        $query = Appointment::with(['patient', 'staffs', 'slots', 'slots.slotDetails'])
            ->join('slots', 'appointments.slot_id', '=', 'slots.id')
            ->join('patients', 'appointments.patient_id', '=', 'patients.id')
            ->orderBy('slots.date', 'desc')
            ->orderBy('slots.slot', 'desc')
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
