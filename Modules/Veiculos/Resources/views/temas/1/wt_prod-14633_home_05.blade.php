<div class="parallax-container parallax1" data-parallax-img="{!! ( !empty($conteudo['imagem']) ? $conteudo['imagem'] : Null ) !!}">
	<div class="parallax-content">
		<div class="section">
			<div class="container">
				<div class="row row-fix">
					<div class="col-sm-8 col-sm-offset-2">
						<div class="figure-section">
							<div class="section-title">{!! ( !empty($conteudo['titulo']) ? $conteudo['titulo'] : Null ) !!}</div>
							<h3>{!! ( !empty($conteudo['subtitulo']) ? $conteudo['subtitulo'] : Null ) !!}</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="figure-section-text">
										<p>{!! ( !empty($conteudo['conteudo']) ? $conteudo['conteudo'] : Null ) !!}</p>
									</div>
								</div>
								<?php
								/*
								<div class="col-md-6">
									<span class=" list-marked-left">
										{!! ( !empty($conteudo['subconteudo']) ? $conteudo['subconteudo'] : Null ) !!}
									</span>
								</div>
								*/
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>