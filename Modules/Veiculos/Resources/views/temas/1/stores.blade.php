<?php

  $data=["imagen"=>"imagen"]

?>

@extends('temas.1.app')
@section('content')

<head><title>Listing</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <script src="/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script><link href="//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700%7COpen+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet" type="text/css">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  
    <link href="css/jquery-ui.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/light-gallery.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/elegant-icons.css" rel="stylesheet">
    <link href="css/superslides.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/select2.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/pointer-events.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/select2.js"></script>
    <script src="js/jquery.superslides.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/jquery.ui.totop.js"></script>
    <script src="js/jquery.caroufredsel.js"></script>
    <script src="js/jquery.touchSwipe.min.js"></script>
    <script src="js/material-parallax.js"></script>
    <script src="js/rd-navbar.js"></script>
  
    <script src="js/light-gallery.js"></script>
  
    <script src="js/rd-mailform.js"></script>
    <script src="js/scripts.js"></script>
 </head>

  <div class="section">
    <div class="top3-wrapper novi-background bg-cover">
      <div class="container">
        <div class="top3 clearfix">
          <div class="tabs-wrapper">
            <div class="txt">SELECT VIEW</div>
            <div class="tabs1-wrapper">
              <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                <li class="active"><a href="#tabs2-1"><i class="fa fa-list"></i></a></li>
                <li><a href="#tabs2-2"><i class="fa fa-th"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="sort-wrapper">
            <div class="txt">sort by</div>
            <div class="select1_wrapper"><label>Sort</label>
              <div class="select1_inner"><select class="select2 select" style="width: 100%">
                <option value="1">Last Added</option>
                <option value="2">Popular</option>
                <option value="3">Price</option>
              </select></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="breadcrumbs1_wrapper novi-background">
      <div class="container">
        <div class="breadcrumbs1"><a href="index.html">Home</a><span></span>Search Results</div>
      </div>
    </div>
    <div class="section-md-bottom content novi-background bg-cover">
      <div class="container">
        <div class="row row-fix">
          <div class="col-sm-12 col-md-9  column-content">
            <div id="first-tab-group" class="tabgroup">
              <div id="tabs2-1">
                <div class="product-list-classic">
                  <div class="product-box-horizontal">
                    <div class="product-box-inner">
                      <figure><a href="details.html"><img src="/temas/1/images/listing-1-322x230.jpg" alt="" class="img-responsive"></a></figure>
                      <div class="caption">
                        <div class="caption-header">
                          <div class="info1">
                            <div class="txt1"><a href="details.html">Audi S Coupe</a></div>
                            <div class="txt2"><span class="txt">FIRST DRIVE REVIEW</span> <span class="stars">                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>                         </span>
                            </div>
                          </div>
                          <div class="info2">
                            <div class="txt3">$99,415</div>
                          </div>
                        </div>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </p>
                        <div class="caption-footer">
                          <div class="info3">
                            <div class="txt5">0 kM</div>
                            <ul class="tag-list">
                              <li><a href="#">Registered 2017</a></li>
                              <li><a href="#">New</a></li>
                              <li><a href="#">8-Speed Automatic</a></li>
                              <li><a href="#">Petrol</a></li>
                            </ul>
                          </div>
                          <div class="txt7"><a href="details.html" class="btn-default btn3">VIEW DETAILS</a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-box-horizontal">
                    <div class="product-box-inner">
                      <figure><a href="details.html"><img src="/temas/1/images/listing-1-322x230.jpg" alt="" class="img-responsive"></a></figure>
                      <div class="caption">
                        <div class="caption-header">
                          <div class="info1">
                            <div class="txt1"><a href="details.html">Range Rover Discovery</a></div>
                            <div class="txt2"><span class="txt">FIRST DRIVE REVIEW</span> <span class="stars">                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star-half-o novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>                         </span>
                            </div>
                          </div>
                          <div class="info2">
                            <div class="txt3">$209,415</div>
                          </div>
                        </div>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </p>
                        <div class="caption-footer">
                          <div class="info3">
                            <div class="txt5">60,560 kM</div>
                            <ul class="tag-list">
                              <li><a href="#">Registered 2017</a></li>
                              <li><a href="#">New</a></li>
                              <li><a href="#">8-Speed Automatic</a></li>
                              <li><a href="#">Petrol</a></li>
                            </ul>
                          </div>
                          <div class="txt7"><a href="details.html" class="btn-default btn3">VIEW DETAILS</a></div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-box-horizontal">
                    <div class="product-box-inner">
                      <figure><a href="details.html"><img src="/temas/1/images/listing-1-322x230.jpg" alt="" class="img-responsive"></a></figure>
                      <div class="caption">
                        <div class="caption-header">
                          <div class="info1">
                            <div class="txt1"><a href="details.html">Mercedes Benz C220</a></div>
                            <div class="txt2"><span class="txt">FIRST DRIVE REVIEW</span> <span class="stars">                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>                         </span>
                            </div>
                          </div>
                          <div class="info2">
                            <div class="txt3">$99,415</div>
                          </div>
                        </div>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </p>
                        <div class="caption-footer">
                          <div class="info3">
                            <div class="txt5">0 kM</div>
                            <ul class="tag-list">
                              <li><a href="#">Registered 2017</a></li>
                              <li><a href="#">New</a></li>
                              <li><a href="#">8-Speed Automatic</a></li>
                              <li><a href="#">Petrol</a></li>
                            </ul>
                          </div>

                          <div class="txt7"><a href="details.html" class="btn-default btn3">VIEW DETAILS</a></div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-box-horizontal">
                    <div class="product-box-inner">
                      <figure><a href="details.html"><img src="/temas/1/images/listing-1-322x230.jpg" alt="" class="img-responsive"></a></figure>
                      <div class="caption">
                        <div class="caption-header">
                          <div class="info1">
                            <div class="txt1"><a href="details.html">Mercedes Benz GLC</a></div>
                            <div class="txt2"><span class="txt">FIRST DRIVE REVIEW</span> <span class="stars">                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>                         </span>
                            </div>
                          </div>
                          <div class="info2">
                            <div class="txt3">$99,415</div>
                          </div>
                        </div>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </p>
                        <div class="caption-footer">
                          <div class="info3">
                            <div class="txt5">0 kM</div>
                            <ul class="tag-list">
                              <li><a href="#">Registered 2017</a></li>
                              <li><a href="#">New</a></li>
                              <li><a href="#">8-Speed Automatic</a></li>
                              <li><a href="#">Petrol</a></li>
                            </ul>
                          </div>

                          <div class="txt7"><a href="details.html" class="btn-default btn3">VIEW DETAILS</a></div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-box-horizontal">
                    <div class="product-box-inner">
                      <figure><a href="details.html"><img src="/temas/1/images/listing-1-322x230.jpg" alt="" class="img-responsive"></a></figure>
                      <div class="caption">
                        <div class="caption-header">
                          <div class="info1">
                            <div class="txt1"><a href="details.html">Audi TT</a></div>
                            <div class="txt2"><span class="txt">FIRST DRIVE REVIEW</span> <span class="stars">                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>                         </span>
                            </div>
                          </div>
                          <div class="info2">
                            <div class="txt3">$99,415</div>
                          </div>
                        </div>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </p>
                        <div class="caption-footer">
                          <div class="info3">
                            <div class="txt5">0 kM</div>
                            <ul class="tag-list">
                              <li><a href="#">Registered 2017</a></li>
                              <li><a href="#">New</a></li>
                              <li><a href="#">8-Speed Automatic</a></li>
                              <li><a href="#">Petrol</a></li>
                            </ul>
                          </div>
                          <div class="txt7"><a href="details.html" class="btn-default btn3">VIEW DETAILS</a></div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-box-horizontal">
                    <div class="product-box-inner">
                      <figure><a href="details.html"><img src="/temas/1/images/listing-1-322x230.jpg" alt="" class="img-responsive"></a></figure>
                      <div class="caption">
                        <div class="caption-header">
                          <div class="info1">
                            <div class="txt1"><a href="details.html">Toyota Prado (Model - 2013)</a></div>
                            <div class="txt2"><span class="txt">FIRST DRIVE REVIEW</span> <span class="stars">                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star novi-icon" aria-hidden="true"></i>                           <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>                         </span>
                            </div>
                          </div>
                          <div class="info2">
                            <div class="txt3">$99,415</div>
                          </div>
                        </div>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </p>
                        <div class="caption-footer">
                          <div class="info3">
                            <div class="txt5">0 kM</div>
                            <ul class="tag-list">
                              <li><a href="#">Registered 2017</a></li>
                              <li><a href="#">New</a></li>
                              <li><a href="#">8-Speed Automatic</a></li>
                              <li><a href="#">Petrol</a></li>
                            </ul>
                          </div>

                          <div class="txt7"><a href="details.html" class="btn-default btn3">VIEW DETAILS</a></div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pager_wrapper">
                  <ul class="pager clearfix">
                    <li class="prev"><a href="#"></a></li>
                    <li class="active"><span>1</span></li>
                    <li class="li"><a href="#">2</a></li>
                    <li class="li"><a href="#">3</a></li>
                    <li class="li"><a href="#">4</a></li>
                    <li class="dots">....</li>
                    <li class="next"><a href="#"></a></li>
                  </ul>
                </div>
              </div>
              <div id="tabs2-2">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="product-box-vertical">
                      <div class="box-vertical-inner">
                        <figure><a href="details.html"><img src="/temas/1/images/listing-1-260x230.jpg" alt="" class="img-responsive"></a></figure>
                        <div class="caption">
                          <div class="caption-header">
                            <div class="info1">
                              <div class="txt1"><a href="details.html">Audi S Coupe</a></div>
                              <div class="txt2"><span class="txt">FIRST DRIVE REVIEW</span> <span class="stars">                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>                             </span>
                              </div>
                            </div>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Ut enim ad minim veniam, quis nostrud exercitation ullamco ...
                          </p>

                          <ul class="list1">
                            <li><a href="#">Registered 2015</a></li>
                            <li><a href="#">Used</a></li>
                            <li><a href="#">8-Speed Automatic</a></li>
                            <li><a href="#">Petrol</a></li>
                          </ul>

                          <div class="txt5">31,730 KM</div>
                          <div class="caption-footer">
                            <div class="info2">
                              <div class="txt6">$68,213</div>
                            </div>
                            <div class="info3">
                              <div class="txt7"><a href="details.html" class="btn-default btn3">VIEW DETAILS</a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="product-box-vertical">
                      <div class="box-vertical-inner">
                        <figure><a href="details.html"><img src="/temas/1/images/listing-2-260x230.jpg" alt="" class="img-responsive"></a></figure>
                        <div class="caption">
                          <div class="caption-header">
                            <div class="info1">
                              <div class="txt1"><a href="details.html">Range Rover Discovery</a></div>
                              <div class="txt2"><span class="txt">FIRST DRIVE REVIEW</span> <span class="stars">                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>                             </span>
                              </div>
                            </div>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Ut enim ad minim veniam, quis nostrud exercitation ullamco ...
                          </p>
                          <ul class="list1">
                            <li><a href="#">Registered 2015</a></li>
                            <li><a href="#">Used</a></li>
                            <li><a href="#">8-Speed Automatic</a></li>
                            <li><a href="#">Petrol</a></li>
                          </ul>
                          <div class="txt5">31,730 KM</div>
                          <div class="caption-footer">
                            <div class="info2">
                              <div class="txt6">$68,213</div>
                            </div>
                            <div class="info3">
                              <div class="txt7"><a href="details.html" class="btn-default btn3">VIEW DETAILS</a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="product-box-vertical">
                      <div class="box-vertical-inner">
                        <figure><a href="details.html"><img src="/temas/1/images/listing-3-260x230.jpg" alt="" class="img-responsive"></a></figure>
                        <div class="caption">
                          <div class="caption-header">
                            <div class="info1">
                              <div class="txt1"><a href="details.html">Mercedes Benz C220</a></div>
                              <div class="txt2"><span class="txt">FIRST DRIVE REVIEW</span> <span class="stars">                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>                             </span>
                              </div>
                            </div>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Ut enim ad minim veniam, quis nostrud exercitation ullamco ...
                          </p>
                          <ul class="list1">
                            <li><a href="#">Registered 2015</a></li>
                            <li><a href="#">Used</a></li>
                            <li><a href="#">8-Speed Automatic</a></li>
                            <li><a href="#">Petrol</a></li>
                          </ul>
                          <div class="txt5">31,730 KM</div>
                          <div class="caption-footer">
                            <div class="info2">
                              <div class="txt6">$68,213</div>
                            </div>
                            <div class="info3">
                              <div class="txt7"><a href="details.html" class="btn-default btn3">VIEW DETAILS</a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="product-box-vertical">
                      <div class="box-vertical-inner">
                        <figure><a href="details.html"><img src="/temas/1/images/listing-4-260x230.jpg" alt="" class="img-responsive"></a></figure>
                        <div class="caption">
                          <div class="caption-header">
                            <div class="info1">
                              <div class="txt1"><a href="details.html">Mercedes Benz GLC</a></div>
                              <div class="txt2"><span class="txt">FIRST DRIVE REVIEW</span> <span class="stars">                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>                             </span>
                              </div>
                            </div>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Ut enim ad minim veniam, quis nostrud exercitation ullamco ...
                          </p>
                          <ul class="list1">
                            <li><a href="#">Registered 2015</a></li>
                            <li><a href="#">Used</a></li>
                            <li><a href="#">8-Speed Automatic</a></li>
                            <li><a href="#">Petrol</a></li>
                          </ul>
                          <div class="txt5">31,730 KM</div>
                          <div class="caption-footer">
                            <div class="info2">
                              <div class="txt6">$68,213</div>
                            </div>
                            <div class="info3">
                              <div class="txt7"><a href="details.html" class="btn-default btn3">VIEW DETAILS</a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="product-box-vertical">
                      <div class="box-vertical-inner">
                        <figure><a href="details.html"><img src="/temas/1/images/listing-5-260x230.jpg" alt="" class="img-responsive"></a></figure>
                        <div class="caption">
                          <div class="caption-header">
                            <div class="info1">
                              <div class="txt1"><a href="details.html">Audi TT</a></div>
                              <div class="txt2"><span class="txt">FIRST DRIVE REVIEW</span> <span class="stars">                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>                             </span>
                              </div>
                            </div>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Ut enim ad minim veniam, quis nostrud exercitation ullamco ...
                          </p>
                          <ul class="list1">
                            <li><a href="#">Registered 2015</a></li>
                            <li><a href="#">Used</a></li>
                            <li><a href="#">8-Speed Automatic</a></li>
                            <li><a href="#">Petrol</a></li>
                          </ul>
                          <div class="txt5">31,730 KM</div>
                          <div class="caption-footer">
                            <div class="info2">
                              <div class="txt6">$68,213</div>
                            </div>
                            <div class="info3">
                              <div class="txt7"><a href="details.html" class="btn-default btn3">VIEW DETAILS</a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="product-box-vertical">
                      <div class="box-vertical-inner">
                        <figure><a href="details.html"><img src="/temas/1/images/listing-6-260x230.jpg" alt="" class="img-responsive"></a></figure>
                        <div class="caption">
                          <div class="caption-header">
                            <div class="info1">
                              <div class="txt1"><a href="details.html">Toyota Prado (Model 2013)</a></div>
                              <div class="txt2"><span class="txt">FIRST DRIVE REVIEW</span> <span class="stars">                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>                             </span>
                              </div>
                            </div>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Ut enim ad minim veniam, quis nostrud exercitation ullamco ...
                          </p>
                          <ul class="list1">
                            <li><a href="#">Registered 2015</a></li>
                            <li><a href="#">Used</a></li>
                            <li><a href="#">8-Speed Automatic</a></li>
                            <li><a href="#">Petrol</a></li>
                          </ul>
                          <div class="txt5">31,730 KM</div>
                          <div class="caption-footer">
                            <div class="info2">
                              <div class="txt6">$68,213</div>
                            </div>
                            <div class="info3">
                              <div class="txt7"><a href="details.html" class="btn-default btn3">VIEW DETAILS</a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="product-box-vertical">
                      <div class="box-vertical-inner">
                        <figure><a href="details.html"><img src="/temas/1/images/listing-7-260x230.jpg" alt="" class="img-responsive"></a></figure>
                        <div class="caption">
                          <div class="caption-header">
                            <div class="info1">
                              <div class="txt1"><a href="details.html">Volkswagen Golf</a></div>
                              <div class="txt2"><span class="txt">FIRST DRIVE REVIEW</span> <span class="stars">                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>                             </span>
                              </div>
                            </div>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Ut enim ad minim veniam, quis nostrud exercitation ullamco ...
                          </p>
                          <ul class="list1">
                            <li><a href="#">Registered 2015</a></li>
                            <li><a href="#">Used</a></li>
                            <li><a href="#">8-Speed Automatic</a></li>
                            <li><a href="#">Petrol</a></li>
                          </ul>
                          <div class="txt5">31,730 KM</div>
                          <div class="caption-footer">
                            <div class="info2">
                              <div class="txt6">$68,213</div>
                            </div>
                            <div class="info3">
                              <div class="txt7"><a href="details.html" class="btn-default btn3">VIEW DETAILS</a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="product-box-vertical">
                      <div class="box-vertical-inner">
                        <figure><a href="details.html"><img src="/temas/1/images/listing-8-260x230.jpg" alt="" class="img-responsive"></a></figure>
                        <div class="caption">
                          <div class="caption-header">
                            <div class="info1">
                              <div class="txt1"><a href="details.html">Opel Vectra</a></div>
                              <div class="txt2"><span class="txt">FIRST DRIVE REVIEW</span> <span class="stars">                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>                             </span>
                              </div>
                            </div>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Ut enim ad minim veniam, quis nostrud exercitation ullamco ...
                          </p>
                          <ul class="list1">
                            <li><a href="#">Registered 2015</a></li>
                            <li><a href="#">Used</a></li>
                            <li><a href="#">8-Speed Automatic</a></li>
                            <li><a href="#">Petrol</a></li>
                          </ul>
                          <div class="txt5">31,730 KM</div>
                          <div class="caption-footer">
                            <div class="info2">
                              <div class="txt6">$68,213</div>
                            </div>
                            <div class="info3">
                              <div class="txt7"><a href="details.html" class="btn-default btn3">VIEW DETAILS</a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="product-box-vertical">
                      <div class="box-vertical-inner">
                        <figure><a href="details.html"><img src="/temas/1/images/listing-9-260x230.jpg" alt="" class="img-responsive"></a></figure>
                        <div class="caption">
                          <div class="caption-header">
                            <div class="info1">
                              <div class="txt1"><a href="details.html">Land Rover Avouqe</a></div>
                              <div class="txt2"><span class="txt">FIRST DRIVE REVIEW</span> <span class="stars">                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star novi-icon" aria-hidden="true"></i>                               <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>                             </span>
                              </div>
                            </div>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Ut enim ad minim veniam, quis nostrud exercitation ullamco ...
                          </p>
                          <ul class="list1">
                            <li><a href="#">Registered 2015</a></li>
                            <li><a href="#">Used</a></li>
                            <li><a href="#">8-Speed Automatic</a></li>
                            <li><a href="#">Petrol</a></li>
                          </ul>
                          <div class="txt5">31,730 KM</div>
                          <div class="caption-footer">
                            <div class="info2">
                              <div class="txt6">$68,213</div>
                            </div>
                            <div class="info3">
                              <div class="txt7"><a href="details.html" class="btn-default btn3">VIEW DETAILS</a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pager_wrapper">
                  <ul class="pager clearfix">
                    <li class="prev"><a href="#"></a></li>
                    <li class="active"><span>1</span></li>
                    <li class="li"><a href="#">2</a></li>
                    <li class="li"><a href="#">3</a></li>
                    <li class="li"><a href="#">4</a></li>
                    <li class="dots">....</li>
                    <li class="next"><a href="#"></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-3  column-sidebar">
            <div class="row">
              <div class="col-sm-6 col-md-12">
                <div class="sidebar-form-wrapper">
                  <div class="sidebar-form">
                    <form action="javascript:;" class="form2">
                      <div class="select1_wrapper"><label>SELECT A MANUFACTURER</label>
                        <div class="select1_inner"><select class="select2 select" style="width: 100%">
                          <option value="1">Any Make</option>
                          <option value="2">Alfa Romeo</option>
                          <option value="3">Aston Martin</option>
                          <option value="4">Audi</option>
                          <option value="5">Bentley</option>
                          <option value="6">BMW</option>
                          <option value="7">Bugatti</option>
                        </select></div>
                      </div>
                      <div class="select1_wrapper"><label>SELECT A MODEL</label>
                        <div class="select1_inner"><select class="select2 select" style="width: 100%">
                          <option value="1">Any Model</option>
                          <option value="2">Model 1</option>
                          <option value="3">Model 2</option>
                          <option value="4">Model 3</option>
                          <option value="5">Model 4</option>
                          <option value="6">Model 5</option>
                          <option value="7">Model 6</option>
                        </select></div>
                      </div>
                      <div class="select1_wrapper"><label>SELECT A TYPE</label>
                        <div class="select1_inner"><select class="select2 select" style="width: 100%">
                          <option value="1">Any Type</option>
                          <option value="2">Type 1</option>
                          <option value="3">Type 2</option>
                          <option value="4">Type 3</option>
                          <option value="5">Type 4</option>
                          <option value="6">Type 5</option>
                          <option value="7">Type 6</option>
                        </select></div>
                      </div>
                      <div class="select1_wrapper"><label>SELECT A STATUS</label>
                        <div class="select1_inner"><select class="select2 select" style="width: 100%">
                          <option value="1">Any Status</option>
                          <option value="2">Status 1</option>
                          <option value="3">Status 2</option>
                          <option value="4">Status 3</option>
                          <option value="5">Status 4</option>
                          <option value="6">Status 5</option>
                          <option value="7">Status 6</option>
                        </select></div>
                      </div>
                      <div class="select1_wrapper"><label>SELECT A MIN YEAR</label>
                        <div class="select1_inner"><select class="select2 select" style="width: 100%">
                          <option value="1">Min Year</option>
                          <option value="2">2018</option>
                          <option value="3">2017</option>
                          <option value="4">2016</option>
                          <option value="5">2015</option>
                          <option value="6">2014</option>
                          <option value="7">2013</option>
                        </select></div>
                      </div>
                      <div class="select1_wrapper"><label>SELECT A MAX YEAR</label>
                        <div class="select1_inner"><select class="select2 select" style="width: 100%">
                          <option value="1">Max Year</option>
                          <option value="2">2018</option>
                          <option value="3">2017</option>
                          <option value="4">2016</option>
                          <option value="5">2015</option>
                          <option value="6">2014</option>
                          <option value="7">2013</option>
                        </select></div>
                      </div>
                      <div class="slider-range-wrapper">
                        <div class="txt">PRICE RANGE</div>
                        <div class="slider-range"></div>
                        <div class="clearfix"><input type="text" class="amount" readonly="">
                          <input type="text" class="amount2" readonly=""></div>
                      </div>
                      <button type="submit" class="btn-default btn-form2-submit">SUBMIT FILTERS</button>
                      <div class="reset-filters"><a href="#">RESET ALL FILTERS</a></div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-12">
                <div class="banner">
                  <figure><a href="#"><img src="images/banner.jpg" alt="" class="img-responsive"></a></figure>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection