<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="48x48" href="https://demo.codevibrant.com/html/kavya/assets/images/favicon.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css')}}" />

  <!-- Fontawesome CSS-->
  <link rel="stylesheet" href="{{ asset('front/assets/css/all.css')}}" />

  <!-- slick css -->
  <link rel="stylesheet" href="{{ asset('front/assets/css/slick.css')}}">
  <link rel="stylesheet" href="{{ asset('front/assets/css/slick-theme.css')}}">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('front/assets/css/preloader.css')}}" />
  <link rel="stylesheet" href="{{ asset('front/assets/css/style.css')}}" />
  <link rel="stylesheet" href="{{ asset('front/assets/css/responsive.css')}}" />

  <title>amin Blog - @yield('title')</title>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader-wrapper">
        <div class="preloader">
        <div class="preloader-circle" id="status">
            <div></div>
            <div></div>
            <div></div>
        </div>
        </div>
    </div>
    <!-- Preloader end -->
    <main class="kavya-archive">

        <!-- Header -->
        <header>
            <!-- Top header -->
            <div class="top-header">
            <div class="container">
                <div class="row  align-items-center">
                <div class="col-md-3">
                    <div class="social-links">
                    <ul>
                        <li><a href="index.html#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="index.html#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="index.html#"><i class="fab fa-pinterest-p"></i></a></li>
                        <li><a href="index.html#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="index.html#"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="index.html#"><i class="fab fa-vimeo-v"></i></a></li>
                    </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="brand-name text-center">
                    <a href="index.html">
                        <h1>Kavya</h1>
                        <span>Enter your tagline here</span>
                    </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="search-wrapper">
                    <div class="search-icon">
                        <button class="open-search-btn"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="sidebar-icons">
                        @auth
                        @can('AdminView', Auth::user())
                            <a href="{{ route('posts.index') }}" class="sidebar-btn">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        @else
                            <a href="{{ route('posts.user.index') }}" class="sidebar-btn">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                            @endcan
                        @else
                            <a href="{{ route('login.show') }}" class="sidebar-btn">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        @endauth
                    </div>                    
                    </div>

                </div>
                </div>
            </div>
            </div>
            <!-- Top header end -->
            <!-- Navbar  -->
            <div class="kavya-navbar" id="sticky-top">
            <div class="container">
                <nav class="nav-menu-wrapper">
                <span class="navbar-toggle" id="navbar-toggle">
                    <i class="fas fa-bars"></i>
                </span>
                <div class="sticky-logo">
                    <a href="index.html">
                    <p>Kavya</p>
                    </a>
                </div>
                <ul class="nav-menu ml-auto mr-auto" id="nav-menu-toggle">
                    <li class="nav-item"><a href="{{route('home')}}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Categories <span class="arrow-icon"> <span
                            class="left-bar"></span>
                        <span class="right-bar"></span></span>
                    </a>
                    <ul class="drop-menu">
                        @foreach ($categories as $item)
                            <li class="drop-menu-item"><a href="{{ route('posts.search', ['filter' => $item->name]) }}">{{$item->name}}</a></li>                        
                        @endforeach
                    </ul>
                    <li class="nav-item"><a href="{{route('posts.front.index')}}" class="nav-link">Blogs</a></li>
                    <li class="nav-item"><a href="{{route('about')}}" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
                </ul>
                <div class="sticky-search">
                    <div class="search-wrapper">
                    <div class="search-icon">
                        <button class="open-search-btn"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="sidebar-icon">
                        @auth
                        @can('AdminView', Auth::user())
                            <a href="{{ route('posts.index') }}" class="sidebar-btn">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        @else
                            <a href="{{ route('posts.user.index') }}" class="sidebar-btn">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                            @endcan
                        @else
                            <a href="{{ route('login.show') }}" class="sidebar-btn">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        @endauth
                    </div>   
                    </div>
                </div>
                </nav>
            </div>
            </div>
            <!-- Navbar end -->

            <!-- search overlay -->
            <div id="search-overlay" class="search-section">
            <span class="closebtn"><i class="fas fa-times"></i></span>
            <div class="overlay-content">
                <form action="{{ route('posts.search') }}" method="GET">
                    <input type="text" name="filter" class="form-control" placeholder="Search posts..." required>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                         
            </div>
            </div>


        </header>
        <!-- header end -->

        @yield('content')

        <!-- Footer section -->
        <footer class="footer-section">
            <div class="container">
                <div class="footer-content">
                <div class="footer-logo">
                    <a href="index.html#">
                    <h5 class="brand-name"> Kavya</h5>
                    </a>
                </div>
                <div class="footer-copyright">
                    <p>&copy;2019 Kavya. All rights reserved. Theme designed by <a href="index.html#">CodeVibrant</a> </p>
                </div>
                <div class="social-links">
                    <ul>
                    <li><a href="index.html#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="index.html#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="index.html#"><i class="fab fa-pinterest-p"></i></a></li>
                    <li><a href="index.html#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="index.html#"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="index.html#"><i class="fab fa-vimeo-v"></i></a></li>
                    </ul>
                </div>
                </div>
            </div>
        </footer>
        <!-- Footer section end -->

        <!-- Scroll to top -->
        <div id="stop" class="scroll-to-top">
        <span><a href="index.html#"><i class="fas fa-arrow-up"></i></a></span>
        </div>
        <!-- Scroll to top end -->
    </main>
    <!-- Javascript -->
    <script src="{{ asset('front/assets/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{ asset('front/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('front/assets/js/slick.min.js')}}"></script>
    <script src="{{ asset('front/assets/js/jquery.sticky.js')}}"></script>
    <script src="{{ asset('front/assets/js/ResizeSensor.min.js')}}"></script>
    <script src="{{ asset('front/assets/js/theia-sticky-sidebar.min.js')}}"></script>
    <script src="{{ asset('front/assets/js/main.js')}}"></script>
</body>

</html>