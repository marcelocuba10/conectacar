@extends('veiculos::temas.'.$siteId['tema'].'.app')
@section('content')

@include('veiculos::temas.'.$siteId['tema'].'.breadcrumb',['data' => ['Início','Serviços']])

<section class="section section-xs bg-default">
	<div class="container">
		<div class="row row-30 justify-content-center">
			<div class="col-sm-9 col-md-12 col-lg-9 col-xl-9">
				<div class="row row-30">
					<div class="col-xl-12">
						<div class="box-cars-pa">
							<h4>{!! trataTraducoes('Serviços oferecidos') !!}</h4>
							<ul class="row row-25 cars-pa-list">
								@foreach( consultaTabelasServicos('servicos') as $key => $servicos )
								<li class="col-md-6">
									<div class="unit unit-spacing-sm">
										<div class="unit-left">
											<div class="cars-pa-list-index">
												<span></span>
											</div>
										</div>
										<div class="unit-body">
											<h6 class="cars-pa-title">
												<a href="#">{!! $servicos['titulo'] !!}</a>
											</h6>
										</div>
									</div>
									<p class="cars-pa-text">{!! $servicos['conteudo'] !!}</p>
									<hr class="cars-pa-divider">
								</li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="col-xl-12">
						<div class="box-sc">
							<h4>{!! trataTraducoes('Venda seu carro online') !!}</h4>
							<div class="row row-30">
								@foreach( consultaTabelasServicos('servicos_venda_carro') as $key => $servicosvendacarro )
								<div class="col-sm-6 col-md-4">
									<article class="car-sell">
										<div class="car-sell-image"><a><img src="/temas/{!! $siteId['tema'] !!}/images/sell-car-01-217x166.jpg" alt="" width="217" height="166"/></a></div>
										<h6 class="car-sell-title"><a href="#">{!! trataTraducoes($servicosvendacarro['titulo']) !!}</a></h6>
										<p class="car-sell-text">{!! trataTraducoes($servicosvendacarro['conteudo']) !!}</p>
										<hr class="car-sell-divider">
									</article>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3 col-md-12 col-lg-3 col-xl-3">
				@include('veiculos::temas.'.$siteId['tema'].'.busca_esquerda')
			</div>
		</div>
	</div>
</section>

@endsection