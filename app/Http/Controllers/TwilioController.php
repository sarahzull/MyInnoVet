<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Services\TwilioService;

class TwilioController extends Controller
{
    public function sendWhatsAppMessage(TwilioService $twilioService)
    {
        $appointments = Appointment::with(['patient', 'staffs', 'slots', 'slots.slotDetails'])
                                ->join('slots', 'appointments.slot_id', '=', 'slots.id')
                                ->where('appointments.id', 6)
                                ->select('appointments.*')
                                ->get();
 
        foreach($appointments as $appointment) {
            $ownerName = $appointment->patient->owner->name;
            $petName = 
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

        // $message = $twilio->messages->create(
        //     'whatsapp:+601121690600', // to
        //     [
        //         'from' => 'whatsapp:+14155238886',
        //         'body' => 'Your appointment is coming up on July 21 at 3PM',
        //     ]
        // );

        return response()->json(['message' => 'Message sent successfully']);
    }
}
