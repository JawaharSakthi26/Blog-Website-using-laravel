<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    {{-- <!-- gLightbox-->
    <link rel="stylesheet" href="vendor/glightbox/css/glightbox.css"> --}}
    <!-- Theme stylesheet-->
    <link rel="stylesheet" href="{{asset('assets/css/style.default.css')}}" id="theme-stylesheet">
    {{-- <!-- gLightbox-->
    <link rel="stylesheet" href="vendor/glightbox/glightbox.css"> --}}
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    {{-- <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png"> --}}
    <style>
      .comment-container {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
        }


        .reply-container {
            margin-left: 20px;
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-3">
        <div class="container py-1"><a class="navbar-brand text-sm fw-bold text-dark" href="index.html">My Blog</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span></span><span></span><span></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
              <li class="nav-item"><a class="nav-link active " href="{{route('home.index')}}">Home</a>
              </li>
              {{-- <li class="nav-item"><a class="nav-link " href="#">Blog</a>
              </li>
              <li class="nav-item"><a class="nav-link " href="#">Post</a>
              </li> --}}
              {{-- <li class="nav-item"><a class="nav-link " href="#">Contact</a>
              </li> --}}
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="{{asset('uploads/users/' . Auth::user()->photo)}}" class="img-fluid rounded-circle mx-2" width="30" alt="">{{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
              {{-- <li class="nav-item mt-2 mt-lg-0">
                <ul class="list-inline d-flex align-items-center">
                  <li class="list-inline-item mx-lg-2 px-2 border-start border-end"><a class="search-btn nav-link small py-0 text-dark" href="#"><i class="fas fa-search"></i></a></li>
                  <li class="list-inline-item d-flex align-items-end small"><a class="text-dark" href="#">EN</a><span class="underscore mb-1"></span><a class="text-gray-500" href="#">ES</a></li>
                </ul>
              </li> --}}
            </ul>
          </div>
        </div>
      </nav>


    @yield('content')

    
    @include('layouts.include.frontend-footer')
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    {{-- <script src="vendor/glightbox/glightbox.js"></script> --}}
    <script src="{{asset('assets/js/theme.js')}}"></script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>