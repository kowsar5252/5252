<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone_number extends Model
{
    protected $table = "phone_numbers";

    public function membershiprecord()
     {
         return $this->belongsTo('App\Membershiprecord');
     }
}
