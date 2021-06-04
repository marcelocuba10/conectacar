<?php
$data=[
    "image" => "path"
];
?>

@extends('temas.2.app');

@section('content')

<!--=======content================================-->

<script src="/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script>
<link href="//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700%7COpen+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet" type="text/css">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link href="/temas/detail/css/jquery-ui.css" rel="stylesheet">
<link href="/temas/detail/css/bootstrap.css" rel="stylesheet">
<link href="/temas/detail/css/font-awesome.css" rel="stylesheet">
<link href="/temas/detail/css/elegant-icons.css" rel="stylesheet">
<link href="/temas/detail/css/light-gallery.css" rel="stylesheet">
<link href="/temas/detail/css/gflexslider.css" rel="stylesheet">
<link href="/temas/detail/css/superslides.css" rel="stylesheet">
<link href="/temas/detail/css/animate.css" rel="stylesheet">
<link href="/temas/detail/css/select2.css" rel="stylesheet">
<link href="/temas/detail/css/style.css" rel="stylesheet">
<script src="/temas/detail/js/jquery.js"></script>
<script src="/temas/detail/js/jquery-ui.js"></script>
<script src="/temas/detail/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/temas/detail/js/jquery.easing.1.3.js"></script>
<script src="/temas/detail/js/pointer-events.js"></script>
<script src="/temas/detail/js/superfish.js"></script>
<script src="/temas/detail/js/jquery.flexslider-min.js"></script>
<script src="/temas/detail/js/select2.js"></script>
<script src="/temas/detail/js/jquery.superslides.js"></script>
<script src="/temas/detail/js/jquery.sticky.js"></script>
<script src="/temas/detail/js/jquery.appear.js"></script>
<script src="/temas/detail/js/jquery.ui.totop.js"></script>
<script src="/temas/detail/js/jquery.caroufredsel.js"></script>
<script src="/temas/detail/js/jquery.touchSwipe.min.js"></script>
<script src="/temas/detail/js/material-parallax.js"></script>
<script src="/temas/detail/js/rd-navbar.js"></script>
<script src="/temas/detail/js/light-gallery.js"></script>
<script src="/temas/detail/js/rd-mailform.js"></script>
<script src="/temas/detail/js/scripts.js"></script>



