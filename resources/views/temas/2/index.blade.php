@extends('temas.2.app');
@section('content')

  <!--========================================================
                            HEADER
  =========================================================-->
  <header class="camera_container">
    <div id="stuck_container" class="stuck_container">
      <div class="container-fluid container-inset">
        <div class="rd-navbar-brand">
          <h2 class="rd-navbar-brand_name">
            <a href="./">&nbsp;car rental</a>
          </h2>
        </div>
        <nav class="nav uppercase">
          <ul class="sf-menu" data-type="navbar">
            <li class="active"><a href="./tema/2">Home</a></li>
            <li><a href="/tema/about">About</a></li>
            <li> <a href="/tema/services">Services</a></li>
            <li><a href="/tema/cars">Cars</a>
              <ul>
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
            <li><a href="/tema/contact">Contacts</a></li>
          </ul>
        </nav>
      </div>
    </div>
    
    <div id="camera" class="camera_wrap">
        <div data-src="{!! verificaImagemSistem("imagen") !!}">
            <div class="camera_caption fadeIn">
                <div class="container-fluid container-inset">
                    <div class="row">
                        <div class="col-md-12 col-lg-7 pull-lg-right content-right text-md-left">
                        <div class="box">
                            <h1>Rent exclusive car&nbsp;</h1>
                            <h4 class="uppercase">for your special occasion!</h4>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-src="{!! verificaImagemSistem("imagen") !!}">
            <div class="camera_caption fadeIn">
                <div class="container-fluid container-inset">
                    <div class="row">
                        <div class="col-md-12 col-lg-7 pull-lg-right content-right text-md-left">
                        <div class="box">
                            <h1>Stop dreaming...</h1>
                            <h4 class="uppercase">drive in style!</h4>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-src="{!! verificaImagemSistem("imagen") !!}">
            <div class="camera_caption fadeIn">
                <div class="container-fluid container-inset">
                    <div class="row">
                        <div class="col-md-12 col-lg-7 pull-lg-right content-right text-md-left">
                        <div class="box">
                            <h1 class="inset-1">A wide choice of</h1>
                            <h4 class="uppercase">luxury & exotic vehicles!</h4>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<!--========================================================
                        CONTENT
=========================================================-->
<main>

    <!--Welcome-->
    <section class="bg-primary text-center">
      <div class="container-fluid container-inset bg-aside bg-aside-right marker well-md">
        <div class="row">
          <div class="col-md-6 col-lg-5 inset-2 text-md-left">
            <h2>welcome</h2>
            <h4 class="uppercase">Rent the car <br class="hidden-md"/> of your dreams</h4>
            <p>We specialize in exotic and luxury car rental. Whether you are looking for a Mercedes, a luxury SUVs, Jaguar convertible, Range Rover, BMW, Porsche, Cadillac, Bentley, Corvette, Hummer, Viper, or a conversion van, 15 passenger vans, a new hybrid or sport convertible car to rent, you have come to the right place. We carry only the newest models of exotic cars available and keep our rental cars in new condition all with very low mileage. </p>
          </div>
          <div class="img-wrap img-wrap-md">
            <img src="{!! verificaImagemSistem("imagen") !!}" alt=""/>
          </div>
        </div>
      </div>
    </section>
    <!--End welcome-->

    <!--About-->
    <section class="text-center">
      <div class="container-fluid container-inset bg-aside bg-aside-left well-md well-md--inset-1 marker-1">
        <div class="row">
          <div class="col-md-6 text-md-left inset-3 pull-md-right">
            <h2>About</h2>
            <h4 class="uppercase">Number 1 provider of <br class="hidden-md"/> the gripping driving experiences</h4>
            <p>We extend red carpet service to all our clients. We are also happy to deliver your car to you anywhere. We are here to make your car hire experience the very best it can be. Our company is  very competitive, that is why we are always trying very hard to keep our fleet of exotics and luxury cars the very best it could be with the latter models, best rates and service to our customer. We always strive to get the best customer service and your satisfaction is always our prime concern. </p>
          </div>
          <div class="img-wrap img-wrap-md">
            <img src="{!! verificaImagemSistem("imagen") !!}" alt=""/>
          </div>
        </div>
      </div>

    </section>
    <!--End About-->

    <!--Full width-->
    <section>

        <div class="row row-no-gutter">
          @include('temas.2.box_details')
          @include('temas.2.box_details')
          @include('temas.2.box_details')
          @include('temas.2.box_details')
          @include('temas.2.box_details')
          @include('temas.2.box_details')
        </div>
    </section>
    <!--End full-width-->
  </main>
@endsection