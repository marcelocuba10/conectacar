@if( empty($imprime) )
<style>
	.tituloComprovante{
		text-transform: uppercase !important;font-size: 18pt !important;font-weight: bold !important;
	}
	.subTituloComprovante{
		text-transform: uppercase !important;
		font-size: 14pt !important;
		font-weight: bold !important;
	}
	.textoTituloComprovante{
		text-transform: uppercase !important;
		font-size: 12pt !important;
	} 
	.bordaSeparador{
		border-top: 2px solid #E2E398 !important;
		width: 90% !important;
		margin-left: 5% !important;
	}
</style>


<div class="container-fluid">
	<div class="col-md-2">&nbsp;</div>
	<div class="col-md-8">
@endif
		<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #F4F4B6;">
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>
				<td style="width: 5%">&nbsp;</td>
				<td style="width: 90%">
					<!-- <img src="url(site_id()['logo'])"> -->
					<p style="text-transform: uppercase !important;font-size: 18pt !important;font-weight: bold !important;text-align: center;">{!! Comprovante de '.$dados['tipo'].'') !!}</p>
					<p style="border-top: 2px solid #E2E398 !important;width: 90% !important;margin-left: 5% !important;"></p>
					<p style="text-transform: uppercase !important;font-size: 18pt !important;font-weight: bold !important;">{!! trataTraducoes('Dados do cliente') !!}</p>
					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('Nome') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! Auth()->user()->name !!}</span></p>
					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('email') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! Auth()->user()->email !!}</span></p>
					
					@if( !empty($dados['UsuarioDestino']) )
					<p style="border-top: 2px solid #E2E398 !important;width: 90% !important;margin-left: 5% !important;"></p>
					<p style="text-transform: uppercase !important;font-size: 18pt !important;font-weight: bold !important;">{!! trataTraducoes('beneficiario') !!}</p>
					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('nome_fantasia') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! $dados['UsuarioDestino']['name'] !!}</span></p>
					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('email') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! $dados['UsuarioDestino']['matricul'] !!}</span></p>
					@endif

					<p style="border-top: 2px solid #E2E398 !important;width: 90% !important;margin-left: 5% !important;"></p>
					<p style="text-transform: uppercase !important;font-size: 18pt !important;font-weight: bold !important;">{!! trataTraducoes('dados_do_comprovante') !!}</p> 
					@if($dados['tipo'] == 'deposits') 
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('codigo') !!}: </span> <span style="font-size: 14px !important;"><small style="word-wrap: break-word;">{!! (strlen($dados['codigo_transacao']) > 64) ? $dados['codigo_transacao'][0].'...'.substr($dados['codigo_transacao'],-45) : $dados['codigo_transacao'] !!}</small></span><a target="_blank" href="https://www.blockchain.com/btc/tx/{{$dados['codigo_transacao']}}"> <i class="fa fa-external-link"></i></a></p>
					@else 
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('codigo') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;"><small style="word-wrap: break-word;">{!! (strlen($dados['codigo_transacao']) > 64) ? $dados['codigo_transacao'][0].'...'.substr($dados['codigo_transacao'],-45) : $dados['codigo_transacao'] !!}</small></span></p>
					@endif
					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('forma_pagamento') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! trataTraducoes(''.$dados['tipo'].'') !!}</span></p>
					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('data_pagamento') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! dateBdToApp($dados['pagamento']) !!}</span></p>
					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('hora_pagamento') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! $dados['pagamento'] !!}</span></p>
					
					@if($dados['tipo'] == 'deposits')
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('valor_depositado') !!} (Blockchain): </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{{ moeda_oficial()['sigla']}} {!! number_format($dados['valor'],8,'.',',').' |' !!}  {{ moeda_info()['codigo'] }} {!! number_format($dados['valor'],2, ',', '.') !!} ({{json_decode($dados['json_transacao'])->dados->valor_btc}}<b> BTCs)</b></b></span></p>
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('carteira_para_deposito') !!} (Blockchain): </span> <span style="font-size: 12pt !important;">{!! $dados['identificador_BTC'] !!}</span></p>
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('valor_creditado') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{{ moeda_oficial()['sigla']}} {!! number_format($dados['valor'],8,'.',',') !!} </span></p>
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('moeda_utilizada') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">BTC</span></p>
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('confirmacoes') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{{ $dados['confirmacoes_blockchain']}}</span></p>
						{{-- @if(count($dados['dependencias']) > 0)
							<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('status') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! trataTraducoes('aprovado') !!} </span></p>
							<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('valor_creditado') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! currencyToSystemDefaultBD($dados['dependencias'][0]['valor']) !!} </span></p>
							<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('hash_da_transacao') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! currencyToSystemDefaultBD($dados['dependencias'][0]['codigo_transacao']) !!} </span></p>
						@else
							<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('status') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! trataTraducoes('pendente') !!} </span></p>
						@endif --}}

					@else 
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('valor_pagamento') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{{ moeda_oficial()['sigla']}} {!! number_format($dados['total'],8,'.',',').' |' !!}  {{ moeda_info()['codigo'] }} {!! number_format($dados['total'],2, ',', '.') !!}</span></p>
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('percentual_encargos') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! $dados['cotacao'] !!}</span></p>
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('valor_documento') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{{ moeda_oficial()['sigla']}} {!! number_format($dados['valor'],8,'.',',').' |' !!}  {{ moeda_info()['codigo'] }} {!! number_format($dados['valor'],2, ',', '.') !!}</span></p>
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('valor_encargos') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{{ moeda_oficial()['sigla']}} {!! number_format($dados['acrescimo'],8,'.',',').' |' !!}  {{ moeda_info()['codigo'] }} {!! number_format($dados['acrescimo'],2, ',', '.') !!}</span></p>
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('valor_abatimento') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{{ moeda_oficial()['sigla']}} {!! number_format($dados['desconto'],8,'.',',').' |' !!}  {{ moeda_info()['codigo'] }} {!! number_format($dados['desconto'],2, ',', '.') !!}</span></p>
						<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('moeda_utilizada') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">$dados['json_transacao'])->dados->moeda_padrao 
						$dados['historicoFinanceiro']['moeda']['nome']</span></p>
					@endif
					

					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('data_hora_inicio_transacao') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! dateTimeBdToApp($dados['created_at']) !!}</span></p>
					<p><span style="text-transform: uppercase !important;font-size: 14pt !important;font-weight: bold !important;">{!! trataTraducoes('data_hora_termino_transacao') !!}: </span> <span style="text-transform: uppercase !important;font-size: 12pt !important;">{!! dateTimeBdToApp($dados['updated_at']) !!}</span></p>
					<p style="border-top: 2px solid #E2E398 !important;width: 90% !important;margin-left: 5% !important;"></p>
				</td>
				<td style="width: 5%">&nbsp;</td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
		</table>
