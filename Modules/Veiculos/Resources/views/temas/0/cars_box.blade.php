<div class="col-sm-{!! ( !empty($data['tamanho']) ? $data['tamanho'] : 4 ) !!}" style="padding-top: 10px !important; padding-bottom: 10px !important;">
	@if( !empty($data['pegaEmpresa']['nome_fantasia']) )
	<a href="https://{!! strtolower($data['pegaEmpresa']['nome_fantasia']).'.'.urlBaseSite() !!}/cars/details/{!! $data['hash_id'] !!}" target="_blank">
	@endif
		<div class="product">
			@if( !empty($data['pegaEmpresa']['name']) )
			<div class="col-md-12">
				{!! trataTraducoes('Veículo disponível em') !!}: {!! $data['pegaEmpresa']['name'] !!}
			</div>
			@endif
			<div class="product-image">
				{!! $data['id'] !!}
				<img src="{!! verificaImagemSistem(!empty($data['imagem']) ? $data['imagem'] : '/veiculo_sem_foto.png' ) !!}" alt="" style="width: auto !important; height: 175px !important;" />
			</div>
			<h5 class="product-price">
				<span>{!! !empty($data['valor']) ? currencyToSystemDefaultBD($data['valor']) : ' - ' !!}</span>
			</h5>
			<h6 class="product-title">
				{!! !empty($data['nome']) ? $data['nome'] : ' - ' !!}
			</h6>
			<div class="product-mile">
				<span>{!! !empty($data['km']) ? $data['km'] : ' - ' !!}</span>
			</div>
		</div>
	@if( !empty($data['pegaEmpresa']['nome_fantasia']) )
	</a>
	@endif
</div>