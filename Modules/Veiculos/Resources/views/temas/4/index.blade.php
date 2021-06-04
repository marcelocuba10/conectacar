@extends('veiculos::temas.4.app')
@section('content')

<section class="section swiper-container swiper-slider swiper-slider-1" data-loop="true" data-simulate-touch="false" data-slide-effect="fade" data-autoplay="5000">
    <div class="swiper-wrapper text-center text-lg-right">
      @foreach( retornaCarros() as $key => $retornaCarros )
        @include('veiculos::temas.4.slider',compact('retornaCarros'))
      @endforeach
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev fa-arrow-left"></div>
    <div class="swiper-button-next fa-arrow-right"></div>
</section>

<section class="section section-md bg-default">
    <div class="container">
        <div class="block-xl">
            <h3>{!! trataTraducoes("ÚLTIMAS INCLUSÕES") !!}</h3>
        </div>
        <div class="row row-50" data-lightgallery="group">
            @forelse( retornaCarros() as $key => $retornaCarros )
                @include('veiculos::temas.4.box_cars',compact('retornaCarros'))
                @empty
                    <div class="alert-cars" role="alert">
                        {!! trataTraducoes('Sem veículos no momento') !!}
                    </div>
            @endforelse
        </div>
    </div>
</section>

@endsection