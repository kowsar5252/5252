@extends('layouts.managerDashboard')
@section('title','Manager Dashboard')
@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    @if ( session('status') )
                      <div class="col-12 alert alert-warning mt-5 text-center" role="alert">
                        <h4 class="alert-heading">Well done!</h4>
                        <hr>
                        <p >{{ session('status') }}</p>
                      </div>
                    @endif
                    <h1 class="card-title text-center" style="font-size:30px">MemberShip Management</h1>
                    <p class="card-description">
                      <nav class="navbar navbar-light bg-light justify-content-between">
                        <select class="form-control" id="areaNAME" name="" style="width:220px">
                          {{-- <option >--Your Role--</option> --}}
                          @foreach ($area_names as $area_name)
                            <option  value="{{ $area_name->area_name }}">{{ $area_name->level }}  - {{$area_name->area_name}}</option>
                          @endforeach
                        </select>
                        <form class="form-inline">
                          <input class="form-control mr-sm-2" id="search" type="search" placeholder="Enter NID" aria-label="Search">
                          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                      </nav>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered" id="patientTable">
                        <thead>
                          <tr>
                            <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">
<input class="form-control mr-sm-2" type="search" id="searchNid" placeholder="Enter NID" aria-label="Search">
                              <span id="id_icon"></span></th>
                            <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">
<input class="form-control mr-sm-2" type="search" id="searchName" placeholder="Enter Name" aria-label="Search">
                              <span id="id_icon"></span></th>
                            <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">
<input class="form-control mr-sm-2" type="search" id="searchBirthdate" placeholder="Enter Birthdate" aria-label="Search">
                              <span id="id_icon"></span></th>
                            <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">
<input class="form-control mr-sm-2" type="search" id="searchAddress" placeholder="Enter Address" aria-label="Search">
                              <span id="id_icon"></span></th>
                            <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">
<input class="form-control mr-sm-2" type="search" id="searchPhone" placeholder="Enter Phone" aria-label="Search">
                              <span id="id_icon"></span></th>
                            <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">
<input class="form-control mr-sm-2" type="search" id="searchStatus" placeholder="Enter Status" aria-label="Search">
                              <span id="id_icon"></span></th>
                            <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">
<input class="form-control mr-sm-2" type="search" id="searchStatus" placeholder="Enter Status" aria-label="Search">
                              <span id="id_icon"></span></th>
                          </tr>

                          <tr>
                            <th >NID
                              <span ><i class="fa fa-sort-up" id="up" style="display: block;cursor: pointer;margin-left: 35px;margin-top: -16px;" ></i>
                                <i class="fa fa-sort-down" id="down"  style="margin-top: -4px;cursor: pointer;margin-left: 35px;display: block;"></i></span>
                            </th>
                            <th >Full Name
                              <span ><i class="fa fa-sort-up" id="up" style="display: block;cursor: pointer;margin-left: 80px;margin-top: -16px;" ></i>
                                <i class="fa fa-sort-down" id="down"  style="margin-top: -4px;cursor: pointer;margin-left: 80px;display: block;"></i></span>
                              </th>
                            <th >Birthdate
                              <span ><i class="fa fa-sort-up" id="up" style="display: block;cursor: pointer;margin-left: 70px;margin-top: -16px;" ></i>
                                <i class="fa fa-sort-down" id="down"  style="margin-top: -4px;cursor: pointer;margin-left: 70px;display: block;"></i></span>
                              </th>
                            <th >Address
                              <span ><i class="fa fa-sort-up" id="up" style="display: block;cursor: pointer;margin-left: 65px;margin-top: -16px;" ></i>
                                <i class="fa fa-sort-down" id="down"  style="margin-top: -4px;cursor: pointer;margin-left: 65px;display: block;"></i></span>
                              </th>
                            <th >Phone
                              <span ><i class="fa fa-sort-up" id="up" style="display: block;cursor: pointer;margin-left: 50px;margin-top: -16px;" ></i>
                                <i class="fa fa-sort-down" id="down"  style="margin-top: -4px;cursor: pointer;margin-left: 50px;display: block;"></i></span>
                              </th>
                            <th >Status
                              <span ><i class="fa fa-sort-up" id="up" style="display: block;cursor: pointer;margin-left: 50px;margin-top: -16px;" ></i>
                                <i class="fa fa-sort-down" id="down"  style="margin-top: -4px;cursor: pointer;margin-left: 50px;display: block;"></i></span>
                            </th>
                            <th >Action
                              <span ><i class="fa fa-sort-up" id="up" style="display: block;cursor: pointer;margin-left: 50px;margin-top: -16px;" ></i>
                                <i class="fa fa-sort-down" id="down"  style="margin-top: -4px;cursor: pointer;margin-left: 50px;display: block;"></i></span>
                            </th>

                          </tr>
                        </thead>
                        @if (DB::table('mms_rights')->where('userId',Auth::id())->exists())
                          <tbody>

                          </tbody>

                        @else
                          <tbody>
                            <td colspan="6"><span class="text-danger text-center"><h5><a>You have not any Role!!</a></h5></span></td>
                          </tbody>
                        @endif
                      </table>

                    </div>
                  </div>
                  {{-- <span class="ml-4 float-right">{{ $userinfos->links() }}</span> --}}
                </div>
              </div>
@section('script_section')
  <script type="text/javascript">
  $(document).ready(function() {
      $('.fa-sort-down,.fa-sort-up').click(function(){
          //Add parameter for remembering order type
          $(this).attr('data-order', ($(this).attr('data-order') === 'desc' ? 'asc':'desc'));
         //Add aditional parameters to keep track column that was clicked
         sorttable(this, $('#patientTable thead th').index(this));
      });
  });
  function sorttable(header, index){
   var $tbody = $('table tbody');
   var order = $(header).attr('data-order');
   $tbody.find('tr').sort(function (a, b) {
   var tda = $(a).find('td:eq(' + index + ')').text();
   var tdb = $(b).find('td:eq(' + index + ')').text();
       //Order according to order type
       return (order === 'asc' ? (tda > tdb ? 1 : tda < tdb ? -1 : 0) : (tda < tdb ? 1 : tda > tdb ? -1 : 0));
  }).appendTo($tbody);
  }
  </script>

            <script type="text/javascript">
                $(document).ready(function(){
                    var areaNAME=$("#areaNAME").val();
                    // alert(areaNAME);
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                    $.ajax({
                      url: 'all/data',
                      type:'POST',
                      data: {areaNAME: areaNAME},
                      success: function(data) {
                        // alert(data);
                        $('tbody').html(data);
                      }
                });
              });
            </script>
            <script type="text/javascript">
                $(document).ready(function(){
                  $('#areaNAME').change(function(){
                    var areaNAME=$("#areaNAME  option:selected").val();
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                    $.ajax({
                      url: 'data',
                      type:'POST',
                      data: {areaNAME: areaNAME},
                      success: function(data) {
                        // alert(data);
                        $('tbody').html(data);
                      }
                });
                  });

              });
                </script>
                <script type="text/javascript">
                  $('#search,#searchNid,#searchName,#searchBirthdate,#searchStatus').on('keyup',function(){
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

              @endsection
@endsection
