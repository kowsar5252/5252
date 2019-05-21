<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class RolesettingController extends Controller
{
    public function editRole($id){
      $id;
      $constitutions=DB::table('constitutions')->get();
      $mms_rights=DB::table('mms_rights')->where('userId',$id)->get();
      $atollList=DB::table('atolls')->get();
      return view('addRole',compact('id','atollList','mms_rights','constitutions'));
    }

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
    //getConstitution
    public function getConstitution(Request $request){
      // echo $address_lists=DB::table('addressconstitution')->where('addressID',$request->addressID)->get();

      $stringToSend="<option>--Select One--</option>";
      $constitution_lists=DB::table('addressconstitution')->where('addressID',$request->addressID)->get();

      foreach ($constitution_lists as $constitution_list) {
        $stringToSend.= "<option value='".$constitution_list->consitutionID."'>".$constitution_list->consitutionID."</option>";
      }
      echo $stringToSend;
    }

    public function add_role(Request $request){
      // print_r($request->all());

      if ($request->level==1) {
        $atoll_name=DB::table('atolls')->where('atoll_id',$request->atoll)->value('atoll_name');
        DB::table('mms_rights')->insert([
          'userId'=>$request->userId,
          'levelId'=>$request->level,
          'areaId'=>$request->atoll,
          'level'=>'Atoll',
          'area_name'=>$atoll_name,
        ]);
      } elseif ($request->level==2) {
        $island_name=DB::table('islands')->where('islandID',$request->island)->value('islandNameENG');
        DB::table('mms_rights')->insert([
          'userId'=>$request->userId,
          'levelId'=>$request->level,
          'areaId'=>$request->island,
          'level'=>'Island',
          'area_name'=>$island_name,
        ]);
      }elseif ($request->level==3) {
        $address_name=DB::table('addresses')->where('addressID',$request->address)->value('addressNameENG');
        DB::table('mms_rights')->insert([
          'userId'=>$request->userId,
          'levelId'=>$request->level,
          'areaId'=>$request->address,
          'level'=>'Address',
          'area_name'=>$address_name,
        ]);
      }else {
        $constitution_name=DB::table('constitutions')->where('constitutionID',$request->constitutions)->value('constitutionName');
        DB::table('mms_rights')->insert([
          'userId'=>$request->userId,
          'levelId'=>$request->level,
          'areaId'=>$request->constitutions,
          'level'=>'Constitution',
          'area_name'=>$constitution_name,
        ]);
      }
    return back();
    }
    //deleteRole
    public function deleteRole($id){
      DB::table('mms_rights')->where('id',$id)->delete();
      return back();
    }
}
