<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = 'user_newsletter';
    public $timestamps = false; // Disable default timestamps as Django didn't use them

    protected $fillable = ["email"];

}
