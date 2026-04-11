<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apt extends Model
{
    protected $table = 'user_apt';
    public $timestamps = false; // Disable default timestamps as Django didn't use them

    protected $fillable = ["name", "email", "phn", "date", "time", "msg"];

}
