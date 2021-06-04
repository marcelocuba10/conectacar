<div class="col-lg-6 col-md-6 mg-top">
	<div class="icon-box aos-init aos-animate" data-aos="zoom-in-left">
		<div class="icon" style="width: 35%;text-align:right">
			<img src="{!! verificaImagemSistem($datas['imagem']) !!}" alt="" width="150" height="150">
		</div>
		<div style="float: right; margin-top: 10px;width:60%">
			<h6 class="titlee">{!! ( !empty($datas['titulo']) ? $datas['titulo'] : Null ) !!}</h6>
			<p class="big">{!! ( !empty($datas['conteudo']) ? $datas['conteudo'] : Null ) !!}</p>
		</div>
	</div>
</div>