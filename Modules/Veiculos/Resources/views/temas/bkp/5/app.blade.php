<?php
/*
https://livedemo00.template-help.com/wt_52302/
*/

$data=["imagen"=>"imagen"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name = "format-detection" content = "telephone=no" />
  <script src="/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script><link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/temas/{!! $siteId['tema'] !!}/css/grid.css">
  <link rel="stylesheet" href="/temas/{!! $siteId['tema'] !!}/css/search.css">
  <link rel="stylesheet" href="/temas/{!! $siteId['tema'] !!}/css/contact-form.css">
  <link rel="stylesheet" href="/temas/{!! $siteId['tema'] !!}/css/camera.css">
  <link rel="stylesheet" href="/temas/{!! $siteId['tema'] !!}/booking/css/booking.css">
  <link rel="stylesheet" href="/temas/{!! $siteId['tema'] !!}/css/style.css">
  <script src="/temas/{!! $siteId['tema'] !!}/js/jquery.js"></script>
  <script src="/temas/{!! $siteId['tema'] !!}/js/device.min.js"></script>
  <script src="/temas/{!! $siteId['tema'] !!}/js/jquery-migrate-1.2.1.js"></script>
  <script src="/temas/{!! $siteId['tema'] !!}/js/camera.js"></script>
  <script src="/temas/{!! $siteId['tema'] !!}/js/jquery.equalheights.js"></script>
  <script src="/temas/{!! $siteId['tema'] !!}/search/search.js"></script>
  <script src="/temas/{!! $siteId['tema'] !!}/booking/js/booking.js"></script>
  <script src="/temas/{!! $siteId['tema'] !!}/booking/js/jquery.placeholder.js"></script>
  <script src="/temas/{!! $siteId['tema'] !!}/js/jquery.mobile.customized.min.js"></script>
  <script src="/temas/{!! $siteId['tema'] !!}/js/wow/wow.js"></script>
  <script>
    $(document).ready(function () {
      if ($('html').hasClass('desktop')) {
        new WOW().init();
      }
    });
  </script>
  <!--<![endif]-->
  <script>
    $(document).ready(function () {
      $('#camera_wrap').camera({
        loader: true,
        pagination: true,
        minHeight: '',
        thumbnails: false,
        height: '52.8735632183908%',
        caption: true,
        navigation: false,
        fx: 'simpleFade',
        onLoaded: function () {
          $('.slider-wrapper')[0].style.height = 'auto';
        }
      });
      $("#tabs").tabs();
      $('#bookingForm').bookingForm({
        ownerEmail: '#'
      });
      $('#bookingForm2').bookingForm({
        ownerEmail: '#'
      });
    });
  </script>
  <script src="/temas/{!! $siteId['tema'] !!}/js/jquery.tabs.js"></script>
</head>


<body>

<!--========================================================
                          HEADER
                          =========================================================-->
                          <header id="header">
                            <div class="info wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">
                              <div class="width-wrapper">
                                <h1>
                                  <a href="index.html">
                                    <span class="wrapper"><i class="fa fa-car"></i><strong>Car</strong>Sell</span>
                                  </a>
                                </h1>
                                <div class="authorization-block">
                                  <div class="authorization">
                                    <a class="create" href="#">Create an account</a>
                                    <span class="divider"></span>
                                    <a class="login" href="#">Login</a>
                                  </div>
                                  <a class="add btn-big" href="#"><span class="plus">+</span>Add advertisement</a>
                                </div>
                              </div>
                              <div class="clearfix"></div>
                            </div>
                            <div id="stuck_container">
                              <div class="width-wrapper">
                                <nav>
                                  <ul class="sf-menu">
                                    <li class="current"><a href="./3">Home</a></li>
                                    <li><a href="index-1.html">Find a car</a>
                                      <ul>
                                        <li><a href="#">Lorem ipsum</a></li>
                                        <li><a href="#">Conse ctetur</a>
                                          <ul>
                                            <li><a href="#">Pellentesque</a></li>
                                            <li><a href="#">Aliquam congue</a></li>
                                            <li><a href="#">Mauris accum</a></li>
                                            <li><a href="#">Mctetur</a></li>
                                          </ul>
                                        </li>
                                        <li><a href="#">Do eiusmod</a></li>
                                        <li><a href="#">Incididunt ut</a></li>
                                        <li><a href="#">Et dolore</a></li>
                                        <li><a href="#">Ut enim ad minim</a></li>
                                      </ul>
                                    </li>
                                    <li><a href="index-2.html">Used cars</a></li>
                                    <li><a href="index-3.html">New cars</a></li>
                                    <li><a href="contact">Contacts</a></li>
                                  </ul>
                                </nav>
                                <form id="search" action="search.php" method="GET" accept-charset="utf-8">
                                  <input type="text" name="s"/>
                                  <a onclick="document.getElementById('search').submit()">
                                    <div class="search_icon"></div>
                                  </a>
                                </form>
                                <div class="clearfix"></div>
                              </div>
                            </div>
                          </header>

<!--========================================================
                          CONTENT
                          =========================================================-->

                          @yield('content');

<!--========================================================
                          FOOTER
                          =========================================================-->
                          <footer id="footer">
                            <div class="width-wrapper width-wrapper__inset1 width-wrapper__inset2">
                              <div class="wrapper4">
                                <div class="container">
                                  <div class="row">
                                    <div class="grid_3">
                                      <div class="box2">
                                        <h5>Cars for sale</h5>
                                        <ul class="list1">
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s"><a href="#">Used cars for sale</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s"><a href="#">Second hand cars for sale</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s"><a href="#">New cars for sale</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s"><a href="#">Special Offers</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s"><a href="#">Compare Cars</a></li>
                                        </ul>
                                      </div>
                                    </div>
                                    <div class="grid_3">
                                      <div class="box2">
                                        <h5>Car research</h5>
                                        <ul class="list1">
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s"><a href="#">Research Cars</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s"><a href="#">Car Valuations</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s"><a href="#">Car Finance</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s"><a href="#">Car Insurance</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s"><a href="#">Car Comparisons</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s"><a href="#">Car Facts</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s"><a href="#">History Reports</a></li>
                                        </ul>
                                      </div>
                                    </div>
                                    <div class="grid_3">
                                      <div class="box2">
                                        <h5>News & Reviews</h5>
                                        <ul class="list1">
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s"><a href="#">Car News</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s"><a href="#">Car Reviews</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s"><a href="#">Car Videos</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s"><a href="#">Car Advice</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s"><a href="#">New Car Calendar</a></li>
                                        </ul>
                                      </div>
                                    </div>
                                    <div class="grid_3">
                                      <div class="box2">
                                        <h5>Categories</h5>
                                        <ul class="list1">
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s"><a href="#">New cars</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s"><a href="#">Bikes</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s"><a href="#">Boats</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s"><a href="#">Trucks</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s"><a href="#">Caravans</a></li>
                                          <li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s"><a href="#">Machinery</a></li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="wrapper5">
                              <div class="width-wrapper width-wrapper__inset1 width-wrapper__inset3">
                                <div class="container">
                                  <div class="row">
                                    <div class="grid_12">
                                      <div class="privacy-block wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                                        <a href="index.html">Car sell</a> &copy; <span id="copyright-year"></span>. <a
                                        href="index-5.html">Privacy policy</a>
                                        <!--{%FOOTER_LINK} -->
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </footer>

                          <script src="/temas/{!! $siteId['tema'] !!}/js/script.js"></script>
                          <script type="text/javascript">
                           var _gaq = _gaq || [];
                           _gaq.push(['_setAccount', 'UA-7078796-5']);
                           _gaq.push(['_trackPageview']);
                           (function() {
                            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                          })();</script>
                          <!-- Google Tag Manager --><noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-P9FT69" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script><!-- End Google Tag Manager --></body>
                          </html>