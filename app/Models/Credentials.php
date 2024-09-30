<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credentials extends Model
{
    use HasFactory;


    protected $fillable = [
        'key',
        'sid_tokan',
        'auth_tokan',
        'sender_number',
        'whatsapp_number'
    ];
}
