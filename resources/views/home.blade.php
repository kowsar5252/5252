@extends('layouts.BackEndMain')
@section('title','Admin dashboard')
@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title text-center" style="font-size:30px">MemberShip Management</h1>
        <p class="card-description">
          <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand">MMS</a>
            <form class="form-inline">
              <input class="form-control mr-sm-2" type="search" id="search" placeholder="Enter NID" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </nav>
        </p>
        <div class="table-responsive">
          <table id="table_id" class="table table-bordered">
            <thead>
              <tr>
                <th>
                  <input class="form-control mr-sm-2" type="search" id="searchNid" placeholder="Enter NID" aria-label="Search">
                  </th>
                <th>
                  <input class="form-control mr-sm-2" type="search" id="searchName" placeholder="Enter Name" aria-label="Search">
                  <span id="  "></span></th>
                <th>
                  <input class="form-control mr-sm-2" type="search" id="searchBirthdate" placeholder="Enter Birthdate" aria-label="Search">
                  <span id="  "></span></th>
                <th >
                  <input class="form-control mr-sm-2" type="search" id="searchAddress" placeholder="Enter Address" aria-label="Search">
                  <span id="  "></span></th>
                <th >
                  <input class="form-control mr-sm-2" type="search" id="searchPhone" placeholder="Enter Phone" aria-label="Search">
                  <span id="  "></span></th>
                <th >
                  <input class="form-control mr-sm-2" type="search" id="searchStatus" placeholder="Enter Status" aria-label="Search">
                  <span id="  "></span></th>

              </tr>
            </thead>
            <thead>
              <tr>
                <th >NID
                  <span ><i class="fa fa-sort-up" id="up1" style="display: block;cursor: pointer;margin-left: 35px;margin-top: -16px;" ></i>
                    <i class="fa fa-sort-down" id="down1"  style="margin-top: -4px;cursor: pointer;margin-left: 35px;display: block;"></i></span>
                </th>
                <th >Full Name
                  <span ><i class="fa fa-sort-up" id="up2" style="display: block;cursor: pointer;margin-left: 80px;margin-top: -16px;" ></i>
                    <i class="fa fa-sort-down" id="down2"  style="margin-top: -4px;cursor: pointer;margin-left: 80px;display: block;"></i></span>
                  </th>
                <th >Birthdate
                  <span ><i class="fa fa-sort-up" id="up3" style="display: block;cursor: pointer;margin-left: 70px;margin-top: -16px;" ></i>
                    <i class="fa fa-sort-down" id="down3"  style="margin-top: -4px;cursor: pointer;margin-left: 70px;display: block;"></i></span>
                  </th>
                <th >Address
                  <span ><i class="fa fa-sort-up" id="up4" style="display: block;cursor: pointer;margin-left: 65px;margin-top: -16px;" ></i>
                    <i class="fa fa-sort-down" id="down4"  style="margin-top: -4px;cursor: pointer;margin-left: 65px;display: block;"></i></span>
                  </th>
                <th >Phone
                  <span ><i class="fa fa-sort-up" id="up5" style="display: block;cursor: pointer;margin-left: 50px;margin-top: -16px;" ></i>
                    <i class="fa fa-sort-down" id="down5"  style="margin-top: -4px;cursor: pointer;margin-left: 50px;display: block;"></i></span>
                  </th>
                <th >Status
                  <span ><i class="fa fa-sort-up" id="up6" style="display: block;cursor: pointer;margin-left: 50px;margin-top: -16px;" ></i>
                    <i class="fa fa-sort-down" id="down6"  style="margin-top: -4px;cursor: pointer;margin-left: 50px;display: block;"></i></span>
                  </th>

              </tr>
            </thead>
            <tbody >
              @foreach ($userinfos as $userinfo)
                <tr>
                <td>
                  {{ $userinfo->member_NID}}
                </td>

                <td>
                  {{ $userinfo->member_fName }} {{ $userinfo->member_lName }}
                </td>
                <td>
                  {{ date("d M Y", strtotime($userinfo->member_dob))}}
                </td>
                <td>
                  {{ $userinfo->member_permAtoll }}
                  ,
                  {{ $userinfo->member_permIsland }}
                  ,
                {{ $userinfo->member_permAddress }}

                </td>
                <td>
                  @php
                  $phone=App\Phone_number::where('member_partyID',$userinfo->member_partyID)->get()
                  @endphp
                  {{ $phone->pluck('phoneNumber')->implode(', ') }}
                </td>

                <td>
                   @if ($userinfo->member_status==3)
                    <a ><span class="badge badge-success">Active</span></a>
                  @else
                      <a ><span class="badge badge-danger">Deactive</span></a>
                  @endif
                </td>
              </tr>

              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <span class="ml-4 float-right">{{ $userinfos->links() }}</span>
    </div>
  </div>

@section('script_section')
<!--nid-->
<script type="text/javascript">
  $(document).ready(function(){
    $('#up1').click(function(){
      $.ajax({
        type : 'get',
        url : 'short/data',
        success:function(data){
        $('tbody').html(data);
      }
    });
  });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#down1').click(function(){
        $.ajax({
          type : 'get',
          url : 'unshort/data',
          success:function(data)
          {
          $('tbody').html(data);
          }
      });
    });

  });
</script>
<!--name-->
<script type="text/javascript">
  $(document).ready(function(){
    $('#up2').click(function(){
      $.ajax({
        type : 'get',
        url : 'name/short/data',
        success:function(data){
        $('tbody').html(data);
      }
    });
  });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#down2').click(function(){
        $.ajax({
          type : 'get',
          url : 'name/unshort/data',
          success:function(data)
          {
          $('tbody').html(data);
          }
      });
    });

  });
</script>
<!--bd-->
<script type="text/javascript">
  $(document).ready(function(){
    $('#up3').click(function(){
      $.ajax({
        type : 'get',
        url : 'bd/short/data',
        success:function(data){
        $('tbody').html(data);
      }
    });
  });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#down3').click(function(){
        $.ajax({
          type : 'get',
          url : 'bd/unshort/data',
          success:function(data)
          {
          $('tbody').html(data);
          }
      });
    });

  });
</script>
<!--address-->
<script type="text/javascript">
  $(document).ready(function(){
    $('#up4').click(function(){
      $.ajax({
        type : 'get',
        url : 'address/short/data',
        success:function(data){
        $('tbody').html(data);
      }
    });
  });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#down4').click(function(){
        $.ajax({
          type : 'get',
          url : 'address/unshort/data',
          success:function(data)
          {
          $('tbody').html(data);
          }
      });
    });

  });
</script>
<!--status-->
<script type="text/javascript">
  $(document).ready(function(){
    $('#up6').click(function(){
      $.ajax({
        type : 'get',
        url : 'status/short/data',
        success:function(data){
        $('tbody').html(data);
      }
    });
  });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#down6').click(function(){
        $.ajax({
          type : 'get',
          url : 'status/unshort/data',
          success:function(data)
          {
          $('tbody').html(data);
          }
      });
    });

  });
</script>

<script type="text/javascript">
    $('#search,#searchNid,#searchName,#searchBirthdate,#searchAddress,#searchStatus').on('keyup',function(){
      $value=$(this).val();
        $.ajax({
          type : 'get',
          url : '/search',
          data:{'search':$value},
          success:function(data){
          $('tbody').html(data);
        }
      });
    })
</script>
<script type="text/javascript">
    $('#searchPhone').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
    type : 'get',
    url : '/search/phone',
    data:{'search':$value},
    success:function(data){
    $('tbody').html(data);
    }
    });
    })
</script>
<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
</script>
@endsection
@endsection
