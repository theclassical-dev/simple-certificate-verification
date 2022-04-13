<!DOCTYPE html>
<html class="no-js" lang="en">
<base href="{{ url('/') }}/">

<head>
    <meta charset="utf-8">
    <title>login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon Start Here -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon-homlisti.svg">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- Bootstrap Css Start Here -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
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
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <!-- Google Font Start Here -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;family=Ubuntu:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&amp;display=swap" rel="stylesheet">
</head>

<body class="sticky-header" style="background-color: #000;">

    <main class="content-area" style="margin-top: 70px">
        <div class="col-md-4 offset-md-4 text-center">
            <span style="font-size: 100px;"><i class="fa fa-hospital"></i></span>
        </div>
        <div class="col-md-8 offset-md-2 text-center">
            <h2 style="color: #fff;" class="text-uppercase mt-2">Telehealth A tool for Improved Patients Care:</h2>
            <p class="text-uppercase">A case study of PLHW at Adeoyo Maternity Hospital.</p>
        </div>
        <div class="container" style="margin-top: 70px">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-12 offset-md-4 site-main">
                    
                    
                    <div class="page-content-block">
                        <div class="main-content">
                            <div class="clearfix">
                                <div id="post-95" class="post-95 page type-page status-publish">
                                    <div class="rtcl">
                                        <div class="row" id="rtcl-user-login-wrapper">
                                            <div class="col-md-12 rtcl-login-form-wrap">
                                                <form class="form-horizontal" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="rtcl-user-login" class="control-label">
                                                            E-mail
                                                            <strong class="rtcl-required">*</strong>
                                                        </label>
                                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email" required autocomplete="email" autofocus>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="rtcl-user-pass" class="control-label">
                                                            Password <strong class="rtcl-required">*</strong>
                                                        </label>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="*********" name="password" required autocomplete="current-password" >
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
    
                                                    <div class="form-group d-flex align-items-center">
                                                        <button type="submit" name="login" class="btn btn-primary" value="login">
                                                            Login
                                                        </button>
                                                        <div class="form-check">
                                                            <input  type="checkbox" name="rememberme" id="rtcl-rememberme" value="forever"/>
                                                            <label  class="form-check-label" for="rtcl-rememberme"> Remember Me</label>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="page-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
       
    <!--=====================================-->
    <!--=   Footer     Start                =-->
    <!--=====================================-->

    
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