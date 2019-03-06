<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grampanchayat extends Model
{
      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'm_gram_panchayet';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
