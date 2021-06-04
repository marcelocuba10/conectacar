<?php
$total = 0;
?>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<h4 style="float: right;">@include('cabecalho')</h4>
				<div class="ibox-title">
					<h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
					<div class="ibox-tools" style="padding-right: 20px;">
						<a class="btn-apagar btn btn-info btn-xs float-right" data-toggle="tooltip" data-placement="top" style="margin: 0px 2px;" onclick="montaTela('/support/stores');" title="{!! trataTraducoes('voltar') !!}">
							<i class="fa fa-list" style="color: #fff"></i>
							<span style="color: #fff">{!! trataTraducoes('postos_certificados') !!}</span>
						</a>
					</div>
				</div>
				<div class="ibox-content">
					<div class="col-md-12">
						<div class="row" >
							<div class="col-lg-12">
								<h1>{!! $dados['data']['nome'] !!}</h1>
							</div>
							<div class="col-lg-12">&nbsp;</div>
							<div class="col-lg-8">
								<div class="col-lg-12">
									<img src="{!! verificaImagemSistem('logotipo') !!}" class="img-thumbnail" style="width: 25%; padding-left: 5px; padding-bottom: 5px; margin-right: 5px; margin-bottom: 5px;" align="left">{!! $dados['data']['texto_livre'] !!}
								</div>
								<div class="col-lg-12">



									<div class="ibox ">
										<div class="ibox-content">
											<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
												<div class="carousel-inner">

													@foreach( $dados['data']['acoesDisponiveis'] as $acoesDisponiveis )
													@if( $acoesDisponiveis['tipo'] === 'imagem' )
													<div class="carousel-item {!! $total++ === 1 ? 'active' : Null !!}">
														<img class="d-block w-100" src="{!! verificaImagemSistem($acoesDisponiveis['imagem']) !!}" alt="Second slide">
													</div>
													@endif
													@endforeach

												</div>
												<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
													<span class="carousel-control-prev-icon" aria-hidden="true"></span>
													<span class="sr-only">&nbsp;</span>
												</a>
												<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
													<span class="carousel-control-next-icon" aria-hidden="true"></span>
													<span class="sr-only">&nbsp;</span>
												</a>
											</div>
										</div>
									</div>



								</div>
							</div>
							<div class="col-lg-4 text-center">
								<span style="font-size: 22px">{!! trataTraducoes('avaliacao') !!}:</span><br>
								<span style="font-size: 18px">{!! classificacaoRedesLojasEstrelas($dados['data']['id']) !!}</span>
								<br><br>
								<div class="table-responsive text-left">
									<table class="table table-hover" cellpadding="0" cellspacing="0" border="0">
										@foreach( $dados['data']['acoesDisponiveis'] as $acoesDisponiveis )
										@if( $acoesDisponiveis['tipo'] === 'acoes' )
										<tr>
											<td style="width: 10% !important">{!! verificaImagemouIcone($acoesDisponiveis['imagem']) !!}</td>
											<td style="width: 90% !important">{!! $acoesDisponiveis['conteudo'] !!}</td>
										</tr>
										@endif
										@endforeach
									</table>
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3601.740393057481!2d-54.62745868493381!3d-25.480342741123113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f6852412fe5a03%3A0xb2fad4cd236070a4!2sParan%C3%A1%20Country%20Club%2C%20Paraguai!5e0!3m2!1spt-BR!2sbr!4v1589838522841!5m2!1spt-BR!2sbr" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	google.maps.event.addDomListener(window, 'load', init);

	function init() {
		var mapOptions1 = {
			zoom: 11,
			center: new google.maps.LatLng(40.6700, -73.9400),
			styles: [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}]
		};

		var map1 = new google.maps.Map(mapElement1, mapOptions1);
	</script>