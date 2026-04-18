<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'user_order';
    public $timestamps = false; // Disable default timestamps as Django didn't use them

    protected $fillable = ["uid_id", "amt", "email", "firstname"];

    public function user() {
        return $this->belongsTo(Signup::class, 'uid_id', 'id');
    }

}
