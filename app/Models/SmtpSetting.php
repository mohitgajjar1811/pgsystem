<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmtpSetting extends Model
{
    protected $fillable = [
        'host', 'port', 'encryption', 'username', 'password',
        'from_name', 'from_email', 'admin_email',
    ];
}
