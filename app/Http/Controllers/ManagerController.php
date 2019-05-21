<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Membershiprecord;
use DB;
use App\Mmg_users;
use App\Updaterequest;
use Carbon\Carbon;

class ManagerController extends Controller
{
    public function index(){
      if (Mmg_users::find(Auth::id())->status==1) {

        $area_names=DB::table('mms_rights')->where('userId',Auth::id())->get();
       return view('dashboard.managerIndex',compact('area_names'));
      } else {
        Auth::logout();
      return redirect('/')->with('danger_status','Your Account has been Pending!! you can log in you account when accepted by admin.');
      }
    }
    // editRequest
    public function editRequest($nid){
      $nid=$nid;
        $atoll_lists=DB::table('atolls')->get();
      return view('dashboard.editRequest',compact('nid','atoll_lists'));
    }
//role wise data send
    public function getdata(Request $request){
        $stringToSend="";
        $constitutionID=DB::table('constitutions')->where('constitutionName',$request->areaNAME)->value('constitutionID');
        $addressID=DB::table('addressconstitution')->where('consitutionID',$constitutionID)->pluck('addressID');
        $island_lists = DB::table('membershiprecord')->whereIn('member_permAddressID', explode(",", $addressID))
                                                    ->orWhere('member_permAtoll',$request->areaNAME)
                                                    ->orWhere('member_permIsland',$request->areaNAME)
                                                    ->orWhere('member_permAddress',$request->areaNAME)
                                                    ->orderBy('member_NID','desc')
                                                    ->get();
        foreach ($island_lists as $userinfo) {
          $a=DB::table('phone_numbers')->where('member_partyID',$userinfo->member_partyID)->get();
          $b=$a->pluck('phoneNumber')->implode(', ');
          $stringToSend.= '<tr>'.
          '<td>'.$userinfo->member_NID.'</td>'.
          '<td>'.$userinfo->member_fName.' '.$userinfo->member_lName.'</td>'.
          '<td>'.date("d M Y", strtotime($userinfo->member_dob)).'</td>'.
          '<td>'.$userinfo->member_permAtoll.', '.$userinfo->member_permIsland.', '.$userinfo->member_permAddress.'</td>'.
          '<td>'.$b.'</td>'.
          '<td>'.$userinfo->member_status.'</td>'.
          '<td>'."<a href=".'/edit'.'/'.$userinfo->member_NID.">"."Edit"."</a>".'</td>'.
          '</tr>';
        }
        echo $stringToSend;
    }

//role wise data send
    public function getAllData(Request $request){
    $stringToSend="";
        $island_lists=DB::table('membershiprecord')->where('member_permAtoll',$request->areaNAME)
                                                    ->orWhere('member_permIsland',$request->areaNAME)
                                                    ->orWhere('member_permAddress',$request->areaNAME)
                                                    ->orderBy('member_dob','desc')
                                                    ->get();

        foreach ($island_lists as $userinfo) {
          $a=DB::table('phone_numbers')->where('member_partyID',$userinfo->member_partyID)->get();
          $b=$a->pluck('phoneNumber')->implode(', ');
          $stringToSend.= '<tr>'.
          '<td>'.$userinfo->member_NID.'</td>'.
          '<td>'.$userinfo->member_fName.' '.$userinfo->member_lName.'</td>'.
          '<td>'.date("d M Y", strtotime($userinfo->member_dob)).'</td>'.
          '<td>'.$userinfo->member_permAtoll.', '.$userinfo->member_permIsland.', '.$userinfo->member_permAddress.'</td>'.
          '<td>'.$b.'</td>'.
          '<td>'.$userinfo->member_status.'</td>'.
          '<td>'."<a href=".'/edit'.'/'.$userinfo->member_NID.">"."Edit"."</a>".'</td>'.
          '</tr>';
        }
        echo $stringToSend;
    }
    //editRequestInsert
    public function editRequestInsert(Request $request){
      print_r($request->all());
      $member_currAtoll=DB::table('atolls')->where('atoll_id',$request->member_currAtoll)->value('atoll_name');
      $member_currIsland=DB::table('islands')->where('islandID',$request->member_currIsland)->value('islandNameENG');
      $member_currAddress=DB::table('addresses')->where('addressID',$request->member_currAddress)->value('addressNameENG');
      Updaterequest::insert([
        'manager_id'=>Auth::id(),
        'member_partyID'=>$request->member_partyID,
        'member_NID'=>$request->member_NID,
        'member_bloodGroup'=>$request->member_bloodGroup,
        'member_currAtoll'=>$member_currAtoll,
        'member_currIsland'=>$member_currIsland,
        'member_currAddress'=>$member_currAddress,
        'member_currAddressID'=>$request->member_currAddress,
        'member_employedAt'=>$request->member_employedAt,
        'member_employedAtComments'=>$request->member_employedAtComments,
        'member_education'=>$request->member_education,
        'member_educationComments'=>$request->member_educationComments,
        'member_email'=>$request->member_email,
        'member_twitterHandle'=>$request->member_twitterHandle,
        'member_FBID'=>$request->member_FBID,
        'created_at'=>Carbon::now(),
      ]);
       return redirect('manager/dashboard')->with('status','Your Updated Request has been send to Super Admin');

    }
}
