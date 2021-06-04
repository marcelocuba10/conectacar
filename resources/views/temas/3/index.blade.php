@extends('veiculos::temas.3.app')
@section('content')

<section id="content">
    <div class="width-wrapper width-wrapper__inset1">
      <div class="wrapper1">
        <div class="container">
          <div class="row">
            <div class="grid_12">
              <div class="slider-wrapper">
                <div id="camera_wrap">
                  @include('veiculos::temas.3.slider')
                  @include('veiculos::temas.3.slider')
                  @include('veiculos::temas.3.slider')
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="grid_3">
              <div class="wrapper2">
                <div class="banner1">
                  <h2 class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                    <a href="#">{!! trataTraducoes('Sobre a nossa empresa') !!}</a>
                  </h2>
                  <p class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
                </div>
                <div>
                  <img class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" src="/temas/3/images/banner.jpg" alt=""/>
                </div>
              </div>
            </div>
            <div class="grid_9">
              <div class="wrapper2">
                <div class="heading1 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                  <h2>{!! trataTraducoes('Latest used cars') !!}</h2>
                </div>
                <div class="border-wrapper1 wrapper3">
                  <div class="row">
                    @include('veiculos::temas.3.box_cars')
                    @include('veiculos::temas.3.box_cars')
                    @include('veiculos::temas.3.box_cars')
                    @include('veiculos::temas.3.box_cars')
                    @include('veiculos::temas.3.box_cars')
                    @include('veiculos::temas.3.box_cars')
                    @include('veiculos::temas.3.box_cars')
                    @include('veiculos::temas.3.box_cars')
                    @include('veiculos::temas.3.box_cars')
                  </div>
                </div>
                <div class="button-wrapper1">
                  <a class="btn-big-green wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s" href="#">
                    <span>See all cars</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection