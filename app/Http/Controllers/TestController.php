<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Services\TwilioService;

class TestController extends Controller
{
    public function testQuery (TwilioService $twilioService) 
    {
        //$reminderDate = Carbon::now()->subWeek()->subDay()->format('Y-m-d');

        // $weekBefore =  Carbon::now()->addWeek()->format('Y-m-d');
        // $appointmentsWeekBefore = Appointment::with(['patient', 'staffs', 'slots', 'slots.slotDetails'])
        //                             ->join('slots', 'appointments.slot_id', '=', 'slots.id')
        //                             ->whereDate('slots.date', $weekBefore)
        //                             ->select('appointments.*')
        //                             ->get();

        $dayBefore = Carbon::now()->format('Y-m-d');
        $weekBefore = Carbon::now()->addDays(7)->format('Y-m-d');

        // $appointments = Appointment::with(['patient', 'staffs', 'slots', 'slots.slotDetails'])
        //     ->join('slots', 'appointments.slot_id', '=', 'slots.id')
        //     ->whereDate('slots.date', '>=', $dayBefore)
        //     ->whereDate('slots.date', '<=', $weekBefore)
        //     ->get();

        
        
        // $slotDate = $appointment->slots->date->format('Y-m-d');
        // if ($slotDate <)
        // foreach($appointments as $appointment) 
        // {
        //     $ownerName = $appointment->patient->owner->name;
        //     $slotDate = $appointment->slots->date->format('d F Y');
        //     $slotTime = $appointment->slots->slotDetails->description;
        // }
        $appointments = Appointment::with(['patient', 'staffs', 'slots', 'slots.slotDetails'])->get();

        foreach ($appointments as $appointment) {

            // Check if the appointment is tomorrow.
            $tomorrow = now()->addDays(1)->format('Y-m-d');
            $slotDate = $appointment->slots->date->format('Y-m-d');

            if ($slotDate == $tomorrow) {
                $ownerName = $appointment->patient->owner->name;
                $slotDate = $appointment->slots->date->format('d F Y');
                $slotTime = $appointment->slots->slotDetails->description;
            
                $bodyMessage = "Hello *$ownerName*,\n\n";
                $bodyMessage .= "We would like to remind you of your upcoming appointment.\n";
                $bodyMessage .= "Your appointment details:\n\n";
                $bodyMessage .= "*Date: $slotDate*\n";
                $bodyMessage .= "*Time: $slotTime*\n\n";
                $bodyMessage .= "Thank you for choosing MyInnoVet for your veterinary services.";

                $twilioService->sendWhatsAppMessage($bodyMessage);
            }

            // Check if the appointment is due before or a week before today's date.
            $slotDate = $appointment->slots->date->format('Y-m-d');
            $dueDate = now()->addWeeks(-1)->format('Y-m-d');

            if ($slotDate == $dueDate) {
                $ownerName = $appointment->patient->owner->name;
                $slotDate = $appointment->slots->date->format('d F Y');
                $slotTime = $appointment->slots->slotDetails->description;
            
                $bodyMessage = "Hello *$ownerName*,\n\n";
                $bodyMessage .= "We would like to remind you of your upcoming appointment.\n";
                $bodyMessage .= "Your appointment details:\n\n";
                $bodyMessage .= "*Date: $slotDate*\n";
                $bodyMessage .= "*Time: $slotTime*\n\n";
                $bodyMessage .= "Thank you for choosing MyInnoVet for your veterinary services.";

                $twilioService->sendWhatsAppMessage($bodyMessage);
            }
        }
        
        return response()->json([
            'message' => 'Sms reminder has sent successfully'
        ]);
    }
}
