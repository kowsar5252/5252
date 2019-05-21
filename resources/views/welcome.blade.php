@extends('layouts.app')
@section('title','Home')
@section('content')
  <div class="container">
    <div class="row">
      @if ( session('status') )
        <div class="col-12 alert alert-success mt-5 text-center" role="alert">
          <h4 class="alert-heading">Well done!</h4>
          <hr>
          <p >{{ session('status') }}</p>
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
        <div class="login100-pic js-tilt" data-tilt>
          <img src="{{asset('FrontEndAssets/images/img-01.png')}}" alt="IMG">

          <a href="{{ route('membershipCheck') }}" class="login100-form-btn text-white mt-5">
            Membership Check
          </a>
        </div>

        <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
            @csrf
          <span class="login100-form-title">
            Member Login
          </span>

          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input id="email" type="email" class="input100 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email.." required autocomplete="email" autofocus>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input id="password" type="password" placeholder="password" class=" input100 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
              </span>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <div class="form-check">
                <input class="ml-2 form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="ml-2 form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Login
            </button>
          </div>

          <div class="text-center p-t-12">
            @if (Route::has('password.request'))
            <span class="txt1">
              Forgot
            </span>
            <a class="txt2" href="{{ route('password.request') }}">
              Username / Password?
            </a></br>
          @endif
            <a class="txt2 text-center" href="{{ route('register') }}">
              Create your Account
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>

          <div class=" p-t-136">

          </div>
        </form>
      </div>

    </div>
  </div>
@endsection
