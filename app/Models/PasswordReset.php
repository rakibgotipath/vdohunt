<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $table = "password_reset_tokens";
    protected $guarded = ['id'];
    public $timestamps = false;
}
