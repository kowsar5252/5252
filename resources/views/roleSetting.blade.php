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
        <h1 class="card-title text-center" style="font-size:30px">User Role Setting</h1>
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
                  Birthdate
                </th>
                <th>
                  Address
                </th>
                <th>
                  Phone
                </th>
                <th>
                  Email
                </th>
                <th>
                  User Role
                </th>
                <th>
                  Action
                </th>
                <th>
                  Delete user
                </th>
                <th>
                  Setting Role
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($userinfos as $userinfo)
                <tr>
                <td>
                  {{ $userinfo->nid }}
                </td>
                <td>
                  {{ $userinfo->name }}
                </td>
                <td>
                  {{ $userinfo->birthDate }}
                </td>
                <td>
                  @php
                    echo DB::table('atolls')->where('atoll_id',$userinfo->atollID)->value('atoll_name');
                  @endphp
                  ,
                  @php
                    echo DB::table('islands')->where('islandID',$userinfo->islandID)->value('islandNameENG');
                  @endphp
                  ,
                  @php
                    echo DB::table('addresses')->where('addressID',$userinfo->addressID)->value('addressNameENG');
                  @endphp

                </td>
                <td>
                  {{ $userinfo->phone }}
                </td>
                <td>
                  {{ $userinfo->email }}
                </td>
                <td>
                  @if ($userinfo->status==1)
                    <strong style="color:green">Manager</strong>
                  @else
                        <strong style="color:red">Pending</strong>
                  @endif
                </td>
                <td>
                  @if ($userinfo->status==1)
                    <a href="{{ url('user/active')."/".$userinfo->id }}"><span class="badge badge-danger">Cancel</span></a>
                  @else
                      <a href="{{ url('user/active')."/".$userinfo->id }}"><span class="badge badge-success">Accept</span></a>
                  @endif
                </td>
                <td>
                  <a href="{{ url('user/delete')."/".$userinfo->id }}"><span class="badge badge-danger">Delete</span></a>
                </td>
                <td>
                  <a href="{{ url('user/edit/role')."/".$userinfo->id }}"><span class="badge badge-info">Setting Role</span></a>
                </td>
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
