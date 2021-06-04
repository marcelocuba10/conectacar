<section id="home" class="section swiper-container swiper-slider swiper-slider-1" data-loop="true" data-autoplay="false" data-simulate-touch="false" data-slide-effect="fade">
	<div class="swiper-wrapper text-center">

		@foreach( retornaCarros() as $banners )
		<div class="swiper-slide context-dark" data-slide-bg="{!! verificaImagemSistem(( count($banners['pegaFotos']) > 0 ) ? $banners['pegaFotos'][0]['imagem'] : 'vazio' ) !!}" style="background-position: 50% 50%;">
			<div class="swiper-slide-caption">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<h4>{!! $banners['pegaTipo'] !!} / {!! $banners['pegaCarroceria'] !!}</h4>
							<h1>{!! $banners['nome'] !!}</h1>
							<h3>{!! $banners['pegaMontadora'] !!} / {!! $banners['ano_veiculo'] !!}<span>{!! currencyToSystemDefaultBD($banners['valor'],2,true) !!}</span></h3>
							<a class="button" href="/cars/details/{!! $banners['hash_id'] !!}"><span>{!! trataTraducoes('Detalhes') !!}</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach

	</div>
	<div class="swiper-pagination"></div>
	<div class="swiper-button-prev fa-arrow-left"></div>
	<div class="swiper-button-next fa-arrow-right"></div>
</section>