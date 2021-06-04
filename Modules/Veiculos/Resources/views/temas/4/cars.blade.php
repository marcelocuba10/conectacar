@extends('veiculos::temas.4.app')
@section('content')

<section class="section section-md bg-default">
    <div class="container">
        <div class="block-xl">
            <h3>{!! trataTraducoes("NOSSOS VEICULOS") !!}</h3>
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
        <div class="row row-30 mt-lg-60">
			<div class="grid_12" style="margin-top: 30px;">
				{!! retornaCarros()->links() !!}
			</div>
		</div>
    </div>
</section>

@endsection