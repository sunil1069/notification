<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class NotificationController extends Controller
{
    public function index()
    {
        return view('demo');
    }

    public function addUser(Request $request)
    {
        $input = $request->all();

        User::create($input);
        return redirect()->back()->with('Success','Success! User Added Successfully...');
    }
}

