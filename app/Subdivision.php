<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subdivision extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'm_sub_division';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
