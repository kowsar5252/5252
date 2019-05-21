@extends('layouts.managerDashboard')
@section('title','Edit Data')
@section('content')
  @php
    $single_info=DB::table('membershiprecord')->where('member_NID',$nid)->first();
  @endphp
  <div class="card-body">
    <div class="col-md-12  grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Member Edit Form</h4>
          <form class="forms-sample" action="{{ url('edit/request/insert') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="member_partyID" value="{{ $single_info->member_partyID }}">
                    <input type="hidden" class="form-control" name="member_NID" value="{{ $single_info->member_NID }}">

                    <label for="exampleInputName1">Member Blood Group (O+)</label>
                    <select class="form-control" name="member_bloodGroup">
                      <option selected="" value="{{ $single_info->member_bloodGroup }}">{{ $single_info->member_bloodGroup }}</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputName1">Member Current Atoll</label>
                    <select class="form-control" id="atoll" name="member_currAtoll" class="form-control">
                      <option selected="" value="{{ $single_info->member_currAtoll }}">{{ $single_info->member_currAtoll }}</option>
                      @foreach ($atoll_lists as $atoll_list)
                        <option value="{{ $atoll_list->atoll_id }}">{{ $atoll_list->atoll_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputName1">Member Current Island</label>
                    <select id="islands" name="member_currIsland" class="form-control">
                      <option selected="" value="{{ $single_info->member_currIsland }}">{{ $single_info->member_currIsland }}</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputName1">Member Current Address</label>
                    <select id="address" name="member_currAddress" class="form-control">
                      <option selected="" value="{{ $single_info->member_currAddress }}">{{ $single_info->member_currAddress }}</option>
                    </select>
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
            <button type="submit" class="btn btn-success mr-2">Update</button>
            <a href="{{ url('manager/dashboard') }}" class="btn btn-light">Cancel</a>
          </form>
        </div>
      </div>
    </div>
    @section('script_section')


    <script type="text/javascript">

    $(document).ready(function(){
      $('#atoll').change(function(){
        var atollName=$("#atoll  option:selected").text();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url: 'user/getIslands',
          method:'POST',
          data: {atollName: atollName},
          success: function(data) {
            $('#islands').html(data);
          }
      });
      });


    $('#islands').change(function(){
      var islandID=$(this).val();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        url: 'user/getAdress',
        method:'POST',
        data: {islandID: islandID},
        success: function(data) {
          $('#address').html(data);
        }
    });
    });
    $('#address').change(function(){
      var addressID=$(this).val();
      $('#addressID').val($(this).val());
    });
  });

    </script>
    @endsection
@endsection
