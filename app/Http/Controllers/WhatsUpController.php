<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Notifications\WhatsAppNotification;
use Twilio\Rest\Client;

use App\Models\Credentials;


class WhatsUpController extends Controller
{
    
    public function sendWhatsappMessage(Request $request)
    {
       
       $credentials = Credentials::where('key','TWILIO')->first();
       $sid = $credentials->sid_tokan;
       $token = $credentials->auth_tokan;
       $whatsNumber = $credentials->whatsapp_number;
      // echo"<pre>";print_r($whatsNumber);die;
       $recipientNumber = 'whatsapp:+919813671069';
       $massage = " Hello Laravel U Are Amazing ";


        $twilio = new Client($sid, $token);
      //  echo"<pre>";print_r($twilio);die;
        $whatsapp_message = $twilio->messages->create(
            $recipientNumber, // To
            [
                "from" => 'whatsapp:'.$whatsNumber,
                "body" => $massage,
            ]
        );  


        dd(" WhatsApp massage send successfully");
    }

}
