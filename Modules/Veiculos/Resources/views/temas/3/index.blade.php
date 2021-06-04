@extends('veiculos::temas.3.app')
@section('content')

<section id="content">
    <div class="width-wrapper width-wrapper__inset1">
        <div class="wrapper1">
            <div class="container">
                <div class="row">
                    @if( count(retornaCarros()) > 0 )
                        <div class="grid_12">
                            <div class="slider-wrapper">
                                <div id="camera_wrap">
                                    @foreach( retornaCarros() as $key => $retornaCarros )
                                        @include('veiculos::temas.3.slider',compact('retornaCarros'))
                                    @endforeach
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    @endif
                    <div class="grid_12">
                        <div class="wrapper2">
                            <div class="heading1 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                                <h2>{!! trataTraducoes('Últimos veículos adicionados') !!}</h2>
                            </div>
                            <div class="border-wrapper1 wrapper3">
                                <div class="row">
                                    @forelse( retornaCarros() as $key => $retornaCarros )
                                        @include('veiculos::temas.3.box_cars',compact('retornaCarros'))
                                        @empty
                                        <div class="grid_12" style="margin-top: 30px;">
                                            {!! trataTraducoes('Sem veículos no momento') !!}
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            @if( count(retornaCarros()) > 0 )
                                <div class="button-wrapper1">
                                    <a class="btn-big-green wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s" href="/cars">
                                        <span>{!! trataTraducoes('Veja todos os veículos') !!}</span>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection