@extends('veiculos::temas.1.app')
@section('content')

@include('veiculos::temas.1.wt_prod-14633_home_01')

<div class="section section-md novi-background bg-cover">
    <div class="container">
        <div class="row">
            @foreach( $data['conteudo'] as $conteudo )
            @if( $conteudo['layout'] === 'wt_prod-14633_home_02' )
            @include('veiculos::temas.1.wt_prod-14633_home_02',['retornaCarros' => veiculosMaisVistos(3)])
            @endif
            @endforeach
        </div>
    </div>
</div>

@foreach( $data['conteudo'] as $conteudo )
	@if( $conteudo['layout'] != 'wt_prod-14633_home_01' && $conteudo['layout'] != 'wt_prod-14633_home_02' )
		@include('veiculos::temas.1.'.$conteudo['layout'],compact('conteudo'))
	@endif
@endforeach

@endsection