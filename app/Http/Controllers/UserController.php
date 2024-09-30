<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function addUser()
    {

        $user = new User;
        $user->name = 'pardeep';
        $user->email = 'pardeep123@gmail.com';
        $user->password = \Hash::make('password');
        $user->save();

        dd($user);

    }
    
}
