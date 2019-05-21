<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name') }} - @yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('BackEndAssets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('BackEndAssets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('BackEndAssets/vendors/css/vendor.bundle.addons.css')}}">
  <link rel="stylesheet" href="{{asset('BackEndAssets/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('BackEndAssets/images/favicon.png')}}" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="{!! asset('BackEndAssets/css/all.css') !!}">
  <script  src="{{ asset('BackEndAssets/js/jquery-3.4.1.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center" style="border-bottom: 1px solid #e9e9e9;">
        <a class="navbar-brand text-success" href="index.html">
          <h2>MMS</h2>
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="{{ asset('BackEndAssets/images/logo-mini.svg') }}" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-file-document-box"></i>
              <span class="count">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                </p>
                <span class="badge badge-info badge-pill float-right">View all</span>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark">David Grey
                    <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
              <span class="count">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                </p>
                <span class="badge badge-pill badge-warning float-right">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-alert-circle-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>
                  <p class="font-weight-light small-text">
                    Just now
                  </p>
                </div>
              </a>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, {{  Auth::user()->name }} !</span>
              <img class="img-xs rounded-circle" src="{{ asset('BackEndAssets/images/faces/face1.jpg') }}" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              @php
                $id=Auth::id();
              @endphp
              <a href="{{ url('email/change'.'/'.$id) }}" class="dropdown-item mt-2">
                Change Email
              </a>
              <a href="{{ url('password/change'.'/'.$id) }}" class="dropdown-item">
                Change Password
              </a>

              <a class="dropdown-item">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="{{ asset('BackEndAssets/images/faces/face1.jpg') }}" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{  Auth::user()->name }}</p>
                  <div>
                    <small class="designation text-muted">{{ App\Mmg_users::findOrFail(Auth::id())->role==1?"Supr Admin":"Manager" }}</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <a href="{{ route('membershipCheck') }} "class="btn btn-success btn-block" target="_blank">MS Checking
                <i class="mdi mdi-check"></i>
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Membership Edit</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('roleSetting') }}">
              <i class="menu-icon fa fa-cog"></i>
              <span class="menu-title">User Role Setting</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('member/update/request') }}">
              <i class="menu-icon fa fa-cog"></i>
              <span class="menu-title">Member Update Request</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('recycleBin') }}">
              <i class="menu-icon fa fa-trash"></i>
              <span class="menu-title">Recycle Bin</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright &copy; <?php echo date("Y"); ?>
              <a href="{{ url('/') }}" target="_blank">MMS</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Design & Develped by
              <i class="mdi mdi-heart text-danger"></i> Kowsar Hossain
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->

  @yield('script_section');
  <script src="{{asset('BackEndAssets/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('BackEndAssets/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('BackEndAssets/js/off-canvas.js')}}"></script>
  <script src="{{asset('BackEndAssets/js/misc.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('BackEndAssets/js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->
</body>


</html>
