<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addressconstitution extends Model
{
      protected $table = "addressconstitution";
      public function relToConstitutions(){
          return $this->hasOne('App\Constitutions','constitutionID');
      }
}
