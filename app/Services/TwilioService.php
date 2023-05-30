<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    private $client;

    public function __construct()
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');

        $this->client = new Client($sid, $token);
    }

    public function sendWhatsAppMessage($body)
    {
        $message = $this->client->messages->create(
            'whatsapp:+601121690600',
            [
                'from' => 'whatsapp:+14155238886',
                'body' => $body,
            ]
        );

        return $message->sid;
    }
}