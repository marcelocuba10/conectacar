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
                        <li class="active"> <a href="services">Services</a></li>
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
        <!--Our Services-->
        <section class="bg-primary text-center">
            <div class="container-fluid container-inset bg-aside bg-aside-left well-md">
                <div class="row">
                    <div class="col-md-6 text-md-left inset-2 pull-md-right marker-1">
                        <h2>Our Services</h2>
                        <h4 class="uppercase">We guarantee <br class="hidden-md"/> high standard service</h4>
                        <p>We offer a large range of personalised services that go beyond your expectations. Our forte is in luxury car rental services, but we offer much more, including rentals with chauffeurs, yacht charters, helicopter and jet rentals, wedding rentals, luxury airport pickups, motorbike tours. We understand that your event has to be special, that your business trip is absolutely crucial, and that’s why our services are centred around you, not the other way around.</p>
                    </div>
                    <div class="img-wrap img-wrap-md">
                        <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                    </div>
                </div>

            </div>
        </section>
        <!--End Our Services-->

        <!--Luxury services-->
        <section class="text-center">
            <div class="container-fluid container-inset bg-aside bg-aside-right marker well-md">
                <div class="row">
                    <div class="col-md-6 col-lg-5 text-md-left">
                        <h2>LUXURY SERVICES</h2>
                        <ul class="marked-list text-left">
                            <li><a href="#">Car with chauffeur</a></li>
                            <li><a href="#">Private flights</a></li>
                            <li><a href="#">Motorbike rental and tours</a></li>
                            <li><a href="#">Exclusive parties and weddings</a></li>
                            <li><a href="#">Yacht charters</a></li>
                            <li><a href="#">Classic cars rental and tours</a></li>
                            <li><a href="#">Best rates for airport transfer service</a></li>
                        </ul>
                    </div>
                    <div class="img-wrap img-wrap-lg">
                        <img class="offset-1" src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                    </div>
                </div>

            </div>
        </section>
        <!--End luxury services-->

        <!--Customer Service-->
        <section class="bg-primary text-center">
            <div class="container-fluid container-inset inset-4 bg-aside bg-aside-left well-md">
                <div class="row">
                    <div class="col-md-6 text-md-left pull-md-right marker-1 inset-0">
                        <h2>Customer Service</h2>
                        <h4 class="uppercase">Our experts work day and night to solve all your problems</h4>
                        <p>Everything we do is fully supported by our 24 hour call centre team who are here to answer questions and resolve any customer issues. We also provide a number of customer initiatives that further drive your customers conversion. These include no hidden charges, a deposit payment option, and a quote chase facility.</p>
                    </div>
                    <div class="img-wrap img-wrap-sm">
                        <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                    </div>
                </div>

            </div>
        </section>
        <!--End customer Service-->

        <!--Pricing-->
        <section class="text-center">
            <div class="container-fluid container-inset marker well-md bg-aside bg-aside-right">
                <div class="row">
                    <div class="col-md-6 col-lg-5 inset-2 text-md-left">
                        <h2>Pricing</h2>
                        <h4 class="uppercase">Our prices are the lowest on the market</h4>
                        <p>We deliver highly competitive market pricing levels across our full range of destinations, durations and vehicles types. And by offering pricing parity to our affiliate partners with simultaneous pricing updates, we maximize your conversion rates. </p>
                    </div>
                    <div class="img-wrap img-wrap-sm">
                        <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                    </div>
                </div>

            </div>
        </section>
        <!--End Pricing-->

        <!--For clients-->
        <section class="bg-primary text-center">
            <div class="container-fluid container-inset bg-aside bg-aside-left well-md">
                <div class="row">
                    <div class="col-md-6 text-md-left inset-2 pull-md-right marker-1">
                        <h2>for clients</h2>
                        <h4 class="uppercase">Your advantages when choosing our services</h4>
                        <ul class="marked-list text-left">
                            <li><a href="#">When paying by credit card, the banking fee is not charged</a></li>
                            <li><a href="#">Minimal car rent order is for 1 hour ( VIP taxi service)</a></li>
                            <li><a href="#">Free of charge booking a car with an English-speaking driver</a></li>
                            <li><a href="#">Rates are fixed regardless of time of a day and a day of the week</a></li>
                            <li><a href="#">Flexible discounts</a></li>
                        </ul>
                    </div>
                    <div class="img-wrap img-wrap-md">
                        <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt=""/>
                    </div>
                </div>
            </div>
        </section>
        <!--End for clients-->

    </main>

    @endsection