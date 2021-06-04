@extends('veiculos::temas.2.app')
@section('content')

<div class="div-content">
	<div id="stuck_container">
		<header>
			@include('veiculos::temas.2.nav')
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
		<div class="row">
			<div class="grid_12" style="margin-top: 30px;">
				{!! retornaCarros()->links() !!}
			</div>
		</div>
	</div>
	@include('veiculos::temas.2.map')
</div>

@endsection