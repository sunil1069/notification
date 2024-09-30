<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $twilio;

    public function __construct()
    {
        $this->twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    }

    public function sendSMS($to, $message)
    {
        $this->twilio->messages->create(
            $to, // Destination phone number
            [
                'from' => env('TWILIO_PHONE_NUMBER'), // Twilio phone number
                'body' => $message,
            ]
        );
    }
}