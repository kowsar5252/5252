<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membershiprecord;
use App\Phone_number;
use App\Mmg_users;
use DB;
use Carbon\Carbon;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $userinfos=Membershiprecord::orderBy('member_partyID','desc')->paginate(10);
      $phones=Phone_number::orderBy('member_partyID','desc')->paginate(10);
      return view('home',compact('userinfos','phones'));
    }
    // roleSetting
    public function roleSetting()
    {
      $atollList =DB::table('atolls')->get();
      $userinfos=Mmg_users::where('role',2)->orderBy('id','desc')->paginate(10);
      return view('roleSetting',compact('userinfos','atollList'));
    }
    // /recycleBin
    public function recycleBin(){
      $mmg_users = Mmg_users::onlyTrashed()->get();
      return view('trash',compact('mmg_users'));
    }

    // /emailChange
    public function emailChange($id){
      $old_email=DB::table('mmg_users')->where('id',$id)->first();
      return view('auth.changeEmail',compact('old_email'));
    }
    // /emailInsert
    public function emailInsert(Request $request){
      $old_email=DB::table('mmg_users')->where('id',$request->user_id)->value('email');
       $new_email=$request->new_email;
      if ($old_email==$request->old_email) {
        DB::table('mmg_users')->where('id',$request->user_id)->update([
          'email'=> $new_email,
          'updated_at'=> Carbon::now(),
        ]);
        return back()->with('status','Email Change successfully!!');
      } else {
        return back()->with('danger_status','old email does not match!!');
      }
    }

    // /changePassword
    public function passwordChange($id){
    $id=$id;
      return view('auth.passwords.changePassword',compact('id'));
    }
    // /emailInsert
    public function passwordInsert(Request $request){
      $old_password=DB::table('mmg_users')->where('id',$request->user_id)->value('password');

      if(password_verify($request->old_password, $old_password)) {
          if ($request->new_password==$request->re_password) {
            DB::table('mmg_users')->where('id',$request->user_id)->update([
                'password'=> Hash::make($request->new_password),
                'updated_at'=> Carbon::now(),
              ]);
              return back()->with('status','Password Change successfully!!');
            } else {
              return back()->with('danger_status','re password does not match!!');
          }
      }else {
        return back()->with('danger_status','old password does not match!!');
      }

    }
}
