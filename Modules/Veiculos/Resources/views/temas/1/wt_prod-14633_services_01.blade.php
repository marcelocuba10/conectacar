<div class="col-lg-6 col-md-6 mg-top">
	<div class="icon-box aos-init aos-animate" data-aos="zoom-in-left">
		<div class="icon" style="width: 35%;text-align:right">
			<a data-lightgallery="item" class="thumbnail-creative" href="">
				<img src="{!! verificaImagemSistem($datas['imagem']) !!}" alt="" style="width: 100% !important; height: auto !important">
				<div class="thumbnail-creative-overlay"></div>
			</a>
		</div>
		<div style="float: right; margin-top: 10px;width:60%">
			<a href="">
				<h6 class="titlee">{!! ( !empty($datas['titulo']) ? $datas['titulo'] : Null ) !!} </h6>
			</a>
			<p>{!! ( !empty($datas['conteudo']) ? $datas['conteudo'] : Null ) !!}</p>
		</div>
	</div>
</div>