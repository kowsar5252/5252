@extends('layouts.app')
@section('title','Membership Check')
@section('content')
  <div class="container">
    <div class="row">
      @if ( session('status') )
        <div class="col-12 alert alert-success mt-5 text-center" role="alert">
           <h5 >Your Status is=  {{ session('status') }}</h5>
        </div>
      @endif
      @if ( session('danger_status') )
        <div class="col-12 alert alert-danger mt-5 text-center" role="alert">
          <h4 class="alert-heading">Sorry!!</h4>
          <hr>
          <p >{{ session('danger_status') }}</p>
        </div>
      @endif
      <div class="col-12 wrap-login100">
        <form method="POST" action="{{ url('store-captcha-form') }}" class="login100-form validate-form" style="width: 500px;margin-left: 25%;">
            @csrf
          <span class="login100-form-title">
            Checking Membership
            <p>(Please use Chrome & IE browser) </p>
          </span>

          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <label  for="">Input NID</label>
            <input class="form-control" id="nid" type="text"  name="nid" value="{{ old('nid') }}" placeholder="NID254" required autocomplete="email" autofocus>
          </div>

          <div class="form-group " style="margin-top:40px">
                  {!! NoCaptcha::renderJs() !!}
                  {!! NoCaptcha::display() !!}
                <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
              </div>
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit" name="submit">
              Check
            </button>
          </div>

          </div>

          <div class=" p-t-136">

          </div>
        </form>
      </div>

    </div>
  </div>
@endsection
