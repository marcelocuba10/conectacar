<div class="col-sm-{!! ( !empty($data['tamanho']) ? $data['tamanho'] : 4 ) !!}" style="border: 1px solid #f00 !important; padding-top: 10px !important; padding-bottom: 10px !important;">
	<div class="product">
		<div class="product-image">
			<img src="{!! verificaImagemSistem(!empty($data['imagem']) ? $data['imagem'] : '/veiculo_sem_foto.png' ) !!}" alt="" style="width: auto !important; height: 175px !important;" />
		</div>
		<h5 class="product-price">
			<span>{!! !empty($data['valor']) ? currencyToSystemDefaultBD($data['valor']) : ' - ' !!}</span>
		</h5>
		<h6 class="product-title">
			<a href="new-cars.html">{!! !empty($data['nome']) ? $data['nome'] : ' - ' !!}</a>
		</h6>
		<div class="product-mile">
			<span>{!! !empty($data['km']) ? $data['km'] : ' - ' !!}</span>
		</div>
	</div>
</div>