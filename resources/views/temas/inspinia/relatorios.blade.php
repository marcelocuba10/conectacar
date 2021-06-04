<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<h4 style="float: right;">@include('cabecalho')</h4>
				<div class="ibox-title">
					<h5>{!! montaBreadcrumb($dados['dados']['titulo_pagina']) !!}</h5>
					<div class="ibox-tools" style="padding-right: 20px;">
						{!! ( !empty($dados['dados']['botoes_da_datatable']) ? $dados['dados']['botoes_da_datatable'] : Null ) !!}
					</div>
				</div>
					<?php
					/*
				<div class="ibox-content">
					<form name="formulario" id="formulario" action="{!! url($dados['dados']['rota_geral']) !!}" method="GET" enctype="multipart/form-data" onsubmit="return this.botaoEnviar{!! StatusDoSistema() === 0 ? 1 : Null !!}.disabled=true">
						@csrf
						<div class="row">
							<div class="col-md-2">&nbsp;</div>
							<div class="col-md-4">
								{!! montaCamposFormulario(['tamLabel' => 0,'tamDiv' => 12,'nome_no_banco_de_dados' => 'data_ini','tipo'=>'date','valor_inicial' => date('Y-m-'.'01'),]) !!}
							</div>
							<div class="col-md-4">
								{!! montaCamposFormulario(['tamLabel' => 0,'tamDiv' => 12,'nome_no_banco_de_dados' => 'data_fim','tipo'=>'date','valor_inicial' => date('Y-m-'.ultimoDiaMes(date('m'))),]) !!}
							</div>
							<div class="col-md-2">
								<br>
								{!! montaCamposFormulario(['tipo' => 'BotaoModalSalvar','size'=>10,'icone' => 'fa fa-search','titulo' => 'Filtrar','cor' => 'warning'],'b') !!}
							</div>
						</div>
					</form>
				</div>
					*/
					?>
				<div class="ibox-content">
					@include('temas.inspinia.datatable_relatorios')
				</div>
			</div>
		</div>
	</div>
</div>