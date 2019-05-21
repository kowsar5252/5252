<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membershiprecord extends Model
{
  protected $table = "membershiprecord";

     public function relToPhone()
      {
          return $this->hasMany('App\Phone_number');
      }



      protected $fillable = [ 'member_partyID', 'member_NID','member_fName','member_lName','member_dob','member_status', 'member_permAtoll', 'member_permIsland', 'member_permAddress','member_bloodGroup','member_currAtoll','member_currIsland','member_currAddress','member_currAddressID','member_employedAt','member_employedAtComments','member_education','member_educationComments','member_email','member_twitterHandle','member_FBID'];


}
