@extends('layouts.BackEndMain')
@section('title','Update')
@section('content')
  <nav aria-label="breadcrumb bg-danger">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page"><a href={{ url('member/update/request') }} class="btn btn-success text-white"><< Back</a></li>
    </ol>
  </nav>
  <div class="card-body">
    <div class="col-md-12  grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Member Edit Form</h4>
          <form class="forms-sample" action="{{ url('edit/request/insert/confirm') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="member_partyID" value="{{ $single_info->member_partyID }}">
                    <input type="hidden" class="form-control" name="member_NID" value="{{ $single_info->member_NID }}">

                    <label for="exampleInputName1">Member Blood Group (O+)</label>
                    <input class="form-control" type="text" name="member_bloodGroup" value="{{ $single_info->member_bloodGroup }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputName1">Member Current Atoll</label>
                    <input class="form-control" type="text" name="member_currAtoll" value="{{ $single_info->member_currAtoll }}">
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputName1">Member Current Island</label>
                    <input class="form-control" type="text" name="member_currIsland" value="{{ $single_info->member_currIsland }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputName1">Member Current Address</label>
                    <input class="form-control" type="text" name="member_currAddress" value="{{ $single_info->member_currAddress }}">
                    <input class="form-control" type="hidden" name="member_currAddressID" value="{{ $single_info->member_currAddressID }}">
                  </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputName1">Member Employed at</label>
                    <input type="text" class="form-control" name="member_employedAt" value="{{ $single_info->member_employedAt }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputName1">Member Emplyed At Comments</label>
                    <input type="text" class="form-control" name="member_employedAtComments" value="{{ $single_info->member_employedAtComments }}">
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputName1">Member Education</label>
                    <input type="text" class="form-control" name="member_education" value="{{ $single_info->member_education }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputName1">Member Education Comments</label>
                    <input type="text" class="form-control" name="member_educationComments" value="{{ $single_info->member_educationComments }}">
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputName1">Member Email</label>
                    <input type="text" class="form-control" name="member_email" value="{{ $single_info->member_email }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputName1">Member Twitter Handle</label>
                    <input type="text" class="form-control" name="member_twitterHandle" value="{{ $single_info->member_twitterHandle }}">
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputName1">Member FBID</label>
                    <input type="text" class="form-control" name="member_FBID" value="{{ $single_info->member_FBID }}">
                  </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mr-2">Confirm Update</button>
            <a class="btn btn-light">Cancel</a>
          </form>
        </div>
      </div>
    </div>

@endsection
