<?php

  $data=["imagen"=>"imagen"]

?>

@extends('temas.1.app')
@section('content')

    <section id="home" class="section swiper-container swiper-slider swiper-slider-1" data-loop="true"
    data-autoplay="false" data-simulate-touch="false" data-slide-effect="fade">


    <div class="swiper-wrapper text-center">
    <div class="swiper-slide context-dark" data-slide-bg="/temas/1/images/slider-1-1920x1200.jpg">
        <div class="swiper-slide-caption">
        <div class="container">
            <div class="row">
            <div class="col-lg-8">
                <h4> FIND YOUR DREAM CAR </h4>
                <h1>BMW M5 GRAN TURISMO</h1>
                <h3>MODEL 2017 <span>$64,000</span></h3>
                <a class="button" href="#"><span> SEE DETAILS</span></a>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="swiper-slide context-dark" data-slide-bg="/temas/1/images/slider-2-1920x1200.jpg"
        style="background-position: 50% 50%;">
        <div class="swiper-slide-caption">
        <div class="container">
            <div class="row">
            <div class="col-lg-8">
                <h4> FIND YOUR DREAM CAR </h4>
                <h1>Chevrolet Camaro ZL1</h1>
                <h3>MODEL 2017 <span>$99,000</span></h3>
                <a class="button" href="#"><span> SEE DETAILS</span></a>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="swiper-slide context-dark" data-slide-bg="/temas/1/images/slider-3-1920x1200.jpg"
        style="background-position: 50% 50%;">
        <div class="swiper-slide-caption">
        <div class="container">
            <div class="row">
            <div class="col-lg-8">
                <h4> FIND YOUR DREAM CAR </h4>
                <h1>BMW 330e iPERFORMANCE</h1>
                <h3>MODEL 2017 <span>$99,000</span></h3>
                <a class="button" href="#"><span> SEE DETAILS</span></a>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="slider-form">
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


            <div class="slider-range-wrapper">
            <div class="txt">PRICE RANGE</div>
            <div class="slider-range"></div>
            <div class="clearfix"><input type="text" class="amount" readonly="">
                <input type="text" class="amount2" readonly="">
            </div>
            </div>
            <button type="submit" class="btn-default btn-form2-submit">SUBMIT FILTERS</button>
            <div class="reset-filters"><a href="#">RESET ALL FILTERS</a></div>
        </form>
        </div>
    </div>

    </div>
    <!-- Swiper Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Swiper Navigation-->
    <div class="swiper-button-prev fa-arrow-left"></div>
    <div class="swiper-button-next fa-arrow-right"></div>

    </section>

    <section class="form-section">
    <div class="container">
    <div class="slider-form">
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


            <div class="slider-range-wrapper">
                <div class="txt">PRICE RANGE</div>
                <div class="slider-range"></div>
                <div class="clearfix"><input type="text" class="amount" readonly="">
                <input type="text" class="amount2" readonly="">
                </div>
            </div>
            <button type="submit" class="btn-default btn-form2-submit">SUBMIT FILTERS</button>
            <div class="reset-filters"><a href="#">RESET ALL FILTERS</a></div>
            </form>
        </div>
        </div>

    </div>
    </div>
    </section>

    <div class="section section-md novi-background bg-cover">
    <div class="container">

    <div class="row">
        <div class="col-sm-4">
        <div class="product-item-classic">
            <div class="thumbnail clearfix">
            <figure class="product-item-img">
                <a href="/detail">
                <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="" class="img-responsive"> </a>
            </figure>
            <div class="caption">
                <div class="rating-block">
                <span class="rating-text">FIRST DRIVE REVIEW</span>
                <span class="stars">
                    <i class="fa fa-star novi-icon" aria-hidden="true"></i>
                    <i class="fa fa-star novi-icon" aria-hidden="true"></i>
                    <i class="fa fa-star novi-icon" aria-hidden="true"></i>
                    <i class="fa fa-star novi-icon" aria-hidden="true"></i>
                    <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>
                </span>
                </div>
                <div class="product-item-title"><a href="/detail">2010 Ford Mustang / YELLOW</a></div>
                <div class="product-item-text">The 2010 Ford Mustang beats its competitors with top safety scores and
                a
                large trunk. A redesigned cabin also helps the Mustang stand out in its class.
                </div>
                <div class="link">
                <a href="/detail" class="btn-default btn1">
                    <span>READ MORE</span>
                </a>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-sm-4">
        <div class="product-item-classic">
            <div class="thumbnail clearfix">
            <figure class="product-item-img">
                <a href="/detail">
                <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="" class="img-responsive"> </a>
            </figure>
            <div class="caption">
                <div class="rating-block">
                <span class="rating-text">INSTRUMENTED TEST</span>
                <span class="stars">
                    <i class="fa fa-star novi-icon" aria-hidden="true"></i>
                    <i class="fa fa-star novi-icon" aria-hidden="true"></i>
                    <i class="fa fa-star novi-icon" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o novi-icon" aria-hidden="true"></i>
                    <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>
                </span>
                </div>
                <div class="product-item-title"><a href="/detail">1950 Bugatti / BLACK</a></div>
                <div class="product-item-text">The Type 101 was presented at the 1951 Paris Salon, of which two
                examples
                were shown. These were a convertible and a coupe, both bodied by Gangloff.
                </div>
                <div class="link">
                <a href="/detail" class="btn-default btn1">
                    <span>READ MORE</span>
                </a>
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-sm-4">
        <div class="product-item-classic">
            <div class="thumbnail clearfix">
            <figure class="product-item-img">
                <a href="/detail">
                <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="" class="img-responsive"> </a>
            </figure>
            <div class="caption">
                <div class="rating-block">
                <span class="rating-text">BUYERS INFO</span>
                <span class="stars">
                    <i class="fa fa-star novi-icon" aria-hidden="true"></i>
                    <i class="fa fa-star novi-icon" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o novi-icon" aria-hidden="true"></i>
                    <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>
                    <i class="fa fa-star-o novi-icon" aria-hidden="true"></i>
                </span>
                </div>
                <div class="product-item-title"><a href="/detail">2013 Mercedes C / WHITE</a></div>
                <div class="product-item-text">The base 2013 Mercedes C250 is powered by a turbocharged four-cylinder
                engine that has enough acceleration to make highway passing maneuvers easy.
                </div>
                <div class="link">
                <a href="/detail" class="btn-default btn1">
                    <span>READ MORE</span>
                </a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    </div>

    <div id="welcome" class="section text-center">
    <section class="parallax-container parallax1" data-parallax-img="/temas/1/images/parallax-01.jpg">
    <div class="parallax-content">
        <div class="container">
        <div class="brand">
            <img src="https://livedemo00.template-help.com/wt_prod-14633/images/logo-white.png" alt=""
            class="img-responsive">
        </div>
        <div class="section-title">Welcome to our website</div>
        <div class="row ">
            <div class="col-sm-12">
            <h2 class="text-accent"> #1 PLACE FOR ALL YOUR AUTOMOTIVE NEEDS</h2>
            <p class="text-block-center"> Autozone is a leading digital automotive marketplace designed to connect
                vehicle buyers and sellers. Our website lets you research and compare new, certified and used cars by
                searching for body type, mileage, price and numerous other criteria. </p>
            </div>
        </div>
        </div>
    </div>
    </section>
    </div>

    <div id="best" class="section section-md best novi-background bg-cover">
    <div class="container">
    <div class="section-title-md">
        BEST OFFERS FROM AUTOCLUB
    </div>
    <div class="tabs-custom tabs-horizontal tabs-corporate" id="tabs-1">
        <ul class="nav nav-tabs">
        <li class="active" role="presentation">
            <a href="#tabs-1-1" data-toggle="tab">Most researched manufacturers</a>
        </li>
        <li role="presentation">
            <a href="#tabs-1-2" data-toggle="tab">Latest vehicles on sale</a>
        </li>
        </ul>
        <div class="tab-content">
        <div class="tab-pane fade in active" id="tabs-1-1">
            <div class="row row-fix">
            <div class="col-sm-12 col-md-3">
                <ul class="product-filter">
                <li>
                    <a href="#">All manufacturers</a>
                </li>
                <li>
                    <a href="#">ASTON MARTIN</a>
                </li>
                <li>
                    <a href="#">ALPHA ROMEO</a>
                </li>
                <li>
                    <a href="#">AUDI</a>
                </li>
                <li>
                    <a href="#">BMW</a>
                </li>
                <li>
                    <a href="#">LAND ROVER</a>
                </li>
                <li>
                    <a href="#">Mercedes-Benz</a>
                </li>
                <li>
                    <a href="#">PORSCHE</a>
                </li>
                <li>
                    <a href="#">SUZUKI</a>
                </li>
                <li>
                    <a href="#">TOYOTA</a>
                </li>
                <li>
                    <a href="#">VOLVO</a>
                </li>
                <li>
                    <a href="#">VOLKSWAGEN</a>
                </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-9">
                <div class="row">
                <div class="col-xxs-12 col-xs-6 col-sm-4">
                    <div class="product-minimal">
                    <div class="thumbnail clearfix">
                        <figure class="product-minimal-img">
                        <a href="detalhes">
                            <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="" class="img-responsive">
                        </a>
                        </figure>
                        <div class="caption">
                        <p class="small">REGISTERED 2015</p>
                        <div class="product-minimal-title"><a href="detalhes"> BMW M6 Sport Hybrid</a></div>
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
                <div class="col-xxs-12 col-xs-6 col-sm-4">
                    <div class="product-minimal">
                    <div class="thumbnail clearfix">
                        <figure class="product-minimal-img">
                        <a href="/detail">
                            <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="" class="img-responsive">
                        </a>
                        </figure>
                        <div class="caption">
                        <p class="small">REGISTERED 2016</p>
                        <div class="product-minimal-title"><a href="/detail"> 2016 Ferrari Testarosa</a></div>
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
                <div class="col-xxs-12 col-xs-6 col-sm-4">
                    <div class="product-minimal">
                    <div class="thumbnail clearfix">
                        <figure class="product-minimal-img">
                        <a href="/detail">
                            <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="" class="img-responsive">
                        </a>
                        </figure>
                        <div class="caption">
                        <p class="small">REGISTERED 2015</p>
                        <div class="product-minimal-title"><a href="/detail"> 2016 Bugatti Veyron</a></div>
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

                <div class="col-xxs-12 col-xs-6 col-sm-4">
                    <div class="product-minimal">
                    <div class="thumbnail clearfix">
                        <figure class="product-minimal-img">
                        <a href="/detail">
                            <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="" class="img-responsive">
                        </a>
                        </figure>
                        <div class="caption">
                        <p class="small">REGISTERED 2017</p>
                        <div class="product-minimal-title"><a href="/detail"> 2017 Lexus-AMG C63</a></div>
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
                <div class="col-xxs-12 col-xs-6 col-sm-4">
                    <div class="product-minimal">
                    <div class="thumbnail clearfix">
                        <figure class="product-minimal-img">
                        <a href="/detail">
                            <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="" class="img-responsive">
                        </a>
                        </figure>
                        <div class="caption">
                        <p class="small">REGISTERED 2016</p>
                        <div class="product-minimal-title"><a href="/detail"> Mercedes - AMG</a></div>
                        <div class="info">
                            <span class="price">18,995</span>
                            <span class="speed">52,000 KM</span>
                        </div>
                        <ul class="tag-list">
                            <li><a href="#">Used</a></li>
                            <li><a href="#">2015</a></li>
                            <li><a href="#">Automatic</a></li>
                            <li><a href="#">Yellow</a></li>
                            <li><a href="#">Petrol</a></li>
                        </ul>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-xxs-12 col-xs-6 col-sm-4">
                    <div class="product-minimal">
                    <div class="thumbnail clearfix">
                        <figure class="product-minimal-img">
                        <a href="/detail">
                            <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="" class="img-responsive">
                        </a>
                        </figure>
                        <div class="caption">
                        <p class="small">REGISTERED 2017</p>
                        <div class="product-minimal-title"><a href="/detail"> 2017 Mercedes - AMG</a></div>
                        <div class="info">
                            <span class="price">64,380</span>
                            <span class="speed">210 KM</span>
                        </div>
                        <ul class="tag-list">
                            <li><a href="#">Used</a></li>
                            <li><a href="#">2015</a></li>
                            <li><a href="#">Automatic</a></li>
                            <li><a href="#">Black</a></li>
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
        <div class="tab-pane fade" id="tabs-1-2">
            <div class="row row-fix">
            <div class="col-sm-12 col-md-3">
                <ul class="product-filter">
                <li>
                    <a href="#">All manufacturers</a>
                </li>
                <li>
                    <a href="#">ASTON MARTIN</a>
                </li>
                <li>
                    <a href="#">ALPHA ROMEO</a>
                </li>
                <li>
                    <a href="#">AUDI</a>
                </li>
                <li>
                    <a href="#">BMW</a>
                </li>
                <li>
                    <a href="#">LAND ROVER</a>
                </li>
                <li>
                    <a href="#">Mercedes-Benz</a>
                </li>
                <li>
                    <a href="#">PORSCHE</a>
                </li>
                <li>
                    <a href="#">SUZUKI</a>
                </li>
                <li>
                    <a href="#">TOYOTA</a>
                </li>
                <li>
                    <a href="#">VOLVO</a>
                </li>
                <li>
                    <a href="#">VOLKSWAGEN</a>
                </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-9">
                <div class="row">
                <div class="col-xxs-12 col-xs-6 col-sm-4">
                    <div class="product-minimal">
                    <div class="thumbnail clearfix">
                        <figure class="product-minimal-img">
                        <a href="/detail">
                            <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="" class="img-responsive">
                        </a>
                        </figure>
                        <div class="caption">
                        <p class="small">REGISTERED 2017</p>
                        <div class="product-minimal-title"><a href="/detail"> 2017 Lexus-AMG C63</a></div>
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
                <div class="col-xxs-12 col-xs-6 col-sm-4">
                    <div class="product-minimal">
                    <div class="thumbnail clearfix">
                        <figure class="product-minimal-img">
                        <a href="/detail">
                            <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="" class="img-responsive">
                        </a>
                        </figure>
                        <div class="caption">
                        <p class="small">REGISTERED 2016</p>
                        <div class="product-minimal-title"><a href="/detail"> Mercedes - AMG</a></div>
                        <div class="info">
                            <span class="price">18,995</span>
                            <span class="speed">52,000 KM</span>
                        </div>
                        <ul class="tag-list">
                            <li><a href="#">Used</a></li>
                            <li><a href="#">2015</a></li>
                            <li><a href="#">Automatic</a></li>
                            <li><a href="#">Yellow</a></li>
                            <li><a href="#">Petrol</a></li>
                        </ul>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-xxs-12 col-xs-6 col-sm-4">
                    <div class="product-minimal">
                    <div class="thumbnail clearfix">
                        <figure class="product-minimal-img">
                        <a href="/detail">
                            <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="" class="img-responsive">
                        </a>
                        </figure>
                        <div class="caption">
                        <p class="small">REGISTERED 2017</p>
                        <div class="product-minimal-title"><a href="details."> 2017 Mercedes - AMG</a></div>
                        <div class="info">
                            <span class="price">64,380</span>
                            <span class="speed">210 KM</span>
                        </div>
                        <ul class="tag-list">
                            <li><a href="#">Used</a></li>
                            <li><a href="#">2015</a></li>
                            <li><a href="#">Automatic</a></li>
                            <li><a href="#">Black</a></li>
                            <li><a href="#">Petrol</a></li>
                        </ul>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-xxs-12 col-xs-6 col-sm-4">
                    <div class="product-minimal">
                    <div class="thumbnail clearfix">
                        <figure class="product-minimal-img">
                        <a href="/detail">
                            <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="" class="img-responsive">
                        </a>
                        </figure>
                        <div class="caption">
                        <p class="small">REGISTERED 2015</p>
                        <div class="product-minimal-title"><a href="/detail"> BMW M6 Sport Hybrid</a></div>
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
                <div class="col-xxs-12 col-xs-6 col-sm-4">
                    <div class="product-minimal">
                    <div class="thumbnail clearfix">
                        <figure class="product-minimal-img">
                        <a href="/detail">
                            <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="" class="img-responsive">
                        </a>
                        </figure>
                        <div class="caption">
                        <p class="small">REGISTERED 2016</p>
                        <div class="product-minimal-title"><a href="/detail"> 2016 Ferrari Testarosa</a></div>
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
                <div class="col-xxs-12 col-xs-6 col-sm-4">
                    <div class="product-minimal">
                    <div class="thumbnail clearfix">
                        <figure class="product-minimal-img">
                        <a href="/detail">
                            <img src="{!! verificaImagemSistem($data["imagen"]) !!}" alt="" class="img-responsive">
                        </a>
                        </figure>
                        <div class="caption">
                        <p class="small">REGISTERED 2015</p>
                        <div class="product-minimal-title"><a href="/detail">2016 Bugatti Veyron</a></div>
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
                </div>
            </div>

            </div>
        </div>
        </div>
    </div>
    </div>
    </div>

    <div class="parallax-container parallax1" data-parallax-img="/temas/1/images/bg-01-1600x600.jpg">
    <div class="parallax-content">
    <div class="section">
        <div class="container">
        <div class="row row-fix">
            <div class="col-sm-8 col-sm-offset-2">
            <div class="figure-section">
                <div class="section-title">
                WORLD’S LEADING CAR DEALER
                </div>
                <h3>Why People Choose Us</h3>
                <div class="row">
                <div class="col-md-6">
                    <div class="figure-section-text">
                    <p> As a local, family-owned dealership, we understand the needs of our customers, and we give
                        back to our local community. We also offer great benefits to all our customers, both new &
                        returning. Feel free to check more reasons for becoming our client and having a hassle-free
                        buying experience.</p>

                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="list-marked-left">
                    <li>
                        <a href="#">A wide range of affordable vehicles for everyone</a>
                    </li>
                    <li>
                        <a href="#">Certified vehicles of various types and sizes</a>
                    </li>
                    <li>
                        <a href="#">Lots of additional products and accessories</a>
                    </li>
                    <li>
                        <a href="#">Competitive freight options available to every client</a>
                    </li>
                    </ul>
                </div>
                </div>


            </div>
            </div>
        </div>
        </div>
    </div>

    </div>

    </div>

    <div class="section section-sm novi-background bg-cover bg-gray-light section-shadow">
    <div class="container">
    <div class="row counter-list">
        <div class="col-sm-6 col-md-3 counter-list-item">
        <div class="counter-classic">
            <div class="counter-classic-inner animated" data-animation="fadeInDown" data-animation-delay="200">
            <img src="https://livedemo00.template-help.com/wt_prod-14633/images/ic1.png" alt="" class="counter-img">
            <div class="caption">
                <div class="counter">
                <span class="animated-number" data-duration="2000" data-animation-delay="0">1250</span>
                </div>
                <div class="counter-title">NEW CARS IN STOCK</div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-sm-6 col-md-3 counter-list-item">
        <div class="counter-classic">
            <div class="counter-classic-inner animated" data-animation="fadeInDown" data-animation-delay="200">
            <img src="https://livedemo00.template-help.com/wt_prod-14633/images/ic2.png" alt="" class="counter-img">
            <div class="caption">
                <div class="counter">
                <span class="animated-number" data-duration="2000" data-animation-delay="0">2120</span>+
                </div>
                <div class="counter-title">USED CARS IN STOCK</div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-sm-6 col-md-3 counter-list-item">
        <div class="counter-classic">
            <div class="counter-classic-inner animated" data-animation="fadeInDown" data-animation-delay="200">
            <img src="https://livedemo00.template-help.com/wt_prod-14633/images/ic3.png" alt="" class="counter-img">
            <div class="caption">
                <div class="counter">
                <span class="animated-number" data-duration="2000" data-animation-delay="0">9753</span>
                </div>
                <div class="counter-title">HAPPY CUSTOMERS</div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-sm-6 col-md-3 counter-list-item">
        <div class="counter-classic">
            <div class="counter-classic-inner animated" data-animation="fadeInDown" data-animation-delay="200">
            <img src="https://livedemo00.template-help.com/wt_prod-14633/images/ic4.png" alt="" class="counter-img">
            <div class="caption">
                <div class="counter">
                <span class="animated-number" data-duration="2000" data-animation-delay="0">1022</span>
                </div>
                <div class="counter-title">CAR SPARE PARTS</div>
            </div>
            </div>
        </div>
        </div>
    </div>

    </div>
    </div>

    <div id="testimonials" class="section section-lg testimonials-bg novi-background custom-bg-image">

    <div class="container">
    <div class="owl-carousel" data-items='1' data-dots='true' data-nav='false' data-stage-padding='15'
        data-loop='false' data-margin='30' data-mouse-drag="false">
        <div class="review">
        <div class="review_inner">
            <div class="testimonial-wrapper">

            <div class="txt2">
                <div class="img-wrapper">
                <img src="/temas/1/images/customer-1-104x104.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="txt1">
                <b>GEORGE SMITH,</b> Customer, RANGE ROVER Owner
            </div>
            <div class="txt3">Autozone has nice cars, great prices, and good service. I brought my old Citroen C4
                with
                which I had no problems after one month of high mileage use. High price given to me for my car and low
                price accepted for the car I was buying was a huge surprise to me. I recommend this car dealer to
                everyone!
            </div>
            </div>
        </div>
        </div>
        <div class="review">
        <div class="review_inner">
            <div class="testimonial-wrapper">

            <div class="txt2">
                <div class="img-wrapper">
                <img src="/temas/1/images/customer-2-104x104.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="txt1">
                <b>JOHN DOE,</b> Customer, RANGE ROVER DISCOVERY Owner
            </div>
            <div class="txt3">I’m glad to be a happy owner of my dream car, Range Rover Discovery, which I bought
                thanks to the recommendations of your consultants. The whole process of purchasing was very smooth and
                the price was not too high for me. I will definitely recommend this car dealer to all my friends.
            </div>
            </div>
        </div>
        </div>
        <div class="review">
        <div class="review_inner">
            <div class="testimonial-wrapper">

            <div class="txt2">
                <div class="img-wrapper">
                <img src="/temas/1/images/customer-3-104x104.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="txt1">
                <b>AMANDA RICHARDSON,</b> Customer, RANGE ROVER EVOQUE Owner
            </div>
            <div class="txt3">You guys are really amazing! I have not yet seen a car dealer who offers so much at
                such
                an affordable price. I have found what I wanted in your vehicle catalog. Moreover, I have sold my old
                car with the help of your website and your staff provided me with the considerable discount for my new
                car.
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    </div>
@endsection
