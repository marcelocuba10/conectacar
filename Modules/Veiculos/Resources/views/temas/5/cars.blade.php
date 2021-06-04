@extends('veiculos::temas.5.app')
@section('content')

<section class="page-title-box" style=" background-image: url(/temas/5/images/bg-01.jpg);">
    <div class="context-dark page-title-content">
        <div class="container context-dark">
            <h2>{!! trataTraducoes("Nossos veiculos..") !!}</h2>
            <h5></h5>
        </div>
    </div>
</section>

<section>
    <div class="quote-default" style="text-align: -webkit-center;"><div class="divider" style="width: 45%;"></div></div>
    <div class="row no-gutters" data-lightgallery="group"> 
        @forelse( retornaCarros() as $key => $retornaCarros )
            <div class="col-sm-6 col-lg-3">
                @include('veiculos::temas.5.box_cars',compact('retornaCarros'))
            </div>
            @empty
                <div class="alert-cars" role="alert">
                    {!! trataTraducoes('Sem veículos no momento') !!}
                </div>
        @endforelse 
        <div class="col-sm-12 col-lg-12">
            <div class="quote-default" style="text-align: -webkit-center;"><div class="divider" style="width: 45%;"></div></div>
            <div class="product-item" style="padding-left: 5%;">
                {!! retornaCarros()->links() !!}
            </div>
        </div>
    </div>
  </section>

@endsection