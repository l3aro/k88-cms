<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    public function user()
    {
        return $this->hasOne(User::class, 'phone', 'phone_email');
    }
}
