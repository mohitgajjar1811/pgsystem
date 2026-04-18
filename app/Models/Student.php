<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'user_student';
    public $timestamps = false; // Disable default timestamps as Django didn't use them

    protected $fillable = ["name", "email", "subject", "message"];

}