<div id="main">
  <div class="section top4-wrapper novi-background">
    <div class="container">
      <div class="top4"></div>
    </div>
  </div>
  <div class="section breadcrumbs1_wrapper novi-background">
    <div class="container">
      <div class="breadcrumbs1"><a href="index.html">Home</a><span></span>Details</div>
    </div>
  </div>
  <div class="section section-md-bottom content novi-background bg-cover">
    <div class="container">
      <div class="row row-fix">
        <div class="col-sm-12 col-md-9 column-content">
          <div class="gslider-wrapper">
            <div id="gslider" class="flexslider">
              <ul class="slides">
                <li>
                  <img src="{!! verificaImagemSistem($data["image"]) !!}" alt="" class="img-responsive">
                </li>
                <li>
                  <img src="{!! verificaImagemSistem($data["image"]) !!}" alt="" class="img-responsive">
                </li>
                <li>
                  <img src="{!! verificaImagemSistem($data["image"]) !!}" alt="" class="img-responsive">
                </li>
              </ul>
            </div>
            <div id="carousel" class="flexslider">
              <ul class="slides">
                <li>
                  <img src="{!! verificaImagemSistem($data["image"]) !!}" alt="" class="img-responsive">
                </li>
                <li>
                  <img src="{!! verificaImagemSistem($data["image"]) !!}" alt="" class="img-responsive">
                </li>
                <li>
                  <img src="{!! verificaImagemSistem($data["image"]) !!}" alt="" class="img-responsive">
                </li>
              </ul>
            </div>
          </div>
          <div class="tabs2-wrapper">
            <ul class="tabs clearfix" data-tabgroup="second-tab-group">
              <li><a href="#tabs3-1">VEHICLE OVERVIEW</a></li>
              <li class="active"><a href="#tabs3-2">FEATURES & OPTIONS</a></li>
              <li><a href="#tabs3-3">VEHICLE LOCATION</a></li>
            </ul>
          </div>
          <div id="second-tab-group" class="tabgroup">
            <div id="tabs3-1">
              <div class="title2">DESCRIPTION
              </div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tortor dui, scelerisque ac nisi sed, rutrum
                euismod sem. Nunc eu tincidunt nulla. In posuere lorem sit amet felis placerat, quis hendrerit est
                rutrum. Phasellus non dui aliquam, eleifend enim dictum, laoreet nisl. Nam arcu nisi, venenatis nec
                semper sed, semper eget diam. Vestibulum id lorem metus. Aliquam felis elit, imperdiet non rutrum ac,
                euismod ut diam. Donec iaculis at lorem et placerat. Aenean dictum orci sed lectus vulputate, ut mattis
                justo feugiat. Pellentesque sodales urna quis nunc iaculis lobortis. Sed vel ligula egestas, tristique
                urna sit amet, rutrum enim. Fusce non dignissim tellus, sed commodo nulla. Nulla posuere, nunc ac
                ultrices pretium, mi quam dignissim magna, vel luctus magna sapien et velit. Quisque in felis odio.
              </p>
              <p>
                Proin euismod interdum nibh et posuere. Fusce tempus ligula vitae elit commodo, nec semper lorem
                aliquet. Morbi porttitor semper tortor, ac bibendum urna cursus in. Nulla porttitor risus mauris, ut
                rutrum dolor porta semper. Quisque eu magna nec diam auctor ultricies. Ut sed purus nec lectus porttitor
                pretium. Ut et scelerisque metus.
              </p>
              <p>
                Nullam sed efficitur sapien, sit amet consectetur sem. Curabitur faucibus aliquet finibus. Praesent
                ullamcorper, dui at sodales dictum, libero augue egestas urna, a placerat odio est at turpis. Ut dapibus
                ex eget sollicitudin sagittis. In hac habitasse platea dictumst. In in odio eget erat efficitur
                pellentesque sit amet at nulla. Morbi mollis mollis nibh consectetur pulvinar. Nullam sodales quis purus
                sed dignissim. Pellentesque porta finibus ante porta laoreet.
              </p>
              <p>
                Integer semper, eros luctus convallis convallis, nibh nulla volutpat libero, vitae dapibus mauris eros
                ut elit. Donec eleifend dui ac arcu condimentum, vel semper metus cursus. Integer a mauris ac magna
                tincidunt euismod ac sit amet ante. Quisque faucibus varius enim eget malesuada. Ut et consequat dolor.
                Nam ornare lectus in suscipit feugiat. In eu semper sapien. Nulla varius consectetur dapibus. Phasellus
                varius tellus velit, vitae mollis purus efficitur sit amet. Etiam aliquam bibendum risus, non convallis
                dolor pharetra non. Fusce
              </p>
            </div>
            <div id="tabs3-2">
              <div class="row row-fix">
                <div class="col-sm-6">
                  <div class="title2">EXTRA FEATURES</div>
                  <div class="row">
                    <div class="col-sm-6">
                      <ul class="ul3">
                        <li><a href="#">Alloy Wheels</a></li>
                        <li><a href="#">Anti-Lock Brakes (ABS)</a></li>
                        <li><a href="#">Anti-Theft</a></li>
                        <li><a href="#">Anti-Starter</a></li>
                        <li><a href="#">Security System</a></li>
                        <li><a href="#">Air Conditioning</a></li>
                        <li><a href="#">Alloy Wheels</a></li>
                        <li><a href="#">Anti-Lock Brakes (ABS)</a></li>
                        <li><a href="#">Anti-Theft</a></li>
                        <li><a href="#">Anti-Starter</a></li>
                        <li><a href="#">Security System</a></li>
                        <li><a href="#">Air Conditioning</a></li>
                        <li><a href="#">Alloy Wheels</a></li>
                        <li><a href="#">Anti-Lock Brakes (ABS)</a></li>
                        <li><a href="#">Anti-Theft</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-6">
                      <ul class="ul3">
                        <li><a href="#">Alloy Wheels</a></li>
                        <li><a href="#">Anti-Lock Brakes (ABS)</a></li>
                        <li><a href="#">Anti-Theft</a></li>
                        <li><a href="#">Anti-Starter</a></li>
                        <li><a href="#">Security System</a></li>
                        <li><a href="#">Air Conditioning</a></li>
                        <li><a href="#">Alloy Wheels</a></li>
                        <li><a href="#">Anti-Lock Brakes (ABS)</a></li>
                        <li><a href="#">Anti-Theft</a></li>
                        <li><a href="#">Anti-Starter</a></li>
                        <li><a href="#">Security System</a></li>
                        <li><a href="#">Air Conditioning</a></li>
                        <li><a href="#">Alloy Wheels</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="title2">Essential Options</div>
                  <div class="row">
                    <div class="col-sm-6">
                      <ul class="ul3">
                        <li><a href="#">Alloy Wheels</a></li>
                        <li><a href="#">Anti-Lock Brakes (ABS)</a></li>
                        <li><a href="#">Anti-Theft</a></li>
                        <li><a href="#">Anti-Starter</a></li>
                        <li><a href="#">Security System</a></li>
                        <li><a href="#">Air Conditioning</a></li>
                        <li><a href="#">Alloy Wheels</a></li>
                        <li><a href="#">Anti-Lock Brakes (ABS)</a></li>
                        <li><a href="#">Anti-Theft</a></li>
                        <li><a href="#">Anti-Starter</a></li>
                        <li><a href="#">Security System</a></li>
                        <li><a href="#">Air Conditioning</a></li>
                        <li><a href="#">Alloy Wheels</a></li>
                        <li><a href="#">Anti-Lock Brakes (ABS)</a></li>
                        <li><a href="#">Anti-Theft</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-6">
                      <ul class="ul3">
                        <li><a href="#">Alloy Wheels</a></li>
                        <li><a href="#">Anti-Lock Brakes (ABS)</a></li>
                        <li><a href="#">Anti-Theft</a></li>
                        <li><a href="#">Anti-Starter</a></li>
                        <li><a href="#">Security System</a></li>
                        <li><a href="#">Air Conditioning</a></li>
                        <li><a href="#">Alloy Wheels</a></li>
                        <li><a href="#">Anti-Lock Brakes (ABS)</a></li>
                        <li><a href="#">Anti-Theft</a></li>
                        <li><a href="#">Anti-Starter</a></li>
                        <li><a href="#">Security System</a></li>
                        <li><a href="#">Air Conditioning</a></li>
                        <li><a href="#">Alloy Wheels</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="tabs3-3">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tortor dui, scelerisque ac nisi sed, rutrum
                euismod sem. Nunc eu tincidunt nulla. In posuere lorem sit amet felis placerat, quis hendrerit est
                rutrum. Phasellus non dui aliquam, eleifend enim dictum, laoreet nisl. Nam arcu nisi, venenatis nec
                semper sed, semper eget diam. Vestibulum id lorem metus. Aliquam felis elit, imperdiet non rutrum ac,
                euismod ut diam. Donec iaculis at lorem et placerat. Aenean dictum orci sed lectus vulputate, ut mattis
                justo feugiat. Pellentesque sodales urna quis nunc iaculis lobortis. Sed vel ligula egestas, tristique
                urna sit amet, rutrum enim. Fusce non dignissim tellus, sed commodo nulla. Nulla posuere, nunc ac
                ultrices pretium, mi quam dignissim magna, vel luctus magna sapien et velit. Quisque in felis odio.
              </p>
              <div class="google-map-container google-map-2" data-zoom='5' data-center="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-zoom="14" data-icon="images/gmap_marker.png" data-icon-active="images/gmap_marker_active.png" data-styles="[{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#e9e9e9&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f5f5f5&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:29},{&quot;weight&quot;:0.2}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:18}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:16}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f5f5f5&quot;},{&quot;lightness&quot;:21}]},{&quot;featureType&quot;:&quot;poi.park&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#dedede&quot;},{&quot;lightness&quot;:21}]},{&quot;elementType&quot;:&quot;labels.text.stroke&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:16}]},{&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:36},{&quot;color&quot;:&quot;#333333&quot;},{&quot;lightness&quot;:40}]},{&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f2f2f2&quot;},{&quot;lightness&quot;:19}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;},{&quot;lightness&quot;:17},{&quot;weight&quot;:1.2}]}]">
                <div class="google-map"></div>
                <ul class="google-map-markers">
                  <li data-location="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-description="9870 St Vincent Place, Glasgow"></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-3 column-sidebar">
          <div class="row">
            <div class="col-sm-6 col-md-12">
              <div class="banner2-wrapper">
                <div class="contact-banner">
                  <div class="top-info clearfix">
                    <div class="info1">
                      <div class="banner-title">BMW M3</div>
                      <div class="txt2">
                        <span class="txt">FIRST DRIVE REVIEW</span>
                        <span class="stars">
                    <i class="fa fa-star novi-icon" aria-hidden="true"></i>
                    <i class="fa fa-star novi-icon" aria-hidden="true"></i>
                    <i class="fa fa-star novi-icon" aria-hidden="true"></i>
                    <i class="fa fa-star novi-icon" aria-hidden="true"></i>
                    <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>
                  </span>
                      </div>
                    </div>
                  </div>
                  <div class="txt3">$199,415</div>
                  <div class="txt4">George Freeman</div>
                  <div class="txt5">44 Shirley Ave. <br>
                    West Chicago, IL 60185<br>
                    Phone: <a href="tel:#">+1 (312) 954-1151</a>
                  </div>
                  <div class="form-wrapper">
                    <div id="note2"></div>
                    <div id="fields2">
                      <form id="ajax-contact-form2" class="form-horizontal rd-mailform" data-form-output="form-output-global" data-form-type="forms" method="post" action="bat/rd-mailform.php">
                        <div class="form-group form-wrap">
                          <label for="inputEmail">Email</label><input type="text" class="form-control" id="inputEmail" name="email" placeholder="E-mail address" data-constraints="@Email @Required">
                        </div>
                        <div class="form-group form-wrap">
                          <label for="inputMessage">Your Message</label>
                          <textarea class="form-control" rows="9" id="inputMessage" placeholder="Message" name="content" data-constraints="@Required"></textarea>
                        </div>
                        <div class="checkbox-inline">
                          <label>
                            <input type="checkbox"> Send me a copy of this message
                          </label>
                        </div>
                        <div class="checkbox-inline">
                          <label>
                            <input type="checkbox" checked> Subscribe to our Newsletter
                          </label>
                        </div>
                        <button type="submit" class="btn-default btn-cf-submit2">SEND E-MAIL</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-3">
          <div class="product-minimal">
            <div class="thumbnail clearfix">
              <figure class="product-minimal-img">
                <a href="details.html">
                  <img src="{!! verificaImagemSistem($data["image"]) !!}" alt="" class="img-responsive"> </a>
              </figure>
              <div class="caption">
                <p class="small">REGISTERED 2015</p>
                <div class="product-minimal-title"><a href="details.html"> BMW M6 Sport Hybrid</a></div>
                <div class="info">
                  <span class="price">24,380</span>
                  <span class="speed">35,000 KM</span>
                </div>
                <ul class="tag-list">
                  <li><a href="#">Used</a></li>
                  <li><a href="#">2015</a></li>
                  <li><a href="#">Automatic</a></li>
                  <li><a href="#">White</a></li>
                  <li><a href="#">Petrol</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-3">
          <div class="product-minimal">
            <div class="thumbnail clearfix">
              <figure class="product-minimal-img">
                <a href="details.html">
                  <img src="{!! verificaImagemSistem($data["image"]) !!}" alt="" class="img-responsive"> </a>
              </figure>
              <div class="caption">
                <p class="small">REGISTERED 2016</p>
                <div class="product-minimal-title"><a href="details.html"> 2016 Ferrari Testarosa</a></div>
                <div class="info">
                  <span class="price">95,900</span>
                  <span class="speed">99,000 KM</span>
                </div>
                <ul class="tag-list">
                  <li><a href="#">Used</a></li>
                  <li><a href="#">2015</a></li>
                  <li><a href="#">Automatic</a></li>
                  <li><a href="#">Red</a></li>
                  <li><a href="#">Petrol</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-3">
          <div class="product-minimal">
            <div class="thumbnail clearfix">
              <figure class="product-minimal-img">
                <a href="details.html">
                  <img src="{!! verificaImagemSistem($data["image"]) !!}" alt="" class="img-responsive"> </a>
              </figure>
              <div class="caption">
                <p class="small">REGISTERED 2015</p>
                <div class="product-minimal-title"><a href="details.html"> 2016 Bugatti Veyron</a></div>
                <div class="info">
                  <span class="price">98,995</span>
                  <span class="speed">95,000 KM</span>
                </div>
                <ul class="tag-list">
                  <li><a href="#">Used</a></li>
                  <li><a href="#">2015</a></li>
                  <li><a href="#">Automatic</a></li>
                  <li><a href="#">Blue</a></li>
                  <li><a href="#">Petrol</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxs-12 col-xs-6 col-sm-6 col-md-3">
          <div class="product-minimal">
            <div class="thumbnail clearfix">
              <figure class="product-minimal-img">
                <a href="details.html">
                  <img src="{!! verificaImagemSistem($data["image"]) !!}" alt="" class="img-responsive"> </a>
              </figure>
              <div class="caption">
                <p class="small">REGISTERED 2017</p>
                <div class="product-minimal-title"><a href="details.html"> 2017 Lexus-AMG C63</a></div>
                <div class="info">
                  <span class="price">31,900</span>
                  <span class="speed">12,000 KM</span>
                </div>
                <ul class="tag-list">
                  <li><a href="#">Used</a></li>
                  <li><a href="#">2015</a></li>
                  <li><a href="#">Automatic</a></li>
                  <li><a href="#">Red</a></li>
                  <li><a href="#">Petrol</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade popup-form" id="SignIn" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> Sign In</h4>
        <form class="rd-mailform"  data-form-output="form-output-global" data-form-type="forms" method="post" action="bat/rd-mailform.php">
          <div class="row row-fix">
            <div class="col-sm-12">
              <div class="form-group form-wrap"><label for="singInName" >Your
                Name</label><input type="text" class="form-control" id="singInName" name="name"   data-constraints='@Required'>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group form-wrap">
                <label for="password">Password</label><input type="password" class="form-control" id="password" name="pas"  data-constraints='@Required'>
              </div>
            </div>
          </div>

          <button type="submit" class="btn-default btn-form2-submit">Submit</button>
        </form>
      </div>

    </div>
  </div>
</div>
<div class="modal fade popup-form" id="register" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> register</h4>
        <form class="rd-mailform"  data-form-output="form-output-global" data-form-type="forms" method="post" action="bat/rd-mailform.php">
          <div class="row row-fix">
            <div class="col-sm-12">
              <div class="form-group form-wrap"><label for="regName">Your
                Name</label><input type="text" class="form-control" id="regName" name="name"  data-constraints='@Required'>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group form-wrap">
                <label for="regEmail">Email</label><input type="text" class="form-control" id="regEmail" name="email"  data-constraints='@Required @Email'>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group form-wrap">
                <label for="passwordReg">Password</label><input type="password" class="form-control" id="passwordReg" name="pas" data-constraints='@Required'>
              </div>
            </div>
          </div>
          <button type="submit" class="btn-default btn-form2-submit">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="snackbars" id="form-output-global"></div>
<script src="/temas/detail/js/bootstrap.min.js"></script>
<!-- Google Tag Manager --><noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-P9FT69" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script><!-- End Google Tag Manager --></body>

@endsection