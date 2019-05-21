<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CaptchaController extends Controller
{
  public function membershipCheck()
  {
    return view('membershipCheck');
  }
  public function storeCaptchaForm(Request $request)
  {
      request()->validate([
      'nid' => 'required',
      'g-recaptcha-response' => 'required|captcha',
      ]);

      $status=DB::table('membershiprecord')->where('member_NID',$request->nid)->value('member_status');
      if (DB::table('membershiprecord')->where('member_NID',$request->nid)->exists()) {
        return redirect('membership/check')->with('status', $status);
      }else {
        return redirect('membership/check')->with('danger_status', 'Your NID is not found!!');
      }
  }
}
