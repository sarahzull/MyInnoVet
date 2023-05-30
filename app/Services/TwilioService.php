<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    private $client;

    public function __construct()
    {
        $sid = config('twilio.sid');
        $token = config('twilio.token');

        $this->client = new Client($sid, $token);
    }

    public function sendWhatsAppMessage($to, $body)
    {
        $message = $this->client->messages->create(
            'whatsapp:' . $to,
            [
                'from' => 'whatsapp:' . config('twilio.whatsapp_number'),
                'body' => $body,
            ]
        );

        return $message->sid;
    }
}
