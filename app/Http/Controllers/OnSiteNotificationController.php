<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\OnSiteNotification;
use App\Models\User;
use Auth;

class OnSiteNotificationController extends Controller
{
    public function onsiteNotification()
    {
        
    if(auth()->user()){

        $user = User::first();   // Find the user to notify
       // dd($user);

        auth()->user()->notify(new OnSiteNotification($user));
    }

       dd('Notifications send successfully');
    }

    public function showNotifications()
    {
       // $user = auth()->user();

        // Get unread notifications
       // $unreadNotifications = $user->unreadNotifications;
       // echo"<pre>";print_r($unreadNotifications);die;
        // Get read notifications
       // $readNotifications = $user->readNotifications;

        return view('notifications');
    }
}
