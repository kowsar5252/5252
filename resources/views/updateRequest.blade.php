@extends('layouts.BackEndMain')
@section('title','Role Setting')
@section('content')
  @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Good!</strong> {{ session('status') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title text-center" style="font-size:30px">Member Update Request</h1>
        <p class="card-description">
        </p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Member Nid</th>
                <th>Request Send By (Manager)</th>
                <th>Requested at</th>
                <th>Action</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($updaterequests as $updaterequest)
                <tr>
                  <td>{{ $loop->index+1 }}</td>
                  <td>{{ $updaterequest->member_NID }}</td>
                  <td>{{ DB::table('mmg_users')->where('id',$updaterequest->manager_id)->value('name') }}</td>
                  <td>{{ $updaterequest->created_at->diffForHumans() }}</td>
                  <td><a href="{{ url('update/request/accept'.'/'.$updaterequest->id) }}"><span class="badge badge-success">Accept</span></a></td>
                  <td><a href="{{ url('update/request/cancel'.'/'.$updaterequest->id) }}"><span class="badge badge-danger">Cancel</span></a></td>
                </tr>

              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      {{-- <span class="ml-4 float-right">{{ $userinfos->links() }}</span> --}}
    </div>
  </div>
@endsection
