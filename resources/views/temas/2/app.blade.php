<?php

  $data=["imagen"=>"imagen"];

?>

<!-- https://livedemo00.template-help.com/wt_57633/ -->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="format-detection" content="telephone=no"/>
  <script src="/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script><link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/temas/2/css/rd-mailform.css"/>
  <link rel="stylesheet" href="/temas/2/css/grid.css">
  <link rel="stylesheet" href="/temas/2/css/style.css">
  <link rel='stylesheet' href='/temas/2/css/font-awesome.css'>
  <link rel='stylesheet' href='/temas/2/css/material-icons.css'>
  <link rel='stylesheet' href='/temas/2/css/camera.css'>
  <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Raleway:300'>
  <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Montserrat+Subrayada:700'>
  <script src="/temas/2/js/jquery.js"></script>
  <script src="/temas/2/js/jquery-migrate-1.2.1.js"></script>
  <script src='/temas/2/js/device.min.js'></script>
</head>
<body>
<div class="page">
  
  @yield('content');

  <!--========================================================
                            FOOTER
  =========================================================-->
  <footer class="text-center">
      <div class="container-fluid container-inset well-md relative">
        <div class="row">
          <div class="col-md-6 col-lg-5 inset-2 text-md-left">
            <h2>Contacts</h2>
            <address class="contact-info">
              <ul class="list text-left text-xs-center text-md-left wow fadeInUp" data-wow-delay=".1s">
               <li>
                 <span class="icon icon-default icon-md material-icons-location_on"></span>
                  My Company Glasgow D04 89GR
               </li>
                <li>
                  <span class="icon icon-default icon-md material-icons-phone"></span>
                  <a href="callto:#">800-2345-6789</a>
                </li>
                <li>
                  <span class="icon icon-default icon-md material-icons-email"></span>
                  <a href="mailto:#">info@demolink.org</a>
                </li>
                <li>
                  <span class="icon icon-default icon-md material-icons-schedule"></span>
                  7 Days a week from 9:00 am to 7:00 pm
                </li>
              </ul>
            </address>
            <ul class="inline-list">
              <li><a href="#" class="icon icon-default icon-sm fa-facebook"></a></li>
              <li><a href="#" class="icon icon-default icon-sm fa-twitter"></a></li>
              <li><a href="#" class="icon icon-default icon-sm fa-google-plus"></a></li>
            </ul>
            <div class="map-wrap">
              <div class="map">
                <div id="google-map" class="map_model"></div>
                <ul class="map_locations">
                  <li data-x="-73.9874068" data-y="40.643180">
                    <p> 9870 St Vincent Place, Glasgow, DC 45 Fr 45. <span>800 2345-6789</span></p>
                  </li>
                </ul>
              </div>
            </div>
            <div class="copyright">
              Car Rentals &nbsp;© <span id="copyright-year"></span>.
              <a href="index-5.html">&nbsp;Privacy Policy</a>
              <!-- {%FOOTER_LINK} -->
            </div>
          </div>
        </div>
      </div>
  </footer>
</div>
<script src="/temas/2/js/script.js"></script>
</html>