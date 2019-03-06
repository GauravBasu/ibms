<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OTPUser extends Model
{
    protected $table = 'user_otp';


    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
