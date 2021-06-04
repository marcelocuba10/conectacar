<?php
$cor = '#e2e2e2';
?>
<div class="col-xxs-12 col-xs-6 col-sm-3 col-md-3">
	<div class="product-minimal">
		<div class="thumbnail clearfix">
			<figure class="product-minimal-img">
				<a href="/cars/details/{!! !empty($retornaCarros['hash_id']) ? $retornaCarros['hash_id'] : Null !!}">
					<img style="width: 270px;height: 164px;" src="{!! verificaImagemSistem(( !empty($retornaCarros['pegaFotos']) ? count($retornaCarros['pegaFotos']) > 0 ? $retornaCarros['pegaFotos'][0]['imagem'] : Null : Null )) !!}" alt="" class="img-responsive">
				</a>
			</figure>
			<div class="caption">
				<p class="small">REGISTRADO {!! !empty($retornaCarros['ano_fabricacao']) ? $retornaCarros['ano_fabricacao'] : Null !!} / {!! !empty($retornaCarros['ano_veiculo']) ? $retornaCarros['ano_veiculo'] : Null !!}</p>
				<div class="product-minimal-title"><a href="/cars/details/{!! !empty($retornaCarros['hash_id']) ? $retornaCarros['hash_id'] : Null !!}">{!! !empty($retornaCarros['nome']) ? $retornaCarros['nome'] : Null !!}</a></div>
				<div class="info">
					<span class="price">{!! currencyToSystemDefaultBD(( !empty($retornaCarros['valor']) ? $retornaCarros['valor'] : 0 ),2,true) !!}</span>
					<span class="speed">{!! !empty($retornaCarros['km']) ? $retornaCarros['km'] : Null !!} KM</span>
				</div>
				<div class="row" style="height: 80px !important; overflow: hidden !important; text-align: center !important;">
					<ul class="tag-list">
						<li><a href="/cars?cambio={!! !empty($retornaCarros['cambio']) ? $retornaCarros['cambio'] : Null !!}">{!! !empty($retornaCarros['pegaCambio']) ? $retornaCarros['pegaCambio'] : Null !!}</a></li>
						<li><a href="/cars?cor={!! !empty($retornaCarros['cambio']) ? $retornaCarros['cambio'] : Null !!}">{!! !empty($retornaCarros['pegaCor']) ? $retornaCarros['pegaCor'] : Null !!}</a></li>
						<li><a href="/cars?combustivel={!! !empty($retornaCarros['cambio']) ? $retornaCarros['cambio'] : Null !!}">{!! !empty($retornaCarros['pegaCombustivel']) ? $retornaCarros['pegaCombustivel'] : Null !!}</a></li>
					</ul>
					<ul class="tag-list">
						<li><a href="/cars?combustivel={!! !empty($retornaCarros['montadora']) ? $retornaCarros['montadora'] : Null !!}">{!! !empty($retornaCarros['pegaMontadora']) ? $retornaCarros['pegaMontadora'] : Null !!}</a></li>
						<li><a href="/cars?combustivel={!! !empty($retornaCarros['tipo']) ? $retornaCarros['tipo'] : Null !!}">{!! !empty($retornaCarros['pegaTipo']) ? $retornaCarros['pegaTipo'] : Null !!}</a></li>
						<li><a href="/cars?combustivel={!! !empty($retornaCarros['carroceria']) ? $retornaCarros['carroceria'] : Null !!}">{!! !empty($retornaCarros['pegaCarroceria']) ? $retornaCarros['pegaCarroceria'] : Null !!}</a></li>
					</ul>
					<ul class="tag-list">
						<li><a href="/cars?combustivel={!! !empty($retornaCarros['portas']) ? $retornaCarros['portas'] : Null !!}">{!! !empty($retornaCarros['pegaPorta']) ? $retornaCarros['pegaPorta'] : Null !!}</a></li>
						<li><a href="/cars?combustivel={!! !empty($retornaCarros['motorizacao']) ? $retornaCarros['motorizacao'] : Null !!}">{!! !empty($retornaCarros['pegaMotorizacao']) ? $retornaCarros['pegaMotorizacao'] : Null !!}</a></li>
						<li><a href="/cars?combustivel={!! !empty($retornaCarros['ano']) ? $retornaCarros['ano'] : Null !!}">{!! !empty($retornaCarros['ano_veiculo']) ? $retornaCarros['ano_veiculo'] : Null !!}</a></li>
					</ul>
				</div>
			</div>
			<div class="caption">
				<a href="/cars/details/{!! !empty($retornaCarros['hash_id']) ? $retornaCarros['hash_id'] : Null !!}">
					<li class="btn-default btn-cf-submit4">{!! trataTraducoes('Detalhes') !!}</li>
				</a>
			</div>
		</div>
	</div>
</div>