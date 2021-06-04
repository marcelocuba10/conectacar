@extends('veiculos::temas.3.app')
@section('content')

<section id="content">
  <div class="width-wrapper width-wrapper__inset1">
    <div class="wrapper1 wrapper7">
      <div class="container">
        <div class="row">
          <div class="grid_12">
            <div class="heading1 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
              <h2>{!! trataTraducoes('POPULAR CARS') !!}</h2>
            </div>
          </div>
        </div>
        <div class="row">
            @include('veiculos::temas.3.box_cars')
            @include('veiculos::temas.3.box_cars')
            @include('veiculos::temas.3.box_cars')
            @include('veiculos::temas.3.box_cars')
        </div>
        <div class="row">
          <div class="grid_12">
            <div class="wrapper8">
              <div class="heading1 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                <h2>{!! trataTraducoes('EM DESTAQUE') !!}</h2>
              </div>
              <div class="row">
                @include('veiculos::temas.3.box_cars')
                @include('veiculos::temas.3.box_cars')
                @include('veiculos::temas.3.box_cars')
                @include('veiculos::temas.3.box_cars')
              </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="grid_12">
              <div class="wrapper8">
                <div class="heading1 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                  <h2>{!! trataTraducoes('RECEM IMPORTADOS') !!}</h2>
                </div>
                <div class="row">
                  @include('veiculos::temas.3.box_cars')
                  @include('veiculos::temas.3.box_cars')
                  @include('veiculos::temas.3.box_cars')
                  @include('veiculos::temas.3.box_cars')
                </div>
              </div>
            </div>
          </div>
          <div class="wrapper7"></div>
      </div>
    </div>
  </div>
</section>

@endsection