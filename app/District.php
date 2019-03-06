<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'm_district';
    
    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
