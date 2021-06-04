@extends('veiculos::temas.'.$siteId['tema'].'.app')
@section('content')

@include('veiculos::temas.'.$siteId['tema'].'.breadcrumb',['data' => ['Início','Lojas']])

<section class="section section-xs bg-default">
	<div class="container">
		<div class="row row-30 flex-xl-row-reverse justify-content-lg-center">
			<div class="col-xl-3">
				<div class="row row-30 justify-content-lg-center">
					<div class="col-md-6 col-lg-5 col-xl-12">
						@include('veiculos::temas/'.$siteId['tema'].'/busca_esquerda')
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
				<div class="row row-30 justify-content-lg-center">
					<div class="col-lg-10 col-xl-12">
						<div class="box-uc">
							<h4>{!! trataTraducoes('Lojas que estão utilizando nossa plataforma') !!}</h4>
							<div class="row row-30">
								@foreach( $data as $datas )
								@include('veiculos::temas.'.$siteId['tema'].'.stores_box',['data'=>['imagem' => '/temas/'.$siteId['tema'].'/images/used-car-01-217x166.jpg','nome' => $datas['name'],'telefone' => ( !empty($datas['qualDado'][0]) ? $datas['qualDado'][0]['telefone'] : '' ), 'url' => $datas['url']]])
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection