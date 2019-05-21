@extends('layouts.BackEndMain')
@section('title','Change Email')
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
        <h1 class="card-title text-center" style="font-size:25px">Email Change</h1>
        <p class="card-description">
        </p>
        <div class="table-responsive">
          <form class="" action="{{ url('change/email/insert') }}" method="post">
            @csrf
              <div class="form-group">
                <label for="exampleInputName1">Old Email</label>
                <input class="form-control" type="email" name="old_email" placeholder="Enter Old Email">
                <input class="form-control" type="hidden" name="user_id" value="{{ $old_email->id }}">
              </div>
              <div class="form-group">
                <label for="exampleInputName1">New Email</label>
                <input class="form-control" type="email" name="new_email" placeholder="Enter New Email">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success mr-2">Change Email</button>
                <a href="{{ url('home') }}" class="btn btn-light">Cancel</a>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
