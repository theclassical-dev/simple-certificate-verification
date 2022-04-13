<!DOCTYPE html>
<html class="no-js" lang="en">
    <base href="{{ url('/') }}/">
<head>
    <meta charset="utf-8">
    <title>Homies</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon Start Here -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon-homlisti.svg">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- Bootstrap Css Start Here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Animate Css Start Here -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Owl Carousel Start Here -->
    <link rel="stylesheet" href="js/vendor/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="js/vendor/owlcarousel/owl.theme.default.min.css">
    <!-- Swiper Css Start Here -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css" />
    <!-- Flaticon Css Start Here -->
    <link rel="stylesheet" href="css/flaticon/font/flaticon.css">
    <!-- Select Css Start Here -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- Animate Css Start Here -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Pop Up Css Start Here -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- All min Css Start Here -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Pannellum -->
    <link rel="stylesheet" href="css/pannellum.css">
    <!-- Style Css Start Here -->
     <!-- noUIrangle slider -->
     <link rel="stylesheet" href="js/vendor/noUiSlider/nouislider.min.css" />

    <link rel="stylesheet" href="style.css">
    <!-- Google Font Start Here -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;family=Ubuntu:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&amp;display=swap" rel="stylesheet">
</head>

<body class="sticky-header">
    <!--[if IE]>
    <![endif]-->
    <!--=====================================-->
    <!--=   Preloader     Start             =-->
    <!--=====================================-->
    <div id="preloader"></div>
    <!--=====================================-->
    <!--=   Preloader     End               =-->
    <!--=====================================-->
    <div class="wrapper" id="wrapper">
    <!--=====================================-->
    <!--=   Header     Start                =-->
    <!--=====================================-->

    <header class="rt-header sticky-on">
        <div id="sticky-placeholder"></div>
        <div id="navbar-wrap" class="header-menu menu-layout1 header-menu menu-layout3">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo-area">
                            <a href="{{ route('index')}}" class="temp-logo">
                                <img src="img/logo.svg" width="157" height="40" alt="logo" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-flex justify-content-center position-static">
                        <nav id="dropdown" class="template-main-menu template-main-menu-3">
                            <ul>
                                <li>
                                    <a href="{{ route('index')}}" class="active">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('property')}}">Property</a>
                                </li>
                                <li>
                                    <a href="{{ route('about')}}">About us</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact')}}">Contact us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
        <div
            class="rt-header-menu mean-container position-relative"
            id="meanmenu">
            <div class="mean-bar">
                <a href="index.html">
                    <img src='img/logo_light2.svg' alt='logo' class='img-fluid'/>
                </a>
                <div class="mean-bar--right">
                    <span class="sidebarBtn">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </span>
                </div>
            </div>
            <div class="rt-slide-nav">
                <div class="offscreen-navigation">
                    <nav class="menu-main-primary-container">
                        <ul class="menu">
                            <li class="list menu-item-parent">
                                <a class="animation" href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="list menu-item-parent">
                                <a class="animation" href="{{ route('property')}}">Properties</a>
                            </li>
                            <li class="list menu-item-parent">
                                <a class="animation" href="{{ route('about')}}">About us</a>
                            </li>
                            <li class="list menu-item-parent">
                                <a class="animation" href="{{ route('contact')}}">Contact us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
@yield("content")

@php
    $d = DB::table('settings')->where('role', '=', 'admin')->first();
@endphp
<footer class="footer-area">
    <div class="footer-top">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-logo-area">
                        <div class="item-logo">
                        <img src="img/logo.svg" width="157" height="40" alt="logo" class="img-fluid">
                        </div>
                        <p>Corem ipsum dolor sit amet consecte turad
                            pisicing elit, sed do eiusmod tempor inci
                            didunt ut labore et dolor.pisicing elit, sed do eiusmod tempor inci
                        </p>
                        <div class="item-social">
                            <ul>
                                <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://vimeo.com/" target="_blank"><i class="fab fa-vimeo-v"></i></a></li>
                                <li><a href="https://www.pinterest.com/" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href="https://web.whatsapp.com/" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-link">
                        <div class="footer-title">
                            <h3>Quick Links</h3>
                        </div>
                        <div class="item-link">
                            <ul>
                                <li><a href="{{ route('property')}}">Properties </a></li>
                                <li><a href="{{ route('about')}}">About us</a></li>
                                <li><a href="{{ route('contact')}}">Contact us </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-contact">
                        <div class="footer-title">
                            <h3>Contact</h3>
                        </div>
                        <div class="footer-location">
                            <ul>
                                <li class="item-map"><i class="fas fa-map-marker-alt"></i>{{ $d->address}}</li>
                                <li><a href="mailto:info@example.com"><i class="fas fa-envelope"></i>{{ $d->email}}</a></li>
                                <li><a href="tel:+123596000"><i class="fas fa-phone-alt"></i>{{ $d->tel }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright-area1">
                        <ul>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="copyright-area2">
                        <p>2022© All rightre served</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- start back to top -->
<a href="javascript:void(0)" id="back-to-top">
    <i class="fas fa-angle-double-up"></i>
</a>
<!-- End back to top -->

</div>
<div id="template-search" class="template-search">
<button type="button" class="close">×</button>
<form class="search-form">
  <input type="search" value="" placeholder="Search" />
  <button type="submit" class="search-btn btn-ghost style-1">
    <i class="flaticon-search"></i>
  </button>
</form>
</div>
<script src="js/jquery-3.6.0.min.js"></script>
<!-- Popper Js Start Here -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap Js Start Here -->
<script src="js/bootstrap.min.js"></script>
<!-- Wow Js Start Here -->
<script src="js/wow.min.js"></script>
<!-- Owl Carousel Js Start Here -->
<script src="js/vendor/owlcarousel/owl.carousel.min.js"></script>
<script src="js/swiper-bundle.min.js"></script>
<!-- Count down Js Start Here -->
<script src="js/jquery.appear.min.js"></script>
<!-- Pop up Js Start Here -->
<script src="js/jquery.magnific-popup.min.js"></script>
<!-- Nice Select Js Start Here -->
<script src="js/jquery.nice-select.min.js"></script>
<!-- Parallaxie Js Start Here -->
<script src="js/parallaxie.js"></script>
<!-- Tween Js Start Here -->
<script src="js/tween-max.js"></script>
<!-- Appear Js Start Here -->
<script src="js/appear.min.js"></script>
<!-- Isotope Js Start Here -->
<script src="js/isotope.pkgd.min.js"></script>
<!-- Imagesloaded Js Start Here -->
<script src="js/imagesloaded.pkgd.min.js"></script>
<!-- noUiRangeSlider -->
<script src="js/vendor/noUiSlider/nouislider.min.js"></script>
<script src="js/vendor/noUiSlider/wNumb.js"></script>
<!-- Validator Slider -->
<script src="js/validator.min.js"></script>
<!-- Pannellum  -->
<script src="js/pannellum.js"></script>
<!-- Zoom Image  -->
<script src="js/jquery.zoom.min.js"></script>

<!-- Main Js Start Here -->
<script src="js/main.js"></script>
</body>


</html>