<?php
$dadosUsuarioCompleto = dadosUsuarioCompleto();

$consultaRootPai = Model('UserArvoreIndicadosPais')::find(Auth()->user()->id)['registroPai'];
?>

<div class="wrapper wrapper-content">
	<div class="row animated fadeInRight">
		<div class="col-md-5">
			<div class="ibox">

				<div class="col-md-12">&nbsp;</div>
				<div class="ibox-content">
					<div class="row">
						<div class="col-lg-6 text-right">
							<h3 class="text-left">{!! trataTraducoes('perfil_completo') !!}</h3>
							<div class="progress progress-mini">
								<div style="width: {!! validaPerfil() !!}%;" class="progress-bar"></div>
							</div>
							@if( validaPerfil() >= str_replace('%','',configuracoesPlataforma()['porcentagem_cadastro_concluido']) )
							<a href="/" class="float-left">{!! trataTraducoes('perfil_liberado') !!}</a>
							@endif
							<strong>{!! validaPerfil() !!}<small>%</small> {!! trataTraducoes('concluido') !!}</strong>
						</div>
						<div class="col-lg-6">
							@include('cabecalho')
						</div>
					</div>
				</div>

				<div class="col-md-12">&nbsp;</div>

				<div class="ibox-content">
					<h3>{!! trataTraducoes('perfil') !!}
						<small class="float-right"><a onclick="montaTela('/settings/my_profile/data');" style="cursor: pointer !important;"><i class="fa fa-edit"></i></a></small>
					</h3>
					<div class="form-group">
						<div class="ibox-content no-padding border-left-right text-center">
							<div class="col-lg-12">&nbsp;</div>
							<img alt="image" class="img-thumbnail" src="{!! fotoPerfil() !!}" style="max-height: 250px;">
						</div>
						<div class="ibox-content profile-content">
							<p>
								<i class="fa fa-id-card"></i> {!! Auth()->user()->name !!}
							</p>
							<p>
								<i class="fa fa-envelope"></i> {!! Auth()->user()->email !!}
							</p>
							<p>
								<i class="fa fa-calendar"></i> {!! date('d/m/Y', strtotime(explode(' ',Auth()->user()->created_at)[0])) !!}
							</p>
							<p>
								<i class="fa fa-birthday-cake"></i> {!! ( !empty($dadosUsuarioCompleto['nascimento_fundacao']) ? dateBdToApp($dadosUsuarioCompleto['nascimento_fundacao']) : Null )  !!}
							</p>
							<p>
								<i class="fa fa-language"></i> {!! trataTraducoes($dadosUsuarioCompleto['idioma']) !!}
							</p>
							<p>
								<i class="fa fa-barcode"></i> {!! trataTraducoes($dadosUsuarioCompleto['matricula']) !!}
							</p>
							<?php
							/*
							<p>
								<i class="fa fa-globe"></i> {!! trataTraducoes($dadosUsuarioCompleto['fuso_horario']) !!}
							</p>
							*/
							?>
						</div>
					</div>
				</div>

				@if( (int)$dadosUsuarioCompleto['root'] > 3 )
				<div class="ibox">
					<div class="col-md-12">&nbsp;</div>
					<div class="ibox-content">
						<h3>{!! trataTraducoes('patrocinador') !!}</h3>

						<?php
						/*
						nome do patrocinador
						matricula do patroninador
						balão de correio
						balão de chat
						*/
						?>

						<div class="row">
							<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes('meu_indicador') !!}</div>
							<div class="col-sm-7">{!! $consultaRootPai['name'] !!}</div>

							<div class="col-sm-12">&nbsp;</div>

							<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes('matricula_do_meu_indicador') !!}</div>
							<div class="col-sm-7">{!! $consultaRootPai['matricula'] !!}</div>

							<div class="col-sm-12">&nbsp;</div>

							<div class="col-sm-6">
								<a onclick="montaTela('/communication/office/create/{!! $consultaRootPai['matricula'] !!}');" class="btn btn-link btn-block">
									<i class="fa fa-envelope"></i><br>
									{!! trataTraducoes('correio_interno') !!}
								</a>
							</div>
							<div class="col-sm-6">
								<a onclick="montaTela('/chat/chat/{!! $consultaRootPai['matricula'] !!}');" class="btn btn-link btn-block">
									<i class="fa fa-weixin"></i><br>
									{!! trataTraducoes('chat_online') !!}
								</a>
							</div>
						</div>
					</div>
				</div>
				@endif
			</div>
		</div>
		<div class="col-md-7">
			@if( Auth()->user()->nivel === 'tradoniex' )
			<div class="ibox">
				<div class="ibox-content">
					<h3>
						{!! trataTraducoes('meus_indicados') !!}
						<small class="float-right">
							<input class="float-left" type="text" value="{!! url('/register/'.Auth()->user()->matricula) !!}" style="width: 0.05px !important; height: 0.05px !important; border: 0px; background-color: transparent;" readonly="readonly">
							<button class="btn btn-sm btn-link float-right no-padding"><i class="fa fa-copy"></i> {!! trataTraducoes('copiar_codigo_de_indicacao') !!} </button>
						</small>
					</h3>
					<p class="small">
						{!! trataTraducoes('texto_meus_indicados') !!}
					</p>
					<div class="user-friends">
						<?php
						/*
						<a href=""><img alt="image" class="rounded-circle" src="/temas/inspinia/img/a3.jpg"></a>
						<a href=""><img alt="image" class="rounded-circle" src="/temas/inspinia/img/a1.jpg"></a>
						<a href=""><img alt="image" class="rounded-circle" src="/temas/inspinia/img/a2.jpg"></a>
						<a href=""><img alt="image" class="rounded-circle" src="/temas/inspinia/img/a4.jpg"></a>
						<a href=""><img alt="image" class="rounded-circle" src="/temas/inspinia/img/a5.jpg"></a>
						<a href=""><img alt="image" class="rounded-circle" src="/temas/inspinia/img/a6.jpg"></a>
						<a href=""><img alt="image" class="rounded-circle" src="/temas/inspinia/img/a7.jpg"></a>
						<a href=""><img alt="image" class="rounded-circle" src="/temas/inspinia/img/a8.jpg"></a>
						<a href=""><img alt="image" class="rounded-circle" src="/temas/inspinia/img/a2.jpg"></a>
						<a href=""><img alt="image" class="rounded-circle" src="/temas/inspinia/img/a1.jpg"></a>
						*/
						?>
					</div>
				</div>
			</div>
			@endif
			<div class="ibox">
				<div class="col-md-12">&nbsp;</div>
				<div class="ibox-content">
					<h3>{!! trataTraducoes('dados_pessoais') !!}
						<small class="float-right"><a onclick="montaTela('/settings/my_profile/additional');" style="cursor: pointer !important;"><i class="fa fa-edit"></i></a></small>
					</h3>
					<div class="row">
						<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes($dadosUsuarioCompleto['sexo']) !!}</div>
						<div class="col-sm-7">{!! $dadosUsuarioCompleto['sexo'] !!}</div>

						<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes('tipo_de_documento') !!}</div>
						<div class="col-sm-7">{!! trataTraducoes($dadosUsuarioCompleto['tipo_documento']) !!}</div>

						<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes('cedula_de_identidade') !!}</div>
						<div class="col-sm-7">{!! $dadosUsuarioCompleto['cpf_cnpj'] !!}</div>

						<!--<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes('documento_secundario') !!}</div>
							<div class="col-sm-10">{9! $dadosUsuarioCompleto['rg_ie'] !!}</div> -->

							<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes('nacionalidade') !!}</div>
							<div class="col-sm-7">{!! $dadosUsuarioCompleto['nacionalidade'] !!}</div>

							<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes('naturalidade') !!}</div>
							<div class="col-sm-7">{!! $dadosUsuarioCompleto['naturalidade'] !!}</div>

							<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes('nome_mae') !!}</div>
							<div class="col-sm-7">{!! $dadosUsuarioCompleto['filiacao_mae'] !!}</div>

							<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes('nome_pai') !!}</div>
							<div class="col-sm-7">{!! $dadosUsuarioCompleto['filiacao_pai'] !!}</div>

							<?php
							/*
							<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes('moeda_padrao') !!}</div>
							<div class="col-sm-7">{!! $dadosUsuarioCompleto['moeda_padrao'] !!}</div>
							*/
							?>
						</div>
					</div>
				</div>
				<div class="ibox">
					<div class="ibox-content">
						<h3>{!! trataTraducoes('documentos') !!}</h3>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-1"><i class="fa fa-drivers-license"></i></div>
								<div class="col-lg-10">{!! trataTraducoes('foto_cedula_de_identidade') !!}</div>
								<div class="col-lg-1">
									@if( !is_null($dadosUsuarioCompleto['cpf_cnpj']) )
									<a onclick="montaTela('/settings/my_profile/photo');" style="cursor: pointer !important;"><i class="fa fa-edit"></i></a>
									@else
									<a onclick="montaTela('/settings/my_profile/additional');" style="cursor: pointer !important;"><i class="fa fa-edit"></i></a>
									@endif
								</div>

								<div class="col-lg-12">&nbsp;</div>

								<div class="col-lg-1"><i class="fa fa-address-card-o"></i></div>
								<div class="col-lg-10">{!! trataTraducoes('selfie_com_documento') !!}</div>
								<div class="col-lg-1"><a onclick="montaTela('/settings/my_profile/selfie');" style="cursor: pointer !important;"><i class="fa fa-edit"></i></a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="ibox">
					<div class="ibox-content">
						<h3>{!! trataTraducoes('endereco') !!}
							<small class="float-right"><a onclick="montaTela('/settings/my_profile/address');" style="cursor: pointer !important;"><i class="fa fa-edit"></i></a></small>
						</h3>
						<div class="row">
							<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes('pais') !!}</div>
							<div class="col-sm-7">{!! Model('Paises')::find($dadosUsuarioCompleto['pais'])['nome'] !!}</div>

							<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes('cep') !!}</div>
							<div class="col-sm-7">{!! $dadosUsuarioCompleto['cep'] !!}</div>

							<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes('endereco') !!}</div>
							<div class="col-sm-7">{!! $dadosUsuarioCompleto['logradouro'] !!}</div>

							<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes('numero') !!}</div>
							<div class="col-sm-7">{!! $dadosUsuarioCompleto['numero'] !!}</div>

							<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes('complemento') !!}</div>
							<div class="col-sm-7">{!! $dadosUsuarioCompleto['complemento'] !!}</div>

							<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes('bairro') !!}</div>
							<div class="col-sm-7">{!! $dadosUsuarioCompleto['bairro'] !!}</div>

							<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes('cidade') !!}</div>
							<div class="col-sm-7">{!! $dadosUsuarioCompleto['cidade'] !!}</div>

							<div class="col-sm-5" style="white-space: nowrap !important;">{!! trataTraducoes('estado') !!}</div>
							<div class="col-sm-7">{!! $dadosUsuarioCompleto['estado'] !!}</div>
						</div>
					</div>
				</div>
				<div class="ibox">
					<div class="ibox-content">
						<h3>{!! trataTraducoes('telefone') !!}
							<small class="float-right"><a onclick="montaTela('/settings/my_profile/phone');" style="cursor: pointer !important;"><i class="fa fa-edit"></i></a></small>
						</h3>
						<div class="row">
							<div class="col-sm-5" style="white-space: nowrap !important;">&nbsp;</div>
							<div class="col-sm-7">{!! $dadosUsuarioCompleto['fone_1'] !!}</div>

							<div class="col-sm-5" style="white-space: nowrap !important;">&nbsp;</div>
							<div class="col-sm-7">{!! $dadosUsuarioCompleto['fone_2'] !!}</div>

							<div class="col-sm-5" style="white-space: nowrap !important;">&nbsp;</div>
							<div class="col-sm-7">{!! $dadosUsuarioCompleto['fone_3'] !!}</div>

							<div class="col-sm-5" style="white-space: nowrap !important;">&nbsp;</div>
							<div class="col-sm-7">{!! $dadosUsuarioCompleto['fone_4'] !!}</div>
						</div>
					</div>
				</div>

				<?php
				/*
				<div class="ibox">
					<div class="ibox-content">
						<h3>{!! trataTraducoes('senha') !!}
							<small class="float-right"><a onclick="montaTela('/settings/my_profile/password');" style="cursor: pointer !important;"><i class="fa fa-edit"></i></a></small>
						</h3>
						<div class="row text-center">
							{!! trataTraducoes('ultima_alteracao_feita_em') !!}
						</div>
					</div>
				</div>
				*/
				?>
			</div>
		</div>
	</div>