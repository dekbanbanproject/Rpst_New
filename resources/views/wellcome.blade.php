@extends('layouts.fontend2021')
@section('content')

   <section id="slider" class="pt-130">
        <div class="slider-area">           
            <div class="block-slider block-slider4">
                <ul class="" id="bxslider-home4">
                    <li><img src="{{ asset('assets/img/Slide/slide_8.jpg') }}" alt="Slide">
                        <div class="caption-group">
                        <h2 class="caption title">
                             <span class="primary"> <strong>GTWBACKOffice</strong></span>
                            </h2>
                            <h4 class="caption subtitle">Backoffice professional design</h4>
                            <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/Slide/slide_7.jpg') }}" alt="Slide">
                        <div class="caption-group">
                            <h2 class="caption title">
                                Fujitsu <span class="primary"> <strong>FI-7140</strong></span>
                            </h2>
                            <h4 class="caption subtitle">Scanner Fast Speed</h4>
                            <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('assets/img/Slide/slide_3.jpg') }}" alt="Slide">
                        <div class="caption-group">
                            <h2 class="caption title">
                                Fujitsu <span class="primary"> <strong>FI-7160</strong></span>
                            </h2>
                            <h4 class="caption subtitle">Scanner Fast Speed</h4>
                            <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                        </div>
                    </li>
                    <li><img src="{{ asset('assets/img/Slide/slide_4.jpg') }}" alt="Slide">
                        <div class="caption-group">
                            <h2 class="caption title">
                                Fujitsu <span class="primary"> <strong>SP-1120</strong></span>
                            </h2>
                            <h4 class="caption subtitle">Image Scanners</h4>
                            <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                        </div>
                    </li>
                    <li><img src="{{ asset('assets/img/Slide/slide_5.jpg') }}" alt="Slide">
                        <div class="caption-group">
                            <h2 class="caption title">
                                Fujitsu <span class="primary"><strong>SP-1130</strong></span>
                            </h2>
                            <h4 class="caption subtitle">Image Scanners</h4>
                            <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                        </div>
                    </li>
                    <li><img src="{{ asset('assets/img/Slide/slide_6.jpg') }}" alt="Slide">
                        <div class="caption-group">
                        <h2 class="caption title">
                            Fujitsu <span class="primary"> <strong>FI-6400</strong></span>
                            </h2>
                            <h4 class="caption subtitle">Remarkable small design</h4>
                            <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                        </div>
                    </li>
                   
                </ul>
            </div>        
        </div> 
    </section>
    <!-- ========================= hero-section start ========================= -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="hero-content-wrapper">
                        <h2 class="mb-25 wow fadeInDown" data-wow-delay=".2s">ระบบจัดเก็บแฟ้มประวัติการส่งงานสารบรรณ</h2>
                        <h1 class="mb-25 wow fadeInDown" data-wow-delay=".2s">สาธารณสุขอำเภอ</h1>
                        <p class="mb-35 wow fadeInLeft" data-wow-delay=".4s">รับหนังสือราชการ-ส่งหนังสือราชการ และกระจายสู่ รพ.สต.</p>
                        <a href="javascript:void(0)" class="theme-btn">Get Started</a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="hero-img">
                        <div class="d-inline-block hero-img-right">
                            <img src="assets/img/hero/hero-img.png" alt="" class="image wow fadeInRight" data-wow-delay=".5s">
                            <img src="assets/img/hero/dots.shape.svg" alt="" class="dot-shape">
                            <div class="video-btn">
                                <a href="https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM" class="glightbox"><i class="lni lni-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= hero-section end ========================= -->

     <!-- ========================= subscribe-section start ========================= -->
     <section class="subscribe-section pt-70 pb-70 img-bg" style="background-image: url('assets/img/bg/common-bg.svg')">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="section-title mb-30">
                            <span class="text-white wow fadeInDown" data-wow-delay=".2s">Subscribe</span>
                            <h2 class="text-white mb-40 wow fadeInUp" data-wow-delay=".4s">Subscribe Our Newsletter</h2>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">                      
                        <form action="{{ route('subscribe_indexsave') }}" method="post" enctype="multipart/form-data" class="subscribe-form wow fadeInRight" data-wow-delay=".4s">
                            @csrf
                            <input type="text" name="email" id="email" placeholder="Your Email">
                            <!-- <button type="submit"><i class="fas fa-at">Send</i></button> -->
                            <button type="submit" style="width: 90px;">Send&nbsp;&nbsp;&nbsp;</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- ========================= subscribe-section end ========================= -->











@endsection