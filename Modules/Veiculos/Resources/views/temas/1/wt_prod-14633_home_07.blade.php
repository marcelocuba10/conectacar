<?php
$imagem = (!empty($conteudo) ? json_decode($conteudo['imagem'],true) : []);
$nome = (!empty($conteudo) ? json_decode($conteudo['nome'],true) : []);
$depoimento = (!empty($conteudo) ? json_decode($conteudo['depoimento'],true) : []);
?>

<div id="testimonials" class="section section-lg testimonials-bg novi-background custom-bg-image">
	<div class="container">
		<div class="owl-carousel" data-items='1' data-dots='true' data-nav='false' data-stage-padding='15' data-loop='false' data-margin='30' data-mouse-drag="false">
			@forelse( $depoimento as $key => $conteudo )
			<div class="review">
				<div class="review_inner">
					<div class="testimonial-wrapper">
						<div class="txt2">
							<div class="img-wrapper">
								<img src="{!! !empty($imagem[$key]) ? $imagem[$key] : Null !!}" alt="" class="img-responsive">
							</div>
						</div>
						<div class="txt1">
							<b>{!! !empty($nome[$key]) ? $nome[$key] : Null !!}</b>
						</div>
						<div class="txt3">{!! !empty($depoimento[$key]) ? $depoimento[$key] : Null !!}</div>
					</div>
				</div>
			</div>	
			@empty
			-
			@endforelse
		</div>
	</div>
</div>