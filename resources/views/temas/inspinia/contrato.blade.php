<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<h4 style="float: right;">@include('cabecalho')</h4>
				<div class="ibox-title">
					<h5>{!! montaBreadcrumb('Início|Veículos|Contrato') !!}</h5>
					<div class="ibox-tools" style="padding-right: 20px;">
						{!! ( !empty($dados['dados']['botoes_da_datatable']) ? $dados['dados']['botoes_da_datatable'] : Null ) !!}
					</div>
				</div>
				<div class="ibox-content">
					<div class="table-responsive">
						<table class="table table-hover" cellpadding="0" cellspacing="0" border="0">
							<tr>
								<td style="width: 25%">{!! trataTraducoes('Tipo') !!}<br>{!! $dados['data']['qualTipo']['nome'] !!}</td>
								<td style="width: 25%">{!! trataTraducoes('Nome') !!}<br>{!! $dados['data']['nome'] !!}</td>
								<td style="width: 25%">{!! trataTraducoes('Ano de fabricação') !!}<br>{!! $dados['data']['ano_fabricacao'] !!}</td>
								<td style="width: 25%">{!! trataTraducoes('Ano do veículo') !!}<br>{!! $dados['data']['ano_veiculo'] !!}</td>
							</tr>
							<tr>
								<td>{!! trataTraducoes('Câmbio') !!}<br>{!! $dados['data']['qualCambio']['nome'] !!}</td>
								<td>{!! trataTraducoes('KM') !!}<br>{!! $dados['data']['km'] !!}</td>
								<td>{!! trataTraducoes('Placa') !!}<br>{!! $dados['data']['placa'] !!}</td>
								<td>{!! trataTraducoes('Cor') !!}<br>{!! $dados['data']['qualCor']['nome'] !!}</td>
							</tr>
							<tr>
								<td>{!! trataTraducoes('Carroceria') !!}<br>{!! $dados['data']['qualCarroceria']['nome'] !!}</td>
								<td>{!! trataTraducoes('Portas') !!}<br>{!! $dados['data']['qualPortas']['nome'] !!}</td>
								<td>{!! trataTraducoes('Motorização') !!}<br>{!! $dados['data']['qualMotorizacao']['nome'] !!}</td>
								<td>{!! trataTraducoes('Combustível') !!}<br>{!! $dados['data']['qualCombustivel']['nome'] !!}</td>
							</tr>
							<tr>
								<td>{!! trataTraducoes('Chassi') !!}<br>{!! $dados['data']['chassi'] !!}</td>
								<td>{!! trataTraducoes('Renavam') !!}<br>{!! $dados['data']['renavam'] !!}</td>
								<td>{!! trataTraducoes('Montadora') !!}<br>{!! $dados['data']['qualMontadora']['nome'] !!}</td>
								<td>{!! trataTraducoes('Modelo') !!}<br>{!! $dados['data']['modelo'] !!}</td>
							</tr>
							<tr>
								<td>{!! trataTraducoes('Versão') !!}<br>{!! $dados['data']['versao'] !!}</td>
								<td colspan="3">{!! trataTraducoes('Observações') !!}<br>{!! $dados['data']['observacoes'] !!}</td>
							</tr>
						</table>
					</div>

						<div class="row">
							@forelse( $dados['contrato'] as $key => $contrato )
							<div class="col-lg-4" style="line-height: 1; background-color: {!! ( $key % 2 == 0 ? '#dedede' : '#ffffff' ) !!}">
								<div class="row" style="padding: 5px;">
									<div class="col-lg-12 text-left">
										{!! $contrato['camposAdicionais']['titulo'] !!}
									</div>
									<div class="col-lg-12 text-right">
										<strong>{!! trataTraducoes($contrato['valor']) !!}</strong>
									</div>
								</div>
							</div>
							@empty
							@endforelse
						</div>

				</div>
			</div>
		</div>
	</div>
</div>