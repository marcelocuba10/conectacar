<div class="col-sm-6 col-md-5">
	<div class="contact-banner">
		<div style="width: 100%;">
			<h2 class="cg-t t3">{!! ( !empty($datas['titulo_cor_1']) ? $datas['titulo_cor_1'] : Null ) !!} <br>
				<strong class="cy-t t2" style="line-height: 50px;">{!! ( !empty($datas['titulo_cor_2']) ? $datas['titulo_cor_2'] : Null ) !!}</strong>
			</h2>
		</div>
		<br>
		<p><i class="fa fa-globe novi-icon" aria-hidden="true"></i> - 
			@if( !empty($siteId['quaisDados']) )
			{!! $siteId['quaisDados']['endereco'] !!}, {!! $siteId['quaisDados']['numero'] !!}
			<br>
			{!! $siteId['quaisDados']['bairro'] !!}
			<br>
			{!! $siteId['quaisDados']['cidade'] !!} / {!! $siteId['quaisDados']['estado'] !!}
			@endif
		</p>
		<p><i class="fa fa-envelope novi-icon" aria-hidden="true"></i> - {!! site_id()['email'] !!}</p>
		<p><i class="fa fa-phone novi-icon" aria-hidden="true"></i> - {!! !empty($data['settings']['site_telefone']) ? $data['settings']['site_telefone'] : Null !!}</p>
	</div>
</div>

<div class="col-sm-6 col-md-6 col-md-offset-1">
	@if(session('mensagem'))
	<div class="alert alert-success">
		{!! session('mensagem') !!}
	</div>
	@endif
	<h3 style="color: #464646">{!! !empty($datas['subtitulo']) ? $datas['subtitulo'] : Null !!}</h3>
	<form name="formulario" id="formulario" action="/contact" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true">
		@csrf
		<div class="row row-15 row-fix">
			<div class="col-md-12">
				<div class="form-wrap">
					<label class="form-label" for="forms-name">{!! trataTraducoes('Nome') !!}</label>
					<input class="form-control" id="forms-name" type="text" name="nome" required="required">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-wrap">
					<label class="form-label" for="forms-email">{!! trataTraducoes('Email') !!}</label>
					<input class="form-control" id="forms-email" type="email" name="email" required="required">
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-wrap">
					<label class="form-label" for="forms-message">{!! trataTraducoes('Mensagem') !!}</label>
					<textarea class="form-control" id="forms-message" name="texto" required="required" rows="10"></textarea>
				</div>
			</div>
			<div class="col-md-12">
				<button type="submit" class="btn-default btn-cf-submit3" id="botaoEnviar" name="botaoEnviar">{!! trataTraducoes('Enviar') !!}</button>
			</div>
		</div>
	</form>
</div>