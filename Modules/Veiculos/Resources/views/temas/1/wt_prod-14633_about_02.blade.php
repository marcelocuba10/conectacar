<div class="row content aos-init aos-animate">
	<div class="col-lg-6 col-md-6 thumbnail-r" style="text-align: center;">
		<img src="{!! verificaImagemSistem($datas['imagem']) !!}" alt="" width="210" height="190">
	</div>
	<div class="col-lg-6 col-md-6 pt-4 pt-lg-0" style="margin-top: 25px;">
		<div class="w-60">
			<h2 class="cg-t t2">{!! ( !empty($datas['titulo_cor_1']) ? $datas['titulo_cor_1'] : Null ) !!} <strong class="cy-t">{!! ( !empty($datas['titulo_cor_2']) ? $datas['titulo_cor_2'] : Null ) !!}</strong></h2>
			<p class="big t33" >{!! ( !empty($datas['conteudo']) ? $datas['conteudo'] : Null ) !!}</p>
		</div>
	</div>
</div>

<?php
/*

<div class="row content aos-init aos-animate">
<div class="col-lg-6 col-md-6 thumbnail-r" style="text-align: center;">
<img src="/temas/1/images/vision_conectacar.png" alt="" width="210" height="190">
</div>
<div class="col-lg-6 col-md-6 pt-4 pt-lg-0" style="margin-top: 25px;">
<div class="w-60">
<h2 class="cg-t t2">Nossa <strong class="cy-t">Visão</strong></h2>
<p class="big t33">Ser a opção mais reconhecida no mercado pela qualidade do serviço prestado, para que os nossos clientes tenham a melhor experiência.</p>
</div>
</div>
</div>

*/
?>