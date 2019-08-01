<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <link href="../fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/resume.min.css" rel="stylesheet">

    <script src="../dist/sweetalert.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">

</head>
<body>
    <div id="app">
	    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
	    <a class="navbar-brand js-scroll-trigger" href="#page-top">
	      <span class="d-block d-lg-none">{{ Auth::user()->name }}</span>
	      <span class="d-none d-lg-block">
	        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="../img/profile.jpg" alt="">
	      </span>
	    </a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav">
	        <li class="nav-item">
	          <a class="nav-link js-scroll-trigger" href="{{route('showuser')}}">User</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link js-scroll-trigger" href="{{route('show')}}">Contacts</a>
	        </li>

	        <li class="nav-item">
	            <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
	                {{ __('Logout') }}
	            </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </li>
	      </ul>
	    </div>
	  </nav>
	
	 <main class="container-fluid p-0">
        @yield('content')
    </main>
    </div>
  <!-- Bootstrap core JavaScript -->
  <script src="../jquery/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="../jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../js/resume.min.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
