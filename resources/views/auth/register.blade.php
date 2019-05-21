@extends('layouts.app')
@section('title','Member Registr')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12" style="padding: 75px;">
@foreach (($errors->all()) as $error)
  <li>{{ $error }}</li>
@endforeach
        <form method="POST" action="{{ route('register') }}" class=" login100-form validate-form" style="padding: 58px;height:auto">
          @csrf
            <h3>Member Register</h3>
              <div class="row">
                <div class="col">
                  <label for="exampleInputEmail1">Full Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Full name">
                </div>
                <div class="col">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="text" name="email" class="form-control" placeholder="emaile">
                </div>
              </div>
              <div class="row mt-2">
                <div class="col">
                  <label for="exampleInputEmail1">National Identity Card No</label>
                  <input type="text" name="nid" class="form-control" placeholder="NID">
                </div>
                <div class="col">
                  <label for="exampleInputEmail1">Birth Date</label>
                  <input type="date" name="birthDate" class="form-control" >
                </div>

              </div>
          <div class="form-group mt-2">
            <label for="exampleInputEmail1">Phone</label>
            <input type="text" class="form-control" name="phone" aria-describedby="emailHelp" placeholder="Phone">
          </div>
          <div class="form-group">
						<label>Permanent Address</label>
						<select id="atoll" name="atollID" class="form-control">
              <option value="">Atoll</option>
              @foreach ($atoll_lists as $atoll_list)
                <option value="{{ $atoll_list->atoll_id }}">{{ $atoll_list->atoll_name }}</option>
              @endforeach
						</select>
					</div>
          <div class="form-group">
						<select id="islands" name="islandID" class="form-control">
							<option value="">Island</option>
						</select>
					</div>
          <div class="form-group">
						<select id="address" name="addressID" class="form-control">
							<option value="">Addresses</option>
						</select>
					</div>
          <div class="row">
            <div class="col">
              <label for="exampleInputEmail1">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="col">
              <label for="exampleInputEmail1">Confirm Password</label>
              <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
            </div>
          </div>
          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
              Register
            </button>
          </div>

          <div class="text-center p-t-12">
            <span class="txt1">
              Alreadu Have an Account?
            </span>
            <a class="txt2" href="{{ url('/') }}">
              Log in
            </a></br>
          </div>
        </form>
      </div>

    </div>
  </div>

  @section('javascript')


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
});

  </script>
  @endsection
@endsection
