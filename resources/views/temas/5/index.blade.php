@extends('temas.5.app')

<?php
    $data=["image"=>"image"];
?>

@section('content')
    
<main class="page-content">
    <!-- Swiper variant 3-->
    <section class="bg-outer-space">
      <div class="swiper-variant-1 swiper-mod-1">
        <div data-slide-effect="slide" data-min-height="600px" class="swiper-container swiper-slider">
          <div class="swiper-wrapper">
            <div data-slide-bg="{!! verificaImagemSistem($data["image"]) !!}" class="swiper-slide">
              <div class="swiper-slide-caption text-center">
                <div class="shell">
                  <div class="range range-sm-middle">
                    <div class="cell-xs-12">
                      <h2 data-caption-animate="fadeInUpSmall" data-caption-delay="100" class="text-uppercase active">Convenience.</h2>
                      <p data-caption-animate="fadeInUpSmall" data-caption-delay="600" class="offset-top-15 text-uppercase active">The highest level of comfort</p><a href="#" data-caption-animate="fadeInUpSmall" data-caption-delay="800" class="btn btn-white offset-top-20 offset-md-top-50">read more</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div data-slide-bg="{!! verificaImagemSistem($data["image"]) !!}" class="swiper-slide">
              <div class="swiper-slide-caption text-center">
                <div class="shell">
                  <div class="range range-sm-middle">
                    <div class="cell-xs-12">
                      <h2 data-caption-animate="fadeInUpSmall" data-caption-delay="100" class="text-uppercase active">Luxury.</h2>
                      <p data-caption-animate="fadeInUpSmall" data-caption-delay="600" class="offset-top-15 text-uppercase active">Professional  limo services</p><a href="#" data-caption-animate="fadeInUpSmall" data-caption-delay="800" class="btn btn-white offset-top-20 offset-md-top-50">read more</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div data-slide-bg="{!! verificaImagemSistem($data["image"]) !!}" class="swiper-slide">
              <div class="swiper-slide-caption text-center">
                <div class="shell">
                  <div class="range range-sm-middle">
                    <div class="cell-xs-12">
                      <h2 data-caption-animate="fadeInUpSmall" data-caption-delay="100" class="text-uppercase active">Style.</h2>
                      <p data-caption-animate="fadeInUpSmall" data-caption-delay="600" class="offset-top-15 text-uppercase active">Fleet of stylish vehicles</p><a href="#" data-caption-animate="fadeInUpSmall" data-caption-delay="800" class="btn btn-white offset-top-20 offset-md-top-50">read more</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Swiper Pagination-->
          <div class="swiper-pagination-wrap">
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </section>

    <section id="cp1" class="section-top-60 section-bottom-100 section-lg-top-120 section-lg-bottom-250 section-xl-bottom-450 bg-outer-space section-angle-outher-space">
      <div class="shell-fluid">
        <div class="range range-xs-center range-index">
          <div class="cell-sm-6 cell-lg-4">
            <article class="thumbnail-variant-1">
              <h3 class="title">Corporate</h3>
              <div class="caption">
                <p class="list-index-counter"></p>
                <p>We specialize in corporate ground transportation for the discerning and demanding business clients.</p><a href="#" class="link link-white btn-link">more info</a>
              </div>
            </article>
          </div>
          <div class="cell-sm-6 cell-lg-4 offset-top-40 offset-sm-top-0">
            <article class="thumbnail-variant-1">
              <h3 class="title">Airport</h3>
              <div class="caption">
                <p class="list-index-counter"></p>
                <p>We offer airport transportation services, airport ground transportation, airport limo services to all local airports.</p><a href="#" class="link link-white btn-link">more info</a>
              </div>
            </article>
          </div>
          <div class="cell-sm-6 cell-lg-4 offset-top-40 offset-lg-top-0">
            <article class="thumbnail-variant-1">
              <h3 class="title">Wedding</h3>
              <div class="caption">
                <p class="list-index-counter"></p>
                <p>With our fleet of limousines, super-stretch limos, and luxury sedans, we can satisfy any wedding transportation needs.</p><a href="#" class="link link-white btn-link">more info</a>
              </div>
            </article>
          </div>
        </div>
        <div class="text-center anchor-link"><a href="#" class="link icon link-gray-chateau icon-xl arrows-thin36"></a></div>
      </div>
    </section>
    <section id="cp2" class="bg-gray-lighter section-angle-gray-lighter">
      <!-- RD Parallax-->
      <div data-on="false" data-lg-on="true" class="rd-parallax">
        <div data-speed="0.08" data-type="media" data-url="/temas/5/images/bg-image-1.jpg" class="rd-parallax-layer"></div>
        <div data-speed="0.2" data-type="html" data-direction="inverse" class="rd-parallax-layer">
          <div class="shell-fluid section-top-60 section-bottom-100 section-lg-top-100 section-lg-bottom-250 section-xl-bottom-450">
            <div class="range">
              <div class="cell-sm-8 cell-lg-6 cell-xl-7">
                <article class="thumbnail-variant-2">
                  <h3 class="title">Hello</h3>
                  <div class="caption">
                    <p>Welcome to Limo! Whether you need chauffeured transportation for the airport, cruise ship terminals, or for a special occasion, our Limousine Service has the exact solution to meet your specific transportation needs.</p><a href="#" class="link link-default btn-link">more info</a>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center anchor-link"><a href="#" class="link icon link-gray-chateau icon-xl arrows-thin36"></a></div>
    </section>
    <section id="cp3" class="bg-white section-angle-white parallax-left">
      <!-- RD Parallax-->
      <div data-on="false" data-lg-on="true" class="rd-parallax">
        <div data-speed="0.2" data-type="media" data-url="/temas/5/images/bg-image-2.jpg" class="rd-parallax-layer"></div>
        <div data-speed="0.2" data-type="html" data-direction="inverse" class="rd-parallax-layer">
          <div class="shell-fluid section-top-60 section-bottom-100 section-lg-top-100 section-lg-bottom-250 section-xl-bottom-450">
            <div class="range range-sm-right">
              <div class="cell-sm-8 cell-lg-7">
                <article class="thumbnail-variant-2">
                  <h3 class="title">Vehicles</h3>
                  <div class="caption">
                    <ol class="list list-index">
                      <li><a href="#" class="link link-primary">Luxury Sedans</a></li>
                      <li><a href="#" class="link link-primary">Stretched Limousines</a></li>
                      <li><a href="#" class="link link-primary">SUVs</a></li>
                      <li><a href="#" class="link link-primary">Stretched SUVs</a></li>
                      <li><a href="#" class="link link-primary">Vans</a></li>
                      <li><a href="#" class="link link-primary">Mini Buses</a></li>
                      <li><a href="#" class="link link-primary">Luxury Limo Buses</a></li>
                    </ol><a href="#" class="link link-default btn-link offset-top-60">more info</a>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center anchor-link"><a href="#" class="link icon link-gray-chateau icon-xl arrows-thin36"></a></div>
    </section>
    <section class="bg-gray-lighter section-angle-gray-lighter">
      <!-- RD Parallax-->
      <div data-on="false" data-lg-on="true" class="rd-parallax">
        <div data-speed="0.2" data-type="media" data-url="/temas/5/images/bg-image-3.jpg" class="rd-parallax-layer"></div>
        <div data-speed="0.2" data-type="html" data-direction="inverse" class="rd-parallax-layer">
          <div class="shell-fluid section-top-60 section-bottom-100 section-lg-top-100 section-lg-bottom-250 section-xl-bottom-450">
            <div class="range">
              <div class="cell-sm-8 cell-lg-6 cell-xl-7">
                <article class="thumbnail-variant-2">
                  <h3 class="title">Mission</h3>
                  <div class="caption">
                    <p>Our mission is to provide you with the highest quality limousine services, the most professional chauffeurs and the newest vehicles available in our state.</p><a href="#" class="link link-default btn-link">more info</a>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center anchor-link"><a href="#" class="link icon link-gray-chateau icon-xl arrows-thin36"></a></div>
    </section>
    <section class="section-angle-white section-angle-mod-1">
      <!-- RD Parallax-->
      <div data-on="false" data-lg-on="true" class="rd-parallax">
        <div class="rd-parallax-layer"></div>
        <div data-speed="0.25" data-type="html" data-direction="inverse" class="rd-parallax-layer">
          <div class="shell-fluid section-top-60 section-bottom-100 section-lg-top-100 section-lg-bottom-250 section-xl-bottom-350">
            <div class="range range-sm-right">
              <div class="cell-sm-8 cell-lg-7">
                <article class="thumbnail-variant-2">
                  <h3 class="title">Contacts</h3>
                  <div class="caption">
                    <address class="contact-info">
                      <p>28 Jackson Blvd, <br> Ste 1020 Chicago IL</p><a href="callto:#" class="link link-gray-base offset-top-15">+1 800 559 6580</a>
                    </address><a href="#" class="link link-default btn-link offset-top-60">more info</a><span class="copyright reveal-block offset-top-50 offset-lg-top-135">
                      Limo
                      &#169;&nbsp;<span id="copyright-year"></span>&nbsp; • &nbsp;<a href="privacy.html" class="link link-gray-base">Privacy Policy</a></span>
                    <!-- {%FOOTER_LINK}-->
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="img-mod"><img src="/temas/5/images/bg-image-4-733x1200.jpg" alt="" width="733" height="1200" class="img-responsive"/>
      </div>
    </section>
    <section class="offset-lg-top--360">
      <!-- RD Google Map-->
      <div data-zoom="15" data-y="40.643180" data-x="-73.9874068" data-styles="[{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#e9e9e9&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f5f5f5&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:29},{&quot;weight&quot;:0.2}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:18}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:16}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f5f5f5&quot;},{&quot;lightness&quot;:21}]},{&quot;featureType&quot;:&quot;poi.park&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#dedede&quot;},{&quot;lightness&quot;:21}]},{&quot;elementType&quot;:&quot;labels.text.stroke&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:16}]},{&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:36},{&quot;color&quot;:&quot;#333333&quot;},{&quot;lightness&quot;:40}]},{&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f2f2f2&quot;},{&quot;lightness&quot;:19}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;},{&quot;lightness&quot;:17},{&quot;weight&quot;:1.2}]}]" class="rd-google-map rd-google-map__model">
        <ul class="map_locations">
          <li data-y="40.643180" data-x="-73.9874068">
            <p>267 Park Avenue New York, NY 90210</p>
          </li>
        </ul>
      </div>
    </section>
  </main>

@endsection 