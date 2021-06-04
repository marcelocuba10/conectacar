@extends('veiculos::temas.6.app')
@section('content')

<header class="page-header">
    @include('veiculos::temas.6.nav')
</header>

<section class="section section-lg bg-default">
    <div class="container">
        <div class="text-center">
            <h2 class="wow fadeIn">{!! trataTraducoes("NOSSOS VEICULOS") !!}</h2>
            <svg class="quote-primary-line" width="70%" height="8" viewBox="0 0 70 8" fill="none" role="presentation">
                <path d="M0 1C5 1 5 7 9.92 7C14.84 7 14.92 1 19.85 1C24.78 1 24.85 7 29.77 7C34.69 7 34.77 1 39.71 1C44.65 1 44.71 7 49.63 7C54.55 7 54.63 1 59.57 1C64.51 1 64.57 7 69.5 7" stroke-width="1.98" stroke-miterlimit="10"></path>
            </svg>
        </div>
        <div class="row row-30 mt-lg-60">
            @forelse( retornaCarros() as $key => $retornaCarros )
                @include('veiculos::temas.6.box_cars',compact('retornaCarros'))
                @empty
                    <div class="alert-cars" role="alert">
                        {!! trataTraducoes('Sem veículos no momento') !!}
                    </div>
            @endforelse
        </div>
        <div class="row row-30 mt-lg-60">
			<div class="grid_12" style="margin-top: 30px;">
				{!! retornaCarros()->links() !!}
			</div>
		</div>
    </div>
</section>

@endsection