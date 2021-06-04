@extends('veiculos::temas.2.app')
@section('content')

<div class="div-content">
    <div id="stuck_container">
        <header class="page1">
            @include('veiculos::temas.2.nav')
            <div class="slideshow-container">
                @foreach( retornaCarros() as $key => $retornaCarros )
                    @include('veiculos::temas.2.slider',compact('retornaCarros'))
                @endforeach
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>
            <div style="text-align:center">
                @foreach (retornaCarros() as $key => $retornaCarros)
                    <span class="dot" onclick="currentSlide({!! $key !!})"></span>
                @endforeach
            </div>
        </header>
    </div> 
    <div class="container">
        <h2>{!! trataTraducoes('Nossos veículos') !!}</h2>
        <div class="row">
            @forelse( retornaCarros() as $key => $retornaCarros )
                @include('veiculos::temas.2.box_cars',compact('retornaCarros'))
                @empty
                <div class="grid_12">
                    {!! trataTraducoes('Sem veículos no momento') !!}
                </div>
            @endforelse
        </div>
        @if (count(retornaCarros()) > 0)
            <p class="txt11">
                <a href="/cars" class="link1">{!! trataTraducoes('Listar todos os veículos') !!}</a>
            </p>
        @endif
    </div>
    @include('veiculos::temas.2.map')
</div>
    
@endsection

