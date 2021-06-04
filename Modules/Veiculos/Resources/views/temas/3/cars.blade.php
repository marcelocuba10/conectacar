@extends('veiculos::temas.3.app')
@section('content')

<section id="content">
    <div class="width-wrapper width-wrapper__inset1">
        <div class="wrapper1 wrapper7">
            <div class="container">
                <div class="row">
                    <div class="grid_12">
                        <div class="heading1 wow fadeIn animated" data-wow-duration="1s" data-wow-delay="0.1s"
                            style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeIn;">
                            <h2>{{ trataTraducoes("Nossos veiculos..")}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse( retornaCarros() as $key => $retornaCarros )
                        @include('veiculos::temas.3.box_cars',compact('retornaCarros'))
                        @empty
                        <div class="grid_12" style="margin-top: 30px;">
                            {!! trataTraducoes('Sem veículos no momento') !!}
                        </div>
                    @endforelse
                </div>
                <div class="row">
                    <div class="grid_12" style="margin-top: 30px;">
                        {!! retornaCarros()->links() !!}
                    </div>
                </div>
                <div class="wrapper7"></div>
            </div>
        </div>
    </div>
</section>

@endsection