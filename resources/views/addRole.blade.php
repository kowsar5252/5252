@extends('layouts.BackEndMain')
@section('title','Role Setting')
@section('content')
  <nav aria-label="breadcrumb bg-danger">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page"><a href={{ url('user/role/setting') }} class="btn btn-success text-white"><< Back</a></li>
    </ol>
  </nav>
<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title text-center" style="font-size:30px">User Role Setting </h1>
        <p class="card-description">
          <strong>Username: </strong> {{ App\Mmg_users::findOrfail($id)->name }}
        </p>
        <div class="table-responsive">
          <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Level</th>
          <th scope="col">Area ID</th>
          <th scope="col">Area Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="areaListDiv">

        @forelse ($mms_rights as $mms_right)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $mms_right->levelId==1?"Atoll":($mms_right->levelId==2?"Island":($mms_right->levelId==3?"Address":($mms_right->levelId==4?"Constituency":""))) }}</td>
            <td>{{ $mms_right->areaId }}</td>
            <td>{{ $mms_right->area_name }}</td>
            </td>
            <td><a href="{{ url('delete/role'.'/'.$mms_right->id) }}"><span class="badge badge-danger">Delete</span></a></td>
        </tr>
      @empty
        <tr>
          <td colspan="5">
            <span class="text-danger text-center"><h5><a >No Role Added yet!!</a></h5></span>
          </td>
        </tr>
      @endforelse
      </tbody>
    </table>
          </div>
        </div>
    </div>
  </div>
  <div class="col-lg-6  grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title text-center" style="font-size:30px">Add Role</h1>
        <div class="row">


          <div class="col-md-4">
            <div class="card-body">
              <h2 class="card-title" style="font-size:18px">Level</h2>
              <div class="form-group">
            <form class="" action="{{ route('add_role') }}" method="post">
              @csrf
              <input type="hidden" name="userId" value="{{ $id }}">
              <select id="level" name="level"  class="form-control" onchange="levelChange();">
                <option value="1">Atoll</option>
                <option value="2">Island</option>
                <option value="3">Address</option>
                <option value="4">Constituency</option>
              </select>
            </div>
            </div>
          </div>
          <div class="col-md-8 card-body">
            <h2 class="card-title" style="font-size:18px">Allocate Area</h2>
            <div class="form-group" id="atollDIV" style="display:block">
              <select class="form-control form-control-lg" id="atoll" name="atoll">
                <option >--Select Atoll--</option>
                @foreach ($atollList as $atoll_list)
                  <option value="{{ $atoll_list->atoll_id }}">{{ $atoll_list->atoll_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group" style="display:none" id="islandDIV">
              <label for="exampleFormControlSelect2">Island</label>
              <select class="form-control" id="islands" name="island" >
                <option>--Select Island--</option>
              </select>
            </div>
            <div class="form-group" style="display:none" id="addressDIV">
              <label for="exampleFormControlSelect2">Address</label>
              <select class="form-control" id="address" name="address" >
                <option>--Select address--</option>
              </select>
            </div>
            <div class="form-group" id="constitutionDIV" style="display:none">
              <label for="exampleFormControlSelect3">Constituency</label>
              <select class="form-control form-control-sm" id="constitution" name="constitutions">
                <option>--Select constituency--</option>
                @foreach ($constitutions as $constitution)
                  <option value="{{ $constitution->constitutionID }}">{{ $constitution->constitutionName }}</option>
                @endforeach
              </select>
            </div>
            <button id="addBtn" onClick="onAdd();" class="btn btn-success " >Save Role</button>
            <a href={{ url('user/role/setting') }} class="btn btn-danger text-white">Cancel</a>

          </div>
        </div>

      </form>
        </div>
    </div>
  </div>

</div>
@endsection
@section('script_section')
<script type="text/javascript">
  $(document).ready(function() {
    $('#level').change(function() {
      // $('#hiddenA').slideToggle("slow");
       var x = document.getElementById("atollDIV");
      var levelID=$(this).val();
      if (levelID==2) {
        $('#islandDIV').slideToggle("slow");
      }else if (levelID==3) {
        $('#islandDIV').slideToggle("slow");
        $('#addressDIV').slideToggle("slow");
      }else if (levelID==4) {
        $('#constitutionDIV').slideToggle("slow");
        x.style.display = "none";
      }
    });
  });
</script>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
      url: 'user/getConstitution',
      method:'POST',
      data: {addressID: addressID},
      success: function(data) {
        $('#constitution').html(data);
      }
  });
  });

});

  </script>


@endsection
