@extends('temas.5.app')

<?php
    $data=["image"=>"image"];
?>

@section('content')

      <!-- Page Content-->
      <main class="page-content">
        <section style="position:relative;" class="section-top-60 section-bottom-100 section-lg-top-120 section-lg-bottom-250 section-xl-bottom-450 bg-outer-space">
          <div class="shell">
            <div class="range range-xs-center">
              <div class="cell-md-10">
                <h3 class="title">Feedback</h3>
                <hr class="divider-lg offset-top-50">
                <!-- RD Mailform-->
                <form data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php" class="rd-mailform text-center offset-top-50">
                  <div class="range text-left">
                    <div class="form-group cell-md-4 offset-top-30 offset-md-top-0">
                      <label for="contact-name" class="form-label">Enter your name</label>
                      <input id="contact-name" type="text" name="name" data-constraints="@Required" class="form-control">
                    </div>
                    <div class="form-group cell-md-4 offset-top-30 offset-md-top-0">
                      <label for="contact-email" class="form-label">Enter your email</label>
                      <input id="contact-email" type="email" name="email" data-constraints="@Email @Required" class="form-control">
                    </div>
                    <div class="form-group cell-md-4 offset-top-30 offset-md-top-0">
                      <label for="contact-phone" class="form-label">Enter your phone</label>
                      <input id="contact-phone" type="text" name="phone" data-constraints="@Required @Numeric" class="form-control">
                    </div>
                    <div class="form-group cell-xs-12 offset-top-30">
                      <label for="contact-message" class="form-label">Message</label>
                      <textarea id="contact-message" name="message" data-constraints="@Required" class="form-control"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="link link-white btn-link offset-top-30">submit</button>
                </form>
              </div>
            </div>
          </div>
          <div class="text-center anchor-link"><a href="#" class="link icon link-gray-chateau icon-xl arrows-thin36"></a></div>
        </section>
        <section class="section-angle-white section-angle-mod-1">
          <!-- RD Parallax-->
          <div data-on="false" data-lg-on="true" class="rd-parallax">
            <div class="rd-parallax-layer"></div>
            <div data-speed="0.12" data-type="html" data-direction="inverse" class="rd-parallax-layer">
              <div class="shell-fluid section-top-60 section-bottom-100 section-lg-top-100 section-lg-bottom-250 section-xl-bottom-450">
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
    </div>
    <!-- Global Mailform Output-->
    <div id="form-output-global" class="snackbars"></div>
    <!-- PhotoSwipe Gallery-->
    <div tabindex="-1" role="dialog" aria-hidden="true" class="pswp">
      <div class="pswp__bg"></div>
      <div class="pswp__scroll-wrap">
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
            <div class="pswp__counter"></div>
            <button title="Close (Esc)" class="pswp__button pswp__button--close"></button>
            <button title="Share" class="pswp__button pswp__button--share"></button>
            <button title="Toggle fullscreen" class="pswp__button pswp__button--fs"></button>
            <button title="Zoom in/out" class="pswp__button pswp__button--zoom"></button>
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div>
          </div>
          <button title="Previous (arrow left)" class="pswp__button pswp__button--arrow--left"></button>
          <button title="Next (arrow right)" class="pswp__button pswp__button--arrow--right"></button>
          <div class="pswp__caption">
            <div class="pswp__caption__cent"></div>
          </div>
        </div>
      </div>
    </div>

@endsection    