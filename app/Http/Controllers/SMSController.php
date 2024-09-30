<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TwilioService;
use Twilio\Rest\Client;
use App\Notifications\TwilioSmsNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Models\Credentials;




class SMSController extends Controller
{
    public function sendsms(Request $request)
    { 
       // $sid = Credentials::where('id',$request->id)->pluck('sid_tokan')->first();

      //  $sid = Credentials::where('id',$request->id)->value('sid_tokan');

       
       $credentials = Credentials::where('key','TWILIO')->first();
       $sid = $credentials->sid_tokan;
       $token = $credentials->auth_tokan;
       $sender_number = $credentials->sender_number;


        $twilio = new Client($sid, $token);
      //  echo"<pre>";print_r($twilio);die;
        $message = $twilio->messages->create(
            "+91 98136 71069", // To
            [
                "body" => " Twilio Services is good...",
                "from" => $sender_number
            ]
        );  


        dd(" Text massage send successfully....");
    }

    public function sendsmsDatabase()
    {
        $user = User::first();

        $message = "ssc cgl exam";
        $recipient = "+91 98136 71069";

        Notification::send($user, new TwilioSmsNotification($message, $recipient));

        dd(" Massage send successfully...."); 
    }

}
