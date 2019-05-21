@extends('layouts.BackEndMain')
@section('title','Change Password')
@section('content')
  @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Good!</strong> {{ session('status') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  @if (session('danger_status'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Opps!</strong> {{ session('danger_status') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  <div class="col-lg-6 offset-3 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title text-center" style="font-size:25px">Password Change</h1>
        <p class="card-description">
        </p>
        <div class="table-responsive">
          <form class="" action="{{ url('change/password/insert') }}" method="post">
            @csrf
              <div class="form-group">
                <label for="exampleInputName1">Old Password</label>
                <input class="form-control" type="password" name="old_password" placeholder="old Password">
                <input class="form-control" type="hidden" name="user_id" value="{{ $id }}">
              </div>
              <div class="form-group">
                <label for="exampleInputName1">New Password</label>
                <input class="form-control" type="password" name="new_password" placeholder="Enter New password">
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Re-enter Password</label>
                <input class="form-control" type="password" name="re_password" placeholder="re enter password">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success mr-2">Change Password</button>
                <a href="{{ url('home') }}" class="btn btn-light">Cancel</a>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
