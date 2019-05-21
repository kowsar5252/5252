<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Mmg_users;

class FrontEndController extends Controller
{
  public function getIslands(Request $request){
      $stringToSend="<option>--Select One--</option>";
      $island_lists=DB::table('islands')->where('atollNameENG',$request->atollName)->get();

      foreach ($island_lists as $island_list) {
        $stringToSend.= "<option value='".$island_list->islandID."'>". $island_list->islandNameENG."</option>";
      }
      echo $stringToSend;
      }
  //getAdress
  public function getAdress(Request $request){
    $stringToSend="<option>--Select One--</option>";
    $address_lists=DB::table('addresses')->where('islandID',$request->islandID)->get();

    foreach ($address_lists as $address_list) {
      $stringToSend.= "<option value='".$address_list->addressID."'>". $address_list->addressNameENG."</option>";
    }
    echo $stringToSend;
  }

  public function userActive($id){
     if (DB::table('mmg_users')->where('id',$id)->value('status')==0) {
       DB::table('mmg_users')->where('id',$id)->update([
         'status'=>1,
       ]);
     } else {
       DB::table('mmg_users')->where('id',$id)->update([
         'status'=>0,
       ]);
     }
     return back();
   }
   //userDelete
   public function userDelete($id){
     Mmg_users::where('id',$id)->delete();
     return back()->with('status','Account Trashed Successfully!!');
   }

   public function userRestore($id){
     Mmg_users::withTrashed()->where('id', $id)->restore();
     return back()->with('status', 'Account Restore Successfully!');
   }
//trashed product destry
   public function userDestroy($id){
     Mmg_users::withTrashed()->where('id', $id)->forceDelete();
     return back()->with('status', 'Account Destroy Successfully!');
   }


}
