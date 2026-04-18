<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cout extends Model
{
    protected $table = 'user_cout';
    public $timestamps = false; // Disable default timestamps as Django didn't use them

    protected $fillable = ["roomname", "bed", "priceperb", "deposite", "total"];

}
