<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'user_test';
    public $timestamps = false; // Disable default timestamps as Django didn't use them

    protected $fillable = ["message", "image", "name", "dsg"];

}
