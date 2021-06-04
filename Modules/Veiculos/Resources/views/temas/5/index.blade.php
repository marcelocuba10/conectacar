@extends('veiculos::temas.5.app')
@section('content')

  <section class="main-slider main-slider-home-3"> 
    <div class="slick-slider carousel-parent" data-arrows="true" data-loop="true" data-autoplay="true" data-dots="true" data-swipe="true" data-items="1">
      @foreach( retornaCarros() as $key => $retornaCarros )
        @include('veiculos::temas.5.slider',compact('retornaCarros'))
      @endforeach
    </div>
  </section>

  <div class="container">
    <div class="divider-section"></div>
  </div>
  
  <section class="section section-xl bg-default">
    <div class="container">
      <h4>{!! trataTraducoes("MAIS ACESSADOS") !!}</h4>
      <div class="row">
        <div class="col-sm-12"> 
          <div class="owl-carousel carousel-type-1 text-center" data-autoplay="true" data-items="1" data-sm-items="2" data-lg-items="4" data-dots="true" data-nav="false" data-stage-padding="15" data-loop="true" data-margin="10" data-mouse-drag="false">
              @forelse( retornaCarros() as $key => $retornaCarros )
                @include('veiculos::temas.5.box_cars',compact('retornaCarros'))
                @empty
                    <div class="alert-cars" role="alert">
                        {!! trataTraducoes('Sem veículos no momento') !!}
                    </div>
              @endforelse
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section section-xl bg-default">
    <div class="container">
      <h4>{!! trataTraducoes("ÚLTIMAS INCLUSÕES ") !!}</h4>
      <div class="row">
        <div class="col-sm-12"> 
          <div class="owl-carousel carousel-type-1 text-center" data-autoplay="true" data-items="1" data-sm-items="2" data-lg-items="4" data-dots="true" data-nav="false" data-stage-padding="15" data-loop="true" data-margin="10" data-mouse-drag="false">
              @forelse( retornaCarros() as $key => $retornaCarros )
                @include('veiculos::temas.5.box_cars',compact('retornaCarros'))
                @empty
                <div class="alert-cars" role="alert">
                    {!! trataTraducoes('Sem veículos no momento') !!}
                </div>
              @endforelse
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection