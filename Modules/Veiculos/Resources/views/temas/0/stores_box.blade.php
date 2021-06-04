<div class="col-md-{!! ( !empty($datas['tamanho']) ? $datas['tamanho'] : 4 ) !!}" style="padding: 0px !important;">
	<article class="car-used">
		<div class="col-md-12">&nbsp;</div>
		<div class="car-used-image" style="height: 150px !important; text-align: center !important; overflow: hidden !important;">
			<a target="_blank" href="https://{!! ( !empty($datas['nome_fantasia']) ? strtolower($datas['nome_fantasia']).'.'.urlBaseSite() : '' ) !!}">
				<img src="{!! verificaImagemSistem(!empty($datas['quaisDados']['logotipo']) ? $datas['quaisDados']['logotipo'] : '/clientes/sem_foto.png' ) !!}" alt="{!! $datas['name'] !!}" style="width: 100% !important; height: auto !important;" />
			</a>
		</div>
		<h6 class="car-used-title">
			<a target="_blank" href="https://{!! ( !empty($datas['nome_fantasia']) ? strtolower($datas['nome_fantasia']).'.'.urlBaseSite() : '' ) !!}">
				{!! ( !empty($datas['nome_fantasia']) ? $datas['nome_fantasia'] : Null ) !!}
			</a>
		</h6>
		<p class="car-used-text">
			{!! ( !empty($datas['quaisDados']['endereco']) ? $datas['quaisDados']['endereco'] : Null ) !!}, {!! ( !empty($datas['quaisDados']['numero']) ? $datas['quaisDados']['numero'] : Null ) !!}
			{!! ( !empty($datas['quaisDados']['cidade']) ? '<br>'.$datas['quaisDados']['cidade'] : Null ) !!}{!! ( !empty($datas['quaisDados']['estado']) ? ' - '.$datas['quaisDados']['estado'] : Null ) !!}
			{!! ( !empty($datas['quaisDados']['bairro']) ? '<br>'.$datas['quaisDados']['bairro'] : Null ) !!}
		</p>
		<p class="car-used-text">
			{!! ( !empty($datas['quaisDados']['fone_1']) ? $datas['quaisDados']['fone_1'] : Null ) !!}
			{!! ( !empty($datas['quaisDados']['fone_2']) ? '<br>'.$datas['quaisDados']['fone_2'] : Null ) !!}
			{!! ( !empty($datas['quaisDados']['fone_3']) ? '<br>'.$datas['quaisDados']['fone_3'] : Null ) !!}
			{!! ( !empty($datas['quaisDados']['fone_4']) ? '<br>'.$datas['quaisDados']['fone_4'] : Null ) !!}
		</p>
		<hr class="car-used-divider">
		<a class="car-used-link" target="_blank" href="https://{!! ( !empty($datas['nome_fantasia']) ? strtolower($datas['nome_fantasia']).'.'.urlBaseSite() : '' ) !!}">
			{!! trataTraducoes('Visitar loja') !!}
		</a>
	</article>
</div>

<?php
/*
<ul class="car-used-rating">
<li><span class="icon fa-star text-primary"></span></li>
<li><span class="icon fa-star text-primary"></span></li>
<li><span class="icon fa-star text-primary"></span></li>
<li><span class="icon fa-star"></span></li>
<li><span class="icon fa-star"></span></li>
</ul>
<ul class="car-used-meta">
<li>
<div class="link-with-icon"><span class="icon fa-car"></span><a href="#">45</a></div>
</li>
<li>
<div class="link-with-icon"><span class="icon fa-thumbs-o-up"></span><a href="#">15</a></div>
</li>
</ul>
*/
?>