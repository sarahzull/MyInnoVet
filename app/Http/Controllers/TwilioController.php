<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use Illuminate\Http\Request;

class TwilioController extends Controller
{
    public function sendWhatsAppMessage()
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $twilio = new Client($sid, $token);

        $message = $twilio->messages->create(
            'whatsapp:+601121690600', // to
            [
                'from' => 'whatsapp:+14155238886',
                'body' => 'Your appointment is coming up on July 21 at 3PM',
            ]
        );

        return response()->json(['sid' => $message->sid]);
    }
}
