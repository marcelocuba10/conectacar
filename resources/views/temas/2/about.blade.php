@extends('temas.2.app');

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
                        <li class="active"><a href="about">About</a></li>
                        <li> <a href="services">Services</a></li>
                        <li><a href="cars">Cars</a><ul>
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
                        <li><a href="index-4.html">Contacts</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!--========================================================
                              CONTENT
    =========================================================-->
    <main>
        <!--Who we are-->
        <section class="text-center">
            <div class="container-fluid container-inset marker well-md bg-aside bg-aside-right">
                <div class="row">
                    <div class="col-md-6 col-lg-5 text-md-left">
                        <h2>Who we are</h2>
                        <h4 class="uppercase">LUXURY AND SPORT<br class="hidden-md"/> CAR RENTAL</h4>
                        <p class="inset-2">Car Rental was founded in 2007, and has grown significantly every year thanks to our loyal clients and our hard-working team. We own only the most recent models; in fact, most of our cars are of the current year. Thanks to our fair prices, high flexibility, great multi-language customer service, and top quality service provided, we're proud to say that we'd always succeed in pleasing every customer, by providing an excellent and remarkable
                            experience on the whole.</p>
                    </div>
                    <div class="img-wrap img-wrap-lg offset-2">
                        <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                    </div>
                </div>

            </div>
        </section>
        <!--End who we are-->

        <!--Our Mission-->
        <section class="bg-primary text-center">
            <div class="container-fluid container-inset bg-aside bg-aside-left well-md well-md--inset-1">
                <div class="row">
                    <div class="col-md-6 text-md-left inset-3 pull-md-right marker-1">
                        <h2>Our Mission</h2>
                        <h4 class="uppercase">Reliability and trust <br class="hidden-md"/> are our prime principles.</h4>
                        <p>Our mission is to provide the best luxury car rentals and services solutions.
                            We combine our own knowledge and experience with a large array of custom made luxury cars. We aim to deliver a matchless service that meets and exceeds the
                            customer’s expectations, and we are not satisfied unless the customer is satisfied. We offer to all our clients a free delivery/pick-up service, meaning that we will meet you and bring the car to your home or hotel, or any other scheduled place of your choice.</p>
                    </div>
                    <div class="img-wrap img-wrap-md">
                        <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                    </div>
                </div>

            </div>

        </section>
        <!--End Our Mission-->

        <!--Full width-->
        <section class="banner well-lg text-center">
            <div class="banner__cnt">
                <h1>LUXURY.&nbsp; <br/> WORTH IT.</h1>
                <h4 class="uppercase">Top Quality. Best Cars.</h4>
            </div>
        </section>
        <!--End full-width-->

        <!--How it works-->
        <section class="text-center">
            <div class="container-fluid container-inset marker well-md bg-aside bg-aside-right">
                <div class="row">
                    <div class="col-md-6 col-lg-5 text-md-left">
                        <h2>How it works</h2>
                        <h4 class="uppercase">We hope you'll enjoy <br class="hidden-md"/> our features! </h4>
                        <p class="inset-2 ">Now you can pick and schedule your rental right here on the website. We will contact you right after we receive your
                            reservation request to square out the details. No online payment is needed when you reserve online, and you have the option to create your online account to speed up your reservation
                            process in the future.</p>
                    </div>
                    <div class="img-wrap img-wrap-md">
                        <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                    </div>
                </div>

            </div>

        </section>
        <!--End how it works-->
    </main>

@endsection