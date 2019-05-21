<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membershiprecord;
use App\Phone_number;

class SearchController extends Controller
{
  function fetch_data(Request $request)
  {
    if($request->ajax())
       {
         $output="";
         $userinfos=Membershiprecord::where('member_NID','LIKE','%'.$request->search."%")
                                    ->orWhere('member_fName','LIKE','%'.$request->search."%")
                                    ->orWhere('member_lName','LIKE','%'.$request->search."%")
                                    ->orWhere('member_dob','LIKE','%'.$request->search."%")
                                    ->orWhere('member_permAtoll','LIKE','%'.$request->search."%")
                                    ->orWhere('member_permIsland','LIKE','%'.$request->search."%")
                                    ->orWhere('member_permAddress','LIKE','%'.$request->search."%")
                                    ->orWhere('member_partyID','LIKE','%'.$request->search."%")
                                    ->get();
         if($userinfos)
         {
         foreach ($userinfos as $key => $userinfo) {
          $a=Phone_number::where('member_partyID',$userinfo->member_partyID)->get();
          $b=$a->pluck('phoneNumber')->implode(', ');
         $output.='<tr>'.
         '<td>'.$userinfo->member_NID.'</td>'.
         '<td>'.$userinfo->member_fName.' '.$userinfo->member_lName.'</td>'.
         '<td>'.date("d M Y", strtotime($userinfo->member_dob)).'</td>'.
         '<td>'.$userinfo->member_permAtoll.', '.$userinfo->member_permIsland.', '.$userinfo->member_permAddress.'</td>'.
         '<td>'.$b.'</td>'.
         '<td>'.$userinfo->member_status.'</td>'.
         '</tr>';
         }
         return Response($output);
         }
       }
     }
  function searchPhone(Request $request)
  {
    if($request->ajax())
       {
         $output="";
         $userinfos=Phone_number::where('phoneNumber','LIKE','%'.$request->search."%")
                                    ->get();
         if($userinfos)
         {
         foreach ($userinfos as $key => $userinfo) {
          $member_NID=Membershiprecord::where('member_partyID',$userinfo->member_partyID)->value('member_NID');
          $member_fName=Membershiprecord::where('member_partyID',$userinfo->member_partyID)->value('member_fName');
          $member_lName=Membershiprecord::where('member_partyID',$userinfo->member_partyID)->value('member_lName');
          $member_dob=Membershiprecord::where('member_partyID',$userinfo->member_partyID)->value('member_dob');
          $member_permAtoll=Membershiprecord::where('member_partyID',$userinfo->member_partyID)->value('member_permAtoll');
          $member_permIsland=Membershiprecord::where('member_partyID',$userinfo->member_partyID)->value('member_permIsland');
          $member_permAddress=Membershiprecord::where('member_partyID',$userinfo->member_partyID)->value('member_permAddress');
          $member_status=Membershiprecord::where('member_partyID',$userinfo->member_partyID)->value('member_status');
         $output.='<tr>'.
         '<td>'.$member_NID.'</td>'.
         '<td>'.$member_fName.' '.$member_lName.'</td>'.
         '<td>'.date("d M Y", strtotime($userinfo->member_dob)).'</td>'.
         '<td>'.$member_permAtoll.', '.$member_permIsland.', '.$member_permAddress.'</td>'.
         '<td>'.$userinfos->pluck('phoneNumber')->implode(', ').'</td>'.
         '<td>'.$userinfo->member_status.'</td>'.
         '</tr>';
         }
         return Response($output);
         }
       }
     }
     public function shortData(Request $request){
       if($request->ajax())
          {
            $output="";
            $userinfos=Membershiprecord::orderBy('member_NID','asc')
                                       ->get();
            if($userinfos)
            {
            foreach ($userinfos as $key => $userinfo) {
             $a=Phone_number::where('member_partyID',$userinfo->member_partyID)->get();
             $b=$a->pluck('phoneNumber')->implode(', ');
            $output.='<tr>'.
            '<td>'.$userinfo->member_NID.'</td>'.
            '<td>'.$userinfo->member_fName.' '.$userinfo->member_lName.'</td>'.
            '<td>'.date("d M Y", strtotime($userinfo->member_dob)).'</td>'.
            '<td>'.$userinfo->member_permAtoll.', '.$userinfo->member_permIsland.', '.$userinfo->member_permAddress.'</td>'.
            '<td>'.$b.'</td>'.
            '<td>'.$userinfo->member_status.'</td>'.
            '</tr>';
            }
            return Response($output);
            }
          }
     }
     public function unshortData(Request $request){
       if($request->ajax())
          {
            $output="";
            $userinfos=Membershiprecord::orderBy('member_NID','desc')
                                       ->get();
            if($userinfos)
            {
            foreach ($userinfos as $key => $userinfo) {
             $a=Phone_number::where('member_partyID',$userinfo->member_partyID)->get();
             $b=$a->pluck('phoneNumber')->implode(', ');
            $output.='<tr>'.
            '<td>'.$userinfo->member_NID.'</td>'.
            '<td>'.$userinfo->member_fName.' '.$userinfo->member_lName.'</td>'.
            '<td>'.date("d M Y", strtotime($userinfo->member_dob)).'</td>'.
            '<td>'.$userinfo->member_permAtoll.', '.$userinfo->member_permIsland.', '.$userinfo->member_permAddress.'</td>'.
            '<td>'.$b.'</td>'.
            '<td>'.$userinfo->member_status.'</td>'.
            '</tr>';
            }
            return Response($output);
            }
          }
     }
//name
     public function nameshortData(Request $request){
       if($request->ajax())
          {
            $output="";
            $userinfos=Membershiprecord::orderBy('member_fName','asc')
                                       ->get();
            if($userinfos)
            {
            foreach ($userinfos as $key => $userinfo) {
             $a=Phone_number::where('member_partyID',$userinfo->member_partyID)->get();
             $b=$a->pluck('phoneNumber')->implode(', ');
            $output.='<tr>'.
            '<td>'.$userinfo->member_NID.'</td>'.
            '<td>'.$userinfo->member_fName.' '.$userinfo->member_lName.'</td>'.
            '<td>'.date("d M Y", strtotime($userinfo->member_dob)).'</td>'.
            '<td>'.$userinfo->member_permAtoll.', '.$userinfo->member_permIsland.', '.$userinfo->member_permAddress.'</td>'.
            '<td>'.$b.'</td>'.
            '<td>'.$userinfo->member_status.'</td>'.
            '</tr>';
            }
            return Response($output);
            }
          }
     }
     public function nameunshortData(Request $request){
       if($request->ajax())
          {
            $output="";
            $userinfos=Membershiprecord::orderBy('member_dob','desc')
                                       ->get();
            if($userinfos)
            {
            foreach ($userinfos as $key => $userinfo) {
             $a=Phone_number::where('member_partyID',$userinfo->member_partyID)->get();
             $b=$a->pluck('phoneNumber')->implode(', ');
            $output.='<tr>'.
            '<td>'.$userinfo->member_NID.'</td>'.
            '<td>'.$userinfo->member_fName.' '.$userinfo->member_lName.'</td>'.
            '<td>'.date("d M Y", strtotime($userinfo->member_dob)).'</td>'.
            '<td>'.$userinfo->member_permAtoll.', '.$userinfo->member_permIsland.', '.$userinfo->member_permAddress.'</td>'.
            '<td>'.$b.'</td>'.
            '<td>'.$userinfo->member_status.'</td>'.
            '</tr>';
            }
            return Response($output);
            }
          }
     }
//bd
     public function bdshortData(Request $request){
       if($request->ajax())
          {
            $output="";
            $userinfos=Membershiprecord::orderBy('member_dob','asc')
                                       ->get();
            if($userinfos)
            {
            foreach ($userinfos as $key => $userinfo) {
             $a=Phone_number::where('member_partyID',$userinfo->member_partyID)->get();
             $b=$a->pluck('phoneNumber')->implode(', ');
            $output.='<tr>'.
            '<td>'.$userinfo->member_NID.'</td>'.
            '<td>'.$userinfo->member_fName.' '.$userinfo->member_lName.'</td>'.
            '<td>'.date("d M Y", strtotime($userinfo->member_dob)).'</td>'.
            '<td>'.$userinfo->member_permAtoll.', '.$userinfo->member_permIsland.', '.$userinfo->member_permAddress.'</td>'.
            '<td>'.$b.'</td>'.
            '<td>'.$userinfo->member_status.'</td>'.
            '</tr>';
            }
            return Response($output);
            }
          }
     }
     public function bdunshortData(Request $request){
       if($request->ajax())
          {
            $output="";
            $userinfos=Membershiprecord::orderBy('member_NID','desc')
                                       ->get();
            if($userinfos)
            {
            foreach ($userinfos as $key => $userinfo) {
             $a=Phone_number::where('member_partyID',$userinfo->member_partyID)->get();
             $b=$a->pluck('phoneNumber')->implode(', ');
            $output.='<tr>'.
            '<td>'.$userinfo->member_NID.'</td>'.
            '<td>'.$userinfo->member_fName.' '.$userinfo->member_lName.'</td>'.
            '<td>'.date("d M Y", strtotime($userinfo->member_dob)).'</td>'.
            '<td>'.$userinfo->member_permAtoll.', '.$userinfo->member_permIsland.', '.$userinfo->member_permAddress.'</td>'.
            '<td>'.$b.'</td>'.
            '<td>'.$userinfo->member_status.'</td>'.
            '</tr>';
            }
            return Response($output);
            }
          }
     }
//address
     public function addressshortData(Request $request){
       if($request->ajax())
          {
            $output="";
            $userinfos=Membershiprecord::orderBy('member_permAtoll','asc')
                                       ->get();
            if($userinfos)
            {
            foreach ($userinfos as $key => $userinfo) {
             $a=Phone_number::where('member_partyID',$userinfo->member_partyID)->get();
             $b=$a->pluck('phoneNumber')->implode(', ');
            $output.='<tr>'.
            '<td>'.$userinfo->member_NID.'</td>'.
            '<td>'.$userinfo->member_fName.' '.$userinfo->member_lName.'</td>'.
            '<td>'.date("d M Y", strtotime($userinfo->member_dob)).'</td>'.
            '<td>'.$userinfo->member_permAtoll.', '.$userinfo->member_permIsland.', '.$userinfo->member_permAddress.'</td>'.
            '<td>'.$b.'</td>'.
            '<td>'.$userinfo->member_status.'</td>'.
            '</tr>';
            }
            return Response($output);
            }
          }
     }
     public function addressunshortData(Request $request){
       if($request->ajax())
          {
            $output="";
            $userinfos=Membershiprecord::orderBy('member_permAtoll','desc')
                                       ->get();
            if($userinfos)
            {
            foreach ($userinfos as $key => $userinfo) {
             $a=Phone_number::where('member_partyID',$userinfo->member_partyID)->get();
             $b=$a->pluck('phoneNumber')->implode(', ');
            $output.='<tr>'.
            '<td>'.$userinfo->member_NID.'</td>'.
            '<td>'.$userinfo->member_fName.' '.$userinfo->member_lName.'</td>'.
            '<td>'.date("d M Y", strtotime($userinfo->member_dob)).'</td>'.
            '<td>'.$userinfo->member_permAtoll.', '.$userinfo->member_permIsland.', '.$userinfo->member_permAddress.'</td>'.
            '<td>'.$b.'</td>'.
            '<td>'.$userinfo->member_status.'</td>'.
            '</tr>';
            }
            return Response($output);
            }
          }
     }
//status
     public function statusshortData(Request $request){
       if($request->ajax())
          {
            $output="";
            $userinfos=Membershiprecord::orderBy('member_status','asc')
                                       ->get();
            if($userinfos)
            {
            foreach ($userinfos as $key => $userinfo) {
             $a=Phone_number::where('member_partyID',$userinfo->member_partyID)->get();
             $b=$a->pluck('phoneNumber')->implode(', ');
            $output.='<tr>'.
            '<td>'.$userinfo->member_NID.'</td>'.
            '<td>'.$userinfo->member_fName.' '.$userinfo->member_lName.'</td>'.
            '<td>'.date("d M Y", strtotime($userinfo->member_dob)).'</td>'.
            '<td>'.$userinfo->member_permAtoll.', '.$userinfo->member_permIsland.', '.$userinfo->member_permAddress.'</td>'.
            '<td>'.$b.'</td>'.
            '<td>'.$userinfo->member_status.'</td>'.
            '</tr>';
            }
            return Response($output);
            }
          }
     }
     public function statusunshortData(Request $request){
       if($request->ajax())
          {
            $output="";
            $userinfos=Membershiprecord::orderBy('member_status','desc')
                                       ->get();
            if($userinfos)
            {
            foreach ($userinfos as $key => $userinfo) {
             $a=Phone_number::where('member_partyID',$userinfo->member_partyID)->get();
             $b=$a->pluck('phoneNumber')->implode(', ');
            $output.='<tr>'.
            '<td>'.$userinfo->member_NID.'</td>'.
            '<td>'.$userinfo->member_fName.' '.$userinfo->member_lName.'</td>'.
            '<td>'.date("d M Y", strtotime($userinfo->member_dob)).'</td>'.
            '<td>'.$userinfo->member_permAtoll.', '.$userinfo->member_permIsland.', '.$userinfo->member_permAddress.'</td>'.
            '<td>'.$b.'</td>'.
            '<td>'.$userinfo->member_status.'</td>'.
            '</tr>';
            }
            return Response($output);
            }
          }
     }



}
