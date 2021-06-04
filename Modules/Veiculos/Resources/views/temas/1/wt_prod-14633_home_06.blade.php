<?php
$imagem = (!empty($conteudo) ? json_decode($conteudo['imagem'],true) : []);
$valor = (!empty($conteudo) ? json_decode($conteudo['valor'],true) : []);
$titulo = (!empty($conteudo) ? json_decode($conteudo['titulo'],true) : []);
?>

<div class="section section-sm novi-background bg-cover bg-gray-light section-shadow">
	<div class="container">
		<div class="row counter-list">
			@forelse( $imagem as $key => $conteudo )
			<div class="col-sm-6 col-md-3 counter-list-item">
				<div class="counter-classic">
					<div class="counter-classic-inner animated" data-animation="fadeInDown" data-animation-delay="200">
						<img src="{!! !empty($imagem[$key]) ? $imagem[$key] : Null !!}" alt="" class="counter-img">
						<div class="caption">
							<div class="counter">
								<span class="animated-number" data-duration="2000" data-animation-delay="0">{!! !empty($valor[$key]) ? $valor[$key] : Null !!}</span>
							</div>
							<div class="counter-title">{!! !empty($titulo[$key]) ? $titulo[$key] : Null !!}</div>
						</div>
					</div>
				</div>
			</div>
			@empty
			-
			@endforelse
		</div>
	</div>
</div>