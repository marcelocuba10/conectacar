@extends('veiculos::temas.'.$siteId['tema'].'.app')
@section('content')

@include('veiculos::temas.'.$siteId['tema'].'.breadcrumb',['data' => ['Início','Contato']])

<section class="section section-xs bg-default">
	<div class="container">
		<div class="row row-30 justify-content-center">
			<div class="col-md-12">
				@if( !empty(session('mensagem')) )
				<div style="background-color: rgba(220,248,198,0.5); padding: 10px !important; text-align: center;">
					<h5>
						{!! session('mensagem') !!}
					</h5>
				</div>
				@endif
			</div>
			<div class="col-md-10 col-lg-7">
				<div class="google-map-wrapper">
					<h4>{!! trataTraducoes('Onde estamos?') !!}</h4>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3601.8157740752513!2d-54.62637728443931!3d-25.477826341024098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f6850512e96efd%3A0xeb4bd3d36e90e340!2sConectaCode!5e0!3m2!1spt-BR!2spy!4v1607658876462!5m2!1spt-BR!2spy" frameborder="0" style="border:0; width: 100% !important; height: 400px !important;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					<h6>{!! $siteId['name'] !!}</h6>
					<div class="row row-25">
						<div class="col-xs-6">
							<div class="list-info">
								<address>
									{!! $siteId['quaisDados']['cep'] !!} - {!! $siteId['quaisDados']['endereco'] !!}, {!! $siteId['quaisDados']['numero'] !!}<br>
									{!! $siteId['quaisDados']['bairro'] !!} - {!! $siteId['quaisDados']['cidade'] !!} - {!! $siteId['quaisDados']['estado'] !!}
								</address>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="list-info">
								<dl>
									<dt>
										{!! trataTraducoes('Telefone(s)') !!}
										<br>
										<a class="list-info-mail">{!! $siteId['quaisDados']['fone_1'] !!}</a>
										@if( !empty($siteId['quaisDados']['fone_2']) )
										<br><a class="list-info-mail">{!! $siteId['quaisDados']['fone_2'] !!}</a>
										@endif

										@if( !empty($siteId['quaisDados']['fone_3']) )
										<br><a class="list-info-mail">{!! $siteId['quaisDados']['fone_3'] !!}</a>
										@endif

										@if( !empty($siteId['quaisDados']['fone_4']) )
										<br><a class="list-info-mail">{!! $siteId['quaisDados']['fone_4'] !!}</a>
										@endif
									</dt>
								</dl>
								<dl>
									<dt>
										{!! trataTraducoes('Email') !!}
										<br>
										<a class="list-info-mail">{!! $siteId['email'] !!}</a>
									</dt>
								</dl>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-10 col-lg-5">
				<div class="form-wrapper">
					<h4>{!! trataTraducoes('Fale conosco') !!}</h4>
					<br>
					<form  method="post" action="/contact">
						@csrf
						<div class="form-wrap">
							<label>{!! trataTraducoes('Nome') !!}</label>
							<input class="form-input" type="text" name="nome" required="required">
						</div>
						<div class="form-wrap">
							<label>{!! trataTraducoes('Email') !!}</label>
							<input class="form-input" type="email" name="email" required="required">
						</div>
						<div class="form-wrap">
							<label>{!! trataTraducoes('Telefone') !!}</label>
							<input class="form-input" type="text" name="telefone" required="required">
						</div>
						<div class="form-wrap form-wrap-texture">
							<label>{!! trataTraducoes('Mensaqgem') !!}</label>
							<textarea class="form-input" name="mensagem" required="required"></textarea>
						</div>
						<div class="form-button group">
							<button style="width: 96.5% !important" class="button button-lg button-primary button-ujarak" type="submit">{!! trataTraducoes('Enviar') !!} <span class="fa fa-send"></span></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection