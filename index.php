<?php
/*
##########[ LinaXSec V 0.1 ]##########
#Alhamdulilah Akhirnya Lutfi Anam Telah Merilis Aplikasi Open Source Pertamanya Yaitu LinaXSec Pada Hari Ini Yaitu Pada Tanggal 10 April 2020 Semoga Aplikasi Yang Lutfi Anam Buat Ini Bisa Bermanfaat Untuk Para Developer-Developer Aplikasi Web. Aplikasi Yang Lutfi Anam Buat Ini Bisa Mendeteksi Serangan Sql Injection ( v 0.1 ) Dan Menyimpan Log Serangan Di Database Aplikasi. Lutfi Anam Merilis Aplikasi LinaXSec Ini Karena Banyaknya Para Defacer / Cracker Yang Sering Merusak Aplikasi Web Tanpa Tanggung Jawab Sedikitpun.
#Nama : LinaXSec - Crack Detect
#Rilis : Jum'at 10 April 2020
#Developer : LinaX
#Coder : Lutfi Anam
#PERJANJIAN PENGGUNAAN
#Tribut : Aplikasi Ini Lutfi Anam Rilis Untuk Merayakan/Mensyukuri Umur Saya Yang Bertambah 1 Tahun, Yaitu Menjadi 17 Tahun ( Semoga Lutfi Anam Bisa Menjadi Orang Yang Lebih Baik Lagi Dan Berfikir Lebih Dewasa .... Aminn .... )
#Dengan menggunakan LinaXSec, maka anda setuju untuk :
#1. Tidak mengubah Nama Aplikasi LinaXSec menjadi nama aplikasi lain
#2. Tidak mengubah footer yang menunjukkan alamat website LinaXSec
#3. Tidak menjual Aplikasi LinaXSec. Tetapi anda diperbolehkan untuk mengambil keuntungan dari jasa proses instalasi, konsultasi dan lain sebagainya yang berkaitan dengan LinaXSec
#4. Tidak menhapus tribute dan Perjanjian Penggunaan
#Semoga Aplikasi LinaXSec dapat bermanfaat untuk kita semua.
################################
*/
include "config.php";
include "linaxsec.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="img/favicon.ico">

        <title>LinaXSec | Secure Your Website</title>

        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Owl Carousel CSS -->
        <link href="assets/css/owl.carousel.css" rel="stylesheet">
        <link href="assets/css/owl.theme.default.min.css" rel="stylesheet">

        <!-- Icon CSS -->
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">



        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>


    <body data-spy="scroll" data-target="#navbar-menu">

        <!-- Navbar -->
        <div class="navbar navbar-custom sticky navbar-fixed-top" role="navigation" id="sticky-nav">
            <div class="container">

                <!-- Navbar-header -->
                <div class="navbar-header">

                    <!-- Responsive menu button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- LOGO -->
                    <a class="navbar-brand logo" href="index.html">
                        Lina<span class="text-custom">X</span>Sec
                    </a>

                </div>
                <!-- end navbar-header -->

                <!-- menu -->
                <div class="navbar-collapse collapse" id="navbar-menu">

                    <!-- Navbar right -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="#home" class="nav-link">Home</a>
                        </li>
                        <li>
                            <a href="#features" class="nav-link">Features</a>
                        </li>
                        <li>
                            <a href="#donasi" class="nav-link">Donasi</a>
                       </li>
                       <li>
                            <a href="#clients" class="nav-link">Clients</a>
                        </li>
                        </li>
                        <li>
                            <a href="" class="btn btn-white-bordered navbar-btn">Download LinaXSec</a>
                        </li>
                    </ul>

                </div>
                <!--/Menu -->
            </div>
            <!-- end container -->
        </div>
        <!-- End navbar-custom -->



        <!-- HOME -->
        <section class="home bg-img-1" id="home">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="home-fullscreen">
                            <div class="full-screen">
                                <div class="home-wrapper home-wrapper-alt">
                                    <h2 class="font-light text-white">LinaXSec - Amankan Sebelum Di Serang</h2>
                                    <h4 class="text-white">LinaXSec Merupakan Aplikasi Penangkal Serangan Cracker. </h4>
                                    <a href="?+union+select+1,2,3,4--+-" class="btn btn-custom">Demo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END HOME -->


        <!-- Features -->
        <section class="section" id="features">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3 class="title">LinaXSec - Secure Your Website</h3>
                        <p class="text-muted sub-title">LinaXSec adalah sebuah aplikasi web untuk menangkal dari serangan defacer, saat ini LinaXSec dapat menangkal serangan Sql injection.</p>
                    </div>
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-sm-4">
                        <div class="features-box">
                            <i class="fa fa-code"></i>
                            <h4>Sqli Protection</h4>
                            <p class="text-muted">Mencegah Dari Serangan Injeksi Kode Sql Dalam Method Get Maupun Post.</p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="features-box">
                            <i class="fa fa-list"></i>
                            <h4>Log Serangan</h4>
                            <p class="text-muted">Menyimpan Log Serangan Kedalam Database.</p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="features-box">
                            <i class="fa fa-signal"></i>
                            <h4>Responsive Design</h4>
                            <p class="text-muted">Halaman Admininstrator Yang Responsive Dan User Friendly.</p>
                        </div>
                    </div>

                </div> <!-- end row -->

            </div> <!-- end container -->
        </section>
        <!-- end Features -->



        <!-- Features Alt -->
        <section class="section p-t-0">
            <div class="container">

                <div class="row">
                    <div class="col-sm-5">
                        <div class="feat-description m-t-20">
                            <h4>Kenapa LinaXSec.</h4>
                            <p class="text-muted">Karena Dalam industry 4.0 ini teknologi-teknologi semakin canggih dan para penjahat pun juga sudah semakin canggih jadi kita harus mengamankan data-data kita di internet khususnya website. </p>

                            <a href="" class="btn btn-custom">Learn More</a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-sm-offset-1">
                        <img src="assets/images/lxs.png" alt="img" class="img-responsive m-t-20">
                    </div>

                </div><!-- end row -->

            </div> <!-- end container -->
        </section>
        <!-- end features alt -->


        <!-- Features Alt -->
        <section class="section">
            <div class="container">

                <div class="row">
                    <div class="col-sm-6">
                        <img src="assets/images/lxs-v0.1.png" alt="img" class="img-responsive img-circle">
                    </div>

                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="feat-description">
                            <h4>Siapa pengembang aplikasi LinaXSec?.</h4>
                            <p class="text-muted">Perkenalkan Nama Saya Lutfi Anam, saya sekolah di Sma Islam Sudirman Tembarak, Hobi saya coding. Saya suka mempelajari hal yang baru. </p>

                            <a href="" class="btn btn-custom">Learn More</a>
                        </div>
                    </div>

                </div><!-- end row -->

            </div> <!-- end container -->
        </section>
        <!-- end features alt -->



        <!-- Testimonials section -->
        <section class="section bg-img-1">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                        <div class="owl-carousel text-center">
                            <div class="item">
                                <div class="testimonial-box">
                                    <h4>Keren Mas Aplikasinya, Karena aplikasi ini website saya jadi aman dari serangan Sql injection:').</h4>
                                    <img src="assets/images/user.jpg" class="testi-user img-circle" alt="testimonials-user">
                                    <p>- Linailil Muna</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial-box">
                                    <h4>Thanks Mas, karena aplikasi ini saya jadi bisa mencyduk 3 hacker.</h4>
                                    <img src="assets/images/user3.jpg" class="testi-user img-circle" alt="testimonials-user">
                                    <p>- Lutfi Anam</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End Testimonials section -->


        <!-- PRICING -->
        <section class="section" id="donasi">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3 class="title">Donasi Pengembang</h3>
                        <p class="text-muted sub-title">Silahkan melakukan donasi untuk mendukung pengembang aplikasi LinaXSec,Agar lebih bersemangat dalam mengembangkan aplikasi.</p>
                    </div>
                </div> <!-- end row -->


                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="row">

                            <!--Pricing Column-->
                            <article class="pricing-column col-lg-4 col-md-4">
                                <div class="inner-box">
                                    <div class="plan-header text-center">
                                        <h3 class="plan-title">Donasi</h3>
                                        <h2 class="plan-price">$?</h2>
                                        <div class="plan-duration">Paypal</div>
                                    </div>
                                    <ul class="plan-stats list-unstyled">
                                        <li> <i class="pe-7s-server"></i>Email : <b>lutfianamart@gmail.com</b></li>
                                    </ul>

                                    <div class="text-center">
                                        <a href="#" class="btn btn-sm btn-custom">Donasi Sekarang</a>
                                    </div>
                                </div>
                            </article>

                        </div>
                    </div><!-- end col -->
                </div>
                 <!-- end row -->

            </div> <!-- end container -->
        </section>
        <!-- End Pricing -->


        <!-- Clients -->
        <section class="section p-t-0" id="clients">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3 class="title">Client Kami</h3>
                        <p class="text-muted sub-title">Berikut adalah beberapa perusahaan yang menjadi client kami dan sekaligus mensupport perkembangan aplikasi LinaXSec.</p>
                    </div>
                </div>
                <!-- end row -->

                <div class="row text-center">
                    <div class="col-sm-12">
                        <ul class="list-inline client-list">
                            <li><a href="" title="Wegih Ngetik"><img src="assets/images/clients/wn-new.png" alt="clients"></a></li>
                        </ul>
                    </div> <!-- end Col -->

                </div><!-- end row -->

            </div>
        </section>
        <!--End  Clients -->


        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <a class="navbar-brand logo" href="index.html">
                            Lina<span class="text-custom">X</span>Sec
                        </a>
                    </div>
                    <div class="col-lg-4 col-lg-offset-3 col-md-7">
                        <ul class="nav navbar-nav">
                            <li><a href="#donasi">Donasi</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <ul class="social-icons">
                            <li><a href="http://fb.me/calonmastah.94"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="http://github.com/lutfianam"><i class="fa fa-github"></i></a></li>
                            <li><a href="https://m.youtube.com/channel/UCdOwtRhGrcCudgeGAqJWsXQ"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </footer>
        <!-- End Footer -->
        

        <!-- Back to top -->    
        <a href="#" class="back-to-top" id="back-to-top"> <i class="fa fa-angle-up"></i> </a>


        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- Jquery easing -->                                                      
        <script type="text/javascript" src="assets/js/jquery.easing.1.3.min.js"></script>

        <!-- Owl Carousel -->                                                      
        <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>

        <!--sticky header-->
        <script type="text/javascript" src="assets/js/jquery.sticky.js"></script>

        <!--common script for all pages-->
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                autoplay: true,
                autoplayTimeout: 4000,
                responsive:{
                    0:{
                        items:1
                    }
                }
            })
        </script>

    </body>
</html>