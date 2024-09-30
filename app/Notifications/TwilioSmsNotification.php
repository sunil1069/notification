<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Twilio\Rest\Client;
use App\Models\Credentials;


class TwilioSmsNotification extends Notification
{
    use Queueable;

    protected $message;
    protected $recipient;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message, $recipient)
    {
        $this->message = $message;
        $this->recipient = $recipient;
    }

    /**
     * Send the notification via the chosen channels.
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'twilio'];
    }

    /**
     * Store notification in the database.
     */
    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->message,
            'recipient' => $this->recipient,
        ];
    }

    /**
     * Send the SMS via Twilio.
     */
    public function toTwilio($notifiable)
    {
       
       $credentials = Credentials::where('key','TWILIO')->first();
       $sid = $credentials->sid_tokan;
       $token = $credentials->auth_tokan;
       $sender_number = $credentials->sender_number;
        
        $client = new Client($sid, $token);

        $client->messages->create(
            $this->recipient, // Phone number of the recipient
            [
                'from' => $from, 
                'body' => $this->message,
            ]
        );
    }
}