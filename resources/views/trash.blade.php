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
  <div class="col-lg-8 offset-2 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title text-center" style="font-size:25px">Recycle Bin</h1>
        <p class="card-description">
        </p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>
                  NID
                </th>
                <th>
                  Full Name
                </th>
                <th>
                  Email
                </th>
                <th>
                  User Role
                </th>
                <th>
                  Restore
                </th>
                <th>
                  Destroy
                </th>
              </tr>
            </thead>
            <tbody>
              @forelse ($mmg_users as $mmg_user)
                <tr>
                  <td>{{ $mmg_user->nid }}</td>
                  <td>{{ $mmg_user->name }}</td>
                  <td>{{ $mmg_user->email }}</td>
                  <td>{{ $mmg_user->role=2?"Manager":"User" }}</td>
                <td>
                  <a href="{{ url('user/restore')."/".$mmg_user->id }}"><span class="badge badge-danger">Restore</span></a>
                </td>
                <td>
                  <a href="{{ url('user/destroy')."/".$mmg_user->id }}"><span class="badge badge-info">Delete</span></a>
                </td>
              </tr>
            @empty
              <tr >
                <td colspan="6"><strong>Empty!!</strong></td>
              </tr>
            @endforelse
            </tbody>
          </table>
        </div>
      </div>
      {{-- <span class="ml-4 float-right">{{ $userinfos->links() }}</span> --}}
    </div>
  </div>
@endsection
