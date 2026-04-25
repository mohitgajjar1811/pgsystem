<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'user_booking';
    public $timestamps = false; // Disable default timestamps as Django didn't use them

    protected $fillable = ["name", "email", "mobileno", "joiningdate", "adult", "specialrequest", "roomname"];

}
