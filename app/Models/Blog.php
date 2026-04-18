<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'user_blog';
    public $timestamps = false; // Disable default timestamps as Django didn't use them

    protected $fillable = ["image", "price", "bed", "title", "detail"];

}
