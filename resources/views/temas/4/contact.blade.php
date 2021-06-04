@extends('temas.4.app');

@section('content')

<!--==============================header=================================-->
@include('temas.4.menu')

<!--=======content================================-->

			<div class="container">
				<div class="row">
					<div class="grid_5">
						<h2>{!! trataTraducoes('Onde você nos encontrar') !!}</h2>
						<figure class="img_inner v2">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d24214.807650104907!2d-73.94846048422478!3d40.65521573400813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1395650655094" style="border:0"></iframe>
						</figure>

						<address>
							<dl>
								<dt>{!! !empty($siteId['quaisDados']['endereco']) ? $siteId['quaisDados']['endereco'] : 'endereco'  !!}, {!! !empty($siteId['quaisDados']['numero']) ? $siteId['quaisDados']['numero'] : 'numero' !!}</dt>
								<dd><span>Telephone:</span>{!! !empty($data['settings']['site_telefone']) ? $data['settings']['site_telefone'] : 'site_telefone'!!}</dd>
								<dd>E-mail:  {!! !empty($data['settings']['email']) ? $data['settings']['email'] : 'email'!!}</dd>
							</dl>
						</address>

					</div>

					<div class="grid_6">
						@if(session('mensagem'))
						<div class="alert alert-success">
							{!! session('mensagem') !!}
						</div>
						@endif
						<h2>{!! trataTraducoes('Envie-nos uma mensagem') !!}</h2>
						<form id="contact-form" action="/cars/details/{!! !empty($carroSelecionado['hash_id']) ? $carroSelecionado['hash_id'] : null !!}" method="post" enctype="multipart/form-data" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true">
						<!--<div class="success-message">Contact form submitted!</div>-->
							<label class="name">
								<input type="text" placeholder="{!! trataTraducoes('Nome:') !!}" data-constraints="@Required @JustLetters" />
								<span class="empty-message">{!! trataTraducoes('*This field is required.') !!}</span>
								<span class="error-message">{!! trataTraducoes('*The message is too short.') !!}</span>
							</label>
							<label class="email">
								<input type="text" placeholder="{!! trataTraducoes('Email:') !!}" data-constraints="@Required @Email" />
								<span class="empty-message">{!! trataTraducoes('*This field is required.') !!}</span>
								<span class="error-message">{!! trataTraducoes('*The message is too short.') !!}</span>
							</label>
							<label class="last phone last">
								<input type="text" placeholder="{!! trataTraducoes('Phone:') !!}" data-constraints="@Required @JustNumbers"/>
								<span class="empty-message">{!! trataTraducoes('*This field is required.') !!}</span>
								<span class="error-message">{!! trataTraducoes('*The message is too short.') !!}</span>
							</label>
							<label class="message">
								<textarea placeholder="{!! trataTraducoes('Message:') !!}" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
								<span class="empty-message">{!! trataTraducoes('*This field is required.') !!}</span>
								<span class="error-message">{!! trataTraducoes('*The message is too short.') !!}</span>
							</label>
							<div  class="form_btns">
								<a href="#" data-type="submit" class="more_btn2">{!! trataTraducoes('Enviar mensagem') !!}</a>
							</div>   
						</form>
					</div>
				</div>
			</div>

 @endsection