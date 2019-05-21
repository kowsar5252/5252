<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Updaterequest;
use App\Membershiprecord;
use DB;

class UpdateController extends Controller
{
  //memberUpdateRequest
     public function memberUpdateRequest(){
       $updaterequests=Updaterequest::all();
       return view('updateRequest',compact('updaterequests'));
     }
  //UpdateRequestAccept
     public function UpdateRequestAccept($id){
       $single_info=Updaterequest::where('id',$id)->first();
       $atoll_lists=DB::table('atolls')->get();
       return view('updateInsert',compact('single_info','atoll_lists'));
     }
  //UpdateRequestAcceptConfirm
     public function UpdateRequestAcceptConfirm(Request $request){
      DB::table('membershiprecord')->where('member_partyID',$request->member_partyID)->update([
        'member_bloodGroup'=>$request->member_bloodGroup,
        'member_currAtoll'=>$request->member_currAtoll,
        'member_currIsland'=>$request->member_currIsland,
        'member_currAddress'=>$request->member_currAddress,
        'member_currAddressID'=>$request->member_currAddressID,
        'member_employedAt'=>$request->member_employedAt,
        'member_employedAtComments'=>$request->member_employedAtComments,
        'member_education'=>$request->member_education,
        'member_educationComments'=>$request->member_educationComments,
        'member_email'=>$request->member_email,
        'member_twitterHandle'=>$request->member_twitterHandle,
        'member_FBID'=>$request->member_FBID,
      ]);
      Updaterequest::where('member_partyID',$request->member_partyID)->delete();
      return redirect('member/update/request')->with('status','Member Updated Successfully!!');
      }
  //UpdateRequestCancel
     public function UpdateRequestCancel($id){
      Updaterequest::where('id',$id)->delete();
      return redirect('member/update/request')->with('status','Member Update  Request Cancel Successfully!!');
      }
}
