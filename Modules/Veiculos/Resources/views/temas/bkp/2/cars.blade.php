@extends('veiculos::temas.'.$siteId['tema'].'.app')

@section('content')

<div class="content" style="padding-top: 50px !important">
	<div class="container_12">
		@foreach( $data['nav']['cars']['content'] as $key => $content )
		@include('veiculos::temas.2.cars_box',['data' => $content])
		@endforeach
		<div class="clear"></div>
	</div>
</div>

@endsection