 <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <!-- Vendor CSS Files -->
  <link href="/assetsfront/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assetsfront/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assetsfront/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assetsfront/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assetsfront/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assetsfront/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assetsfront/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assetsfront/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor - v4.6.1
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
 <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/">Library</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assetsfront/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">

        <ul>
          <li><a class="active" href="/">Home</a></li>

          <li class="nav-item">

            <a class="nav-link" href="{{ route('books.index') }}">Recent Books</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Upload Books</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{ route('books.upload') }}">Upload Now</a>

            </div>


          </li>

          <div class="top-header">
            <div class="container">


                 <div class="dropdown float-right">
                <a class="dropdown-toggle pointer top-header-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user"></i> My Account
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                   @if (Auth::check())
                   {{-- <a class="dropdown-item" href="{{ route('users.profile',['username' => Auth::user()->username])}}">Profile</a> --}}
                    <a class="dropdown-item" href="{{ route('users.dashboard') }}">Dashboard</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                   @else
                  <a class="dropdown-item" href="{{ route('login') }}">Log In</a>
                  <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                    @endif


                </div>
              </div>





    </div>

  </header>
