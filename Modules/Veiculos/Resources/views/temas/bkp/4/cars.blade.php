@extends('temas.'.$siteId['tema'].'.template');

<?php

  $data=["imagen"=>"imagen"];

?>

@section('content')

    <!--========================================================
                              HEADER
    =========================================================-->
    <header class="mod-1">
        <div id="stuck_container" class="stuck_container">
            <div class="container-fluid container-inset">
                <div class="rd-navbar-brand">
                    <h2 class="rd-navbar-brand_name">
                        <a href="./">&nbsp;car rental</a>
                    </h2>
                </div>
                <nav class="nav uppercase">
                    <ul class="sf-menu" data-type="navbar">
                        <li><a href="./2">Home</a></li>
                        <li><a href="about">About</a></li>
                        <li><a href="services">Services</a></li>
                        <li class="active"><a href="cars">Cars</a><ul>
                            <li><a href="#">Convertibles</a></li>
                            <li><a href="#">SUVs</a></li>
                            <li><a href="#">Luxury</a>
                                <ul>
                                    <li><a href="#">Mercedes</a></li>
                                    <li><a href="#">Lexus</a></li>
                                    <li><a href="#">BMW</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Exotic</a></li>
                        </ul>
                        </li>
                        <li><a href="contact">Contacts</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!--========================================================
                              CONTENT
    =========================================================-->
    <main>
        <!--Our cars-->
        <section class="text-center">
            <div class="container-fluid container-inset marker well-md bg-aside bg-aside-right">
                <div class="row">
                    <div class="col-md-6 col-lg-5 text-md-left">
                        <h2>Our cars</h2>
                        <h4 class="uppercase">We propose the largest selection of prestige cars</h4>
                        <p class="inset-2">We propose only the latest car models for hiring and work with the most prestigious car brands (Aston Martin, Audi, Bentley, BMW, Ferrari, Lamborghini, Maserati, McLaren, Mercedes-Benz, Mini, Porsche, Land Rover, Jaguar and Rolls Royce). We also propose a selection of unique supercars.
                            Car Rental offers a bespoke and high-end car rental service in many cities across the Europe.</p>
                    </div>
                    <div class="img-wrap img-wrap-md">
                        <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                    </div>
                </div>
            </div>
        </section>
        <!--End Our cars-->

        <!--Full width-->
        <section>
            <div class="row row-no-gutter">
                <div class="col-sm-6 col-md-4">
                    <div class="product">
                        <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="">
                        <div class="product__cnt">
                            <h5 class="uppercase">bmw m3</h5>
                            <ul class="pricing-table">
                                <li>Daily Rate : <span class="price strike text-primary">3485.99</span></li>
                                <li>Special Price : <span class="price">2420.00</span></li>
                            </ul>
                            <span class="link"><a href="#">Continue</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="product">
                        <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="">
                        <div class="product__cnt">
                            <h5 class="uppercase">lexus gs 450h</h5>
                            <ul class="pricing-table">
                                <li>Daily Rate : <span class="price strike text-primary">2999.99</span></li>
                                <li>Special Price : <span class="price">1599.00</span></li>
                            </ul>
                            <span class="link"><a href="#">Continue</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="product">
                        <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="">
                        <div class="product__cnt">
                            <h5 class="uppercase">McLaren 650S</h5>
                            <ul class="pricing-table">
                                <li>Daily Rate : <span class="price strike text-primary">3999.99</span></li>
                                <li>Special Price : <span class="price">1899.00</span></li>
                            </ul>
                            <span class="link"><a href="#">Continue</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="product">
                        <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="">
                        <div class="product__cnt">
                            <h5 class="uppercase">Mercedes S550</h5>
                            <ul class="pricing-table">
                                <li>Daily Rate : <span class="price strike text-primary">2877.99</span></li>
                                <li>Special Price : <span class="price">1745.00</span></li>
                            </ul>
                            <span class="link"><a href="#">Continue</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="product">
                        <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="">
                        <div class="product__cnt">
                            <h5 class="uppercase">Alfa Romeo 4C</h5>
                            <ul class="pricing-table">
                                <li>Daily Rate : <span class="price strike text-primary">2990.99</span></li>
                                <li>Special Price : <span class="price">1599.00</span></li>
                            </ul>
                            <span class="link"><a href="#">Continue</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="product">
                        <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="">
                        <div class="product__cnt">
                            <h5 class="uppercase">ferrari california</h5>
                            <ul class="pricing-table">
                                <li>Daily Rate : <span class="price strike text-primary">4128.99</span></li>
                                <li>Special Price : <span class="price">2799.00</span></li>
                            </ul>
                            <span class="link"><a href="#">Continue</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="product">
                        <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="">
                        <div class="product__cnt">
                            <h5 class="uppercase">lexus lfa</h5>
                            <ul class="pricing-table">
                                <li>Daily Rate : <span class="price strike text-primary">3264.99</span></li>
                                <li>Special Price : <span class="price">2451.00</span></li>
                            </ul>
                            <span class="link"><a href="#">Continue</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="product">
                        <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="">
                        <div class="product__cnt">
                            <h5 class="uppercase">Honda NSX</h5>
                            <ul class="pricing-table">
                                <li>Daily Rate : <span class="price strike text-primary">2547.99</span></li>
                                <li>Special Price : <span class="price">2114.00</span></li>
                            </ul>
                            <span class="link"><a href="#">Continue</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0">
                    <div class="product">
                        <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="">
                        <div class="product__cnt">
                            <h5 class="uppercase">Aston Martin DB9</h5>
                            <ul class="pricing-table">
                                <li>Daily Rate : <span class="price strike text-primary">2677.99</span></li>
                                <li>Special Price : <span class="price">1989.00</span></li>
                            </ul>
                            <span class="link"><a href="#">Continue</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End full-width-->

        <!--Owl carousel-->
        <section class="bg-primary text-center">
            <div class="container-fluid inset-5">
            <div class="owl-carousel row row-no-gutter bg-aside bg-aside-left">
                <div class="item quote">
                    <div class="col-md-6 pull-md-right well-md marker-1 text-md-left">
                        <h2>clients say</h2>
                        <h4 class="uppercase">What our clients say <br class="hidden-md"/> about our services</h4>
                        <div class="img-wrap">
                            <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                        </div>
                        <p class="text-left inset-2"><q>“I just wanted to say thanks and tell you that my husband had a great time with the Lamborghini! The staff was very professional and courteous every step of the way.”</q></p>
                        <p><cite>Cindy S.</cite></p>
                    </div>
                </div>
                <div class="item quote">
                    <div class="col-md-6 pull-md-right well-md marker-1 text-md-left">
                        <h2>clients say</h2>
                        <h4 class="uppercase">What our clients say <br class="hidden-md"/> about our services</h4>
                        <div class="img-wrap">
                            <img src="{!! verificaImagemSistem($data["imagen"]) !!} alt=""/>
                        </div>
                        <p class="text-left inset-2"><q>“The guys at your company are amazing! Your service has added a great value to my life. I love that I can jump to your site any time and have access to support 24/7.”</q></p>
                        <p><cite>Andrew Parent </cite></p>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!--End owl carousel-->
    </main>

    @endsection
  