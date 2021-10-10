<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>สาธารณสุขอำเภอ</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo/ss.png') }}">       
		<!-- ========================= CSS here ========================= -->      
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
        <!-- END: Vendor CSS-->
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.0.0-beta1.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

         <!-- Font Awesome -->
         <link href="{{ asset('fontawesome/css/fontawesome.css') }}" rel="stylesheet">
         <link href="{{ asset('fontawesome/css/brands.css') }}" rel="stylesheet">
         <link href="{{ asset('fontawesome/css/solid.css') }}" rel="stylesheet">
             
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
     
        <link rel="stylesheet" href="assets/css/LineIcons.3.0.css" />


</head>
    <body>
            <!-- ========================= preloader start ========================= -->
                <div class="preloader">
                    <div class="loader">
                        <div class="spinner">
                            <div class="spinner-container">
                                <div class="spinner-rotator">
                                    <div class="spinner-left">
                                        <div class="spinner-circle"></div>
                                    </div>
                                    <div class="spinner-right">
                                        <div class="spinner-circle"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- preloader end -->
          
             <!-- ========================= header start ========================= -->
                    <header class="header navbar-area">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <nav class="navbar navbar-expand-lg">
                                        <a class="navbar-brand" href="index.html">
                                            <img src="{{ asset('img/logo/ss.png') }}" alt="Logo" width="80px" height="80px">
                                        </a>
                                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                            aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="toggler-icon"></span>
                                            <span class="toggler-icon"></span>
                                            <span class="toggler-icon"></span>
                                        </button>

                                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                            <ul id="nav" class="navbar-nav ms-auto">
                                                <li class="nav-item">                                           
                                                    <a class="page-scroll" href="{{url('/')}}">Home</a>                                            
                                                </li>  
                                                <li class="nav-item">                                           
                                                    <a class="page-scroll" href="{{url('frontend/about')}}">Aboute</a>                                            
                                                </li>                                       
                                                <li class="nav-item">
                                                    <a class="page-scroll dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                                    data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent"
                                                    aria-expanded="false" aria-label="Toggle navigation">ITA</a>
                                                    <ul class="sub-menu collapse " id="submenu-1-2">
                                                        <li class="nav-item"><a href="service-1.html">2563</a></li>
                                                        <li class="nav-item"><a href="#0">2564</a></li>
                                                        <li class="nav-item"><a href="#0">2564</a></li>
                                                    </ul>
                                                </li>    
                                                <li class="nav-item">
                                                    <a class="page-scroll dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                                    data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent"
                                                    aria-expanded="false" aria-label="Toggle navigation">บุคลากร</a>
                                                    <ul class="sub-menu collapse" id="submenu-1-2">
                                                        <li class="nav-item"><a href="service-1.html">ฝ่ายบริหาร</a></li>
                                                        <li class="nav-item"><a href="#0">เจ้าหน้าที่</a></li>
                                                    
                                                    </ul>
                                                </li>
                                            <!-- <li class="nav-item">                                           
                                                    <a class="page-scroll" href="{{url('frontend/service')}}">Blog</a>                                            
                                                </li>-->
                                            
                                                <li class="nav-item">
                                                    <a class="page-scroll" href="{{url('frontend/contact')}}">Contact</a>
                                                </li> 

                                        
                                                <li class="nav-item">
                                                    <!-- <a class="page-scroll" href="{{url('frontend/contact')}}">Login</a> -->   
                                                <a href="{{ url('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                                                </li>  
                                            
                                            </ul>                                    
                                        </div> <!-- navbar collapse -->
                                      
                                        <!-- <a class="btn btn-float btn-float-sm shopping-item" href="cart.html">Cart - <span class="cart-amunt">$100</span><i class="fa fa-cart-arrow-down fa-1x text-danger"></i><span class="product-count">5</span></a> -->
                                   
                                    </nav> <!-- navbar -->
                                </div>
                            </div> <!-- row -->
                        </div> <!-- container -->
                    
                    </header>
                  
            <!-- ========================= header end ========================= -->


                <div>
                    @yield('content')
                </div>


            <!-- ========================= footer start ========================= -->
                <footer class="footer pt-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="footer-widget mb-60 wow fadeInLeft" data-wow-delay=".2s">
                                    <a href="index.html" class="logo mb-20"><img src="{{asset('img/logo/ss.png')}}" alt="logo" width="100px" height="100px"></a>
                                    <p class="mb-30 footer-desc">We Crafted an awesome desig library that is robust and intuitive to use. No matter you're building a business presentation websit.</p>
                                </div>
                            </div>
                            <div class="col-xl-2 offset-xl-1 col-lg-2 col-md-6">
                                <div class="footer-widget mb-60 wow fadeInUp" data-wow-delay=".4s">
                                    <h4>Quick Link</h4>
                                    <ul class="footer-links">
                                        <li>
                                            <a href="javascript:void(0)">Home</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">About Us</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Service</a>
                                        </li> 
                                        <li>
                                            <a href="javascript:void(0)">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6">
                                <div class="footer-widget mb-60 wow fadeInUp" data-wow-delay=".6s">
                                    <h4>Service</h4>
                                    <ul class="footer-links">
                                        <li>
                                            <a href="javascript:void(0)">Marketing</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Branding</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Web Design</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Graphics Design</a>
                                        </li> 
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6">
                                <div class="footer-widget mb-60 wow fadeInRight" data-wow-delay=".8s">
                                    <h4>Contact</h4>
                                    <ul class="footer-contact">
                                        <li>
                                            <p>+00983467367234</p>
                                        </li>
                                        <li>
                                            <p>yourmail@gmail.com</p>
                                        </li>
                                        <li>
                                            <p>United State Of America
                                            *12 Street House</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="copyright-area">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="footer-social-links">
                                        <ul class="d-flex">
                                            <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-twitter-filled"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="lni lni-instagram-filled"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="wow fadeInUp" data-wow-delay=".3s">Template Designed by <a
                                            href="https://dekbanbanproject.com" rel="nofollow">Pradit Raha</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            <!-- ========================= footer end ========================= -->

            <!-- ========================= scroll-top ========================= -->
                <a href="#" class="scroll-top" class="btn btn-danger btn-glow round px-2">
                <i class="fas fa-chevron-circle-up" style='font-size:19px;color:white'></i>
                </a>
            
		<!-- ========================= JS here ========================= -->
		<script src="{{ asset('assets/js/bootstrap.bundle-5.0.0-beta1.min.js') }}"></script>
		<script src="{{ asset('assets/js/contact-form.js') }}"></script>
        <script src="{{ asset('assets/js/count-up.min.js') }}"></script>
        <script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
        <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
        <script src="{{ asset('assets/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('assets/js/imagesloaded.min.js') }}"></script>
		<script src="{{ asset('assets/js/main.js') }}"></script>



        <!-- Latest jQuery form server -->
        <script src="https://code.jquery.com/jquery.min.js"></script>
            
        <!-- Bootstrap JS form CDN -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        
        <!-- jQuery sticky menu -->
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
        
        <!-- jQuery easing -->
        <script src="{{ asset('assets/js/jquery.easing.1.3.min.js') }}"></script>
        
        <!-- Main Script -->
        <script src="{{ asset('assets/js/mains.js') }}"></script>
        
        <!-- Slider -->
        <script type="text/javascript" src="{{ asset('assets/js/bxslider.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/script.slider.js') }}"></script>







    </body>
</html>