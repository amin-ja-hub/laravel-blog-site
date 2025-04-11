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
                <div class="sidebar-icon">
                    <button class="sidebar-btn"> <i class="fas fa-ellipsis-v"></i></button>
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
                        <li class="drop-menu-item"><a href="archive-layout-one.html">{{$item->name}}</a></li>                        
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
                    <button class="sidebar-btn"> <i class="fas fa-ellipsis-v"></i></button>
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
            <form>
            <input type="text" placeholder="Search here" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        </div>
        <!-- search overlay end -->

        <!-- sticky sidebar -->
        <div class="sticky-sidebar">
        <div class="sticky-sidebar-content">
            <div class="close-sidebar ml-auto">
            <i class="fas fa-times"></i>
            </div>
            <h3>About the Author</h3>

            <div class="author-img">
            <img src="https://demo.codevibrant.com/html/kavya/assets/images/author.jpg" alt="">
            </div>
            <div class="author-desc">
            <h5 class="mb-2">Julie Ryan</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat consequuntur vel quo, quae aliquam esse
                facere eveniet magnam rerum! Quo itaque ipsa a ipsum quaerat optio illo ducimus dolores in!</p>
            </div>
            <div class="circular-icons social-links">
            <ul>
                <li><a href="index.html#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="index.html#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="index.html#"><i class="fab fa-pinterest-p"></i></a></li>
                <li><a href="index.html#"><i class="fab fa-instagram"></i></a></li>
            </ul>
            </div>

            <div class="author-posts">
            <h3>Most viewed</h3>
            <div class="card mb-4">
                <div class="row no-gutters">
                <div class="col-4 col-md-4">
                    <a href="single-layout-one.html">
                    <img src="https://demo.codevibrant.com/html/kavya/assets/images/time.jpg" class="card-img" alt="">
                    </a>
                </div>
                <div class="col-8 col-md-8">
                    <div class="card-body">
                    <ul class="category-tag-list">

                        <li class="category-tag-name">
                        <a href="index.html#">Lifestyle</a>
                        </li>
                    </ul>
                    <h5 class="card-title title-font"><a href="single-layout-one.html">Making time for travel</a>
                    </h5>
                    <div class="author-date">

                        <a class="date" href="index.html#">
                        <span>21 Dec, 2019</span>
                        </a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="row no-gutters">
                <div class="col-4 col-md-4">
                    <a href="single-layout-one.html">
                    <img src="https://demo.codevibrant.com/html/kavya/assets/images/alone.jpg" class="card-img" alt="">
                    </a>
                </div>
                <div class="col-8 col-md-8">
                    <div class="card-body">
                    <ul class="category-tag-list">
                        <li class="category-tag-name">
                        <a href="index.html#">Lifestyle</a>
                        </li>
                    </ul>
                    <h5 class="card-title title-font"><a href="single-layout-one.html">It's okay to be alone sometimes</a>
                    </h5>
                    <div class="author-date">
                        <a class="date" href="index.html#">
                        <span>21 Dec, 2019</span>
                        </a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="row no-gutters">
                <div class="col-4 col-md-4">
                    <a href="single-layout-one.html">
                    <img src="https://demo.codevibrant.com/html/kavya/assets/images/forest.jpg" class="card-img" alt="">
                    </a>
                </div>
                <div class="col-8 col-md-8">
                    <div class="card-body">
                    <ul class="category-tag-list">
                        <li class="category-tag-name">
                        <a href="index.html#">travel</a>
                        </li>
                    </ul>
                    <h5 class="card-title title-font"><a href="single-layout-one.html">Conserve Forest</a>
                    </h5>
                    <div class="author-date">
                        <a class="date" href="index.html#">
                        <span>21 Dec, 2019</span>
                        </a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="row no-gutters">
                <div class="col-4 col-md-4">
                    <a href="single-layout-one.html">
                    <img src="https://demo.codevibrant.com/html/kavya/assets/images/beach-sea.jpg" class="card-img" alt="">
                    </a>
                </div>
                <div class="col-8 col-md-8">
                    <div class="card-body">
                    <ul class="category-tag-list">
                        <li class="category-tag-name">
                        <a href="index.html#">Lifestyle</a>
                        </li>
                    </ul>
                    <h5 class="card-title title-font"><a href="single-layout-one.html">Beach is my favourite place</a>
                    </h5>
                    <div class="author-date">
                        <a class="date" href="index.html#">
                        <span>21 Dec, 2019</span>
                        </a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- sticky sidebar end -->

        <div class="body-overlay"></div>
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