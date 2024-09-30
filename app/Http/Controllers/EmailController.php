<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Notification;
use App\Notifications\SendEmailNotification;

class EmailController extends Controller
{
    public function sendnotification()
    {

        $user = User::first();


        $details = [

            'greeting' => 'Hello Sunil Welcome in SMPT Services',
            'body' => 'With Laravel Family',
            'actiontext' => 'Laravel Email Testing',
            'actionurl' => '/',
            'lastline' => 'Always With Laravel',


        ];

        Notification::send($user, new SendEmailNotification($details));

        dd('Email is send successfully');


    }
}
