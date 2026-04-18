<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'user_team';
    public $timestamps = false; // Disable default timestamps as Django didn't use them

    protected $fillable = ["image", "name", "dsg"];

}