@if( empty($imprime) )
	</div>
	<div class="col-md-1" style="position: fixed; margin-left: 0px; margin-top: 0px; float: right; padding-top: 100px">
		<br><br>
		<div class="col-md-12 pull-right" style="padding:0px 5px; margin-bottom: 10px;"><a onclick="{!! trataUrlparaFuncao('/backend/financial/'.$dados['tipo'].'/create') !!}" style="cursor: pointer"><li class="btn btn-block btn-lg btn-success" data- data-toggle="tooltip" title="{!! trataTraducoes('nova_'.$dados['tipo'].'') !!}"><i class="fa fa-plus"></i></li></a></div>
		<br><br>
		@if($dados['tipo'] != 'withdrawals')
		<div class="col-md-12 pull-right" style="padding:0px 5px; margin-bottom: 10px;"><a onclick="{!! trataUrlparaFuncao('/backend/financial/'.$dados['tipo'].'') !!}" style="cursor: pointer"><li class="btn btn-block btn-lg btn-info" data- data-toggle="tooltip" title="{!! trataTraducoes('listar_'.$dados['tipo'].'') !!}"><i class="fa fa-list"></i></li></a></div>
		@else 
		<div class="col-md-12 pull-right" style="padding:0px 5px; margin-bottom: 10px;"><a onclick="{!! trataUrlparaFuncao('/backend/financial/withdrawalslist') !!}" style="cursor: pointer"><li class="btn btn-block btn-lg btn-info" data- data-toggle="tooltip" title="{!! trataTraducoes('listar_'.$dados['tipo'].'') !!}"><i class="fa fa-list"></i></li></a></div>
		@endif
		<br><br>
		<div class="col-md-12 pull-right" style="padding:0px 5px; margin-bottom: 10px;"><a href="{!! '/backend/financial/details/'.$dados['codigo_transacao'].'/printer' !!}" target="_blank" style="cursor: pointer"><li class="btn btn-block btn-lg btn-warning" data- data-toggle="tooltip" title="{!! trataTraducoes('imprimir') !!}"><i class="fa fa-print"></i></li></a></div>
	</div>
</div>
@endif