<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormContact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'user_id',
        // 'ip',
    ];
}
