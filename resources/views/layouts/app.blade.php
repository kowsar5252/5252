<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{ config('app.name')}} - @yield('title')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('FrontEndAssets/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('FrontEndAssets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('FrontEndAssets/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('FrontEndAssets/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('FrontEndAssets/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('FrontEndAssets/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('FrontEndAssets/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
  <header>
     <div class="collapse bg-dark" id="navbarHeader">
       <div class="container">
         <div class="row">
           <div class="col-sm-8 col-md-7 py-4">
             <h4 class="text-white">About</h4>
             <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
           </div>
         </div>
       </div>
     </div>
     <div class="navbar navbar-dark bg-dark shadow-sm">
       <div class="container d-flex justify-content-between">
         <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
           <strong>MMS</strong>
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
       </div>
     </div>
   </header>

@yield('content')
	<footer class="my-5 pt-5 text-muted text-center text-small">
	  <p class="mb-1">&copy; <?php echo date("Y"); ?> MMS All Right Reserved.</p>
	  <ul class="list-inline">
	    <li class="list-inline-item"><a href="#">Design and Developed By</a> <a>Kowsar Hossain</a></li>

	  </ul>
	</footer>



<!--===============================================================================================-->
	<script src="{{asset('FrontEndAssets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('FrontEndAssets/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('FrontEndAssets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('FrontEndAssets/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('FrontEndAssets/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

	@yield('javascript')
<!--===============================================================================================-->
	<script src="{{asset('FrontEndAssets/js/main.js')}}"></script>

</body>
</html>
