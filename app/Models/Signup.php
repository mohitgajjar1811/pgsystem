<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Signup extends Authenticatable
{
    protected $table = 'user_signup';
    public $timestamps = false; // Disable default timestamps as Django didn't use them

    protected $fillable = ["firstname", "lastname", "phoneno", "email", "password", "is_admin"];

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    public function orders() {
        return $this->hasMany(Order::class, 'uid_id', 'id');
    }
    
    // For Auth::attempt to work, map 'password' column implicitly, but Laravel uses 'password' by default.
    // Also use Authenticatable instead of Model.

}
