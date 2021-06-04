@extends('veiculos::temas.'.$siteId['tema'].'.app')
@section('content')

@include('veiculos::temas.'.$siteId['tema'].'.breadcrumb',['data' => ['Início','Carros']])

<section class="section section-xs bg-default">
	<div class="container">
		<div class="row row-30 flex-xl-row-reverse justify-content-lg-center">
			<div class="col-xl-3">
				<div class="row row-30 justify-content-lg-center">
					<div class="col-md-6 col-lg-5 col-xl-12">
						@include('veiculos::temas.'.$siteId['tema'].'.busca_esquerda')
					</div>
					<div class="col-md-6 col-lg-5 col-xl-12">
						<div class="box-gs">
							<h4>{!! trataTraducoes('Torne-se um afiliado') !!}</h4><img src="/temas/{!! $siteId['tema'] !!}/images/gs-your-car-01-310x159.jpg" alt="" width="310" height="159"/>
							<h6>Lorem ipsum dolor sit amet conse ctetur adipisicing elit</h6>
							<p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud modo consequat.</p>
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu.</p><a class="button button-lg button-primary button-ujarak" href="#">read more</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9">
				<div class="row row-30">
					@if( empty($_GET['details']) )
					@foreach( listaVeiculos() as $key => $data )
					@include('veiculos::temas.'.$siteId['tema'].'.cars_box', compact('data'))
					@endforeach

					<div class="col-md-12">
						{!! listaVeiculos()->render() !!}
					</div>

					@else
					@include('veiculos::temas.'.$siteId['tema'].'.cars_details')
					listaVeiculos($_GET['details'])
					@endif
				</div>
			</div>
		</div>
	</div>
</section>
<div class="container">&nbsp;</div>

@endsection