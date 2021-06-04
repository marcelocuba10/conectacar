<?php
Route::prefix('veiculos')->group(function() {
	Route::prefix('/painel')->group(function(){
		Route::group(['middleware' => ['auth','LogGeralSistema','ValidaAcesso']], function () {
			Route::get('/', 'VeiculosController@index');
			Route::get('/show', 'VeiculosController@show');

			Route::prefix('cadastros')->group(function() {
				Route::resource('gerente', 'Cadastros\Gerente\Gerente_Controller');
				Route::resource('fornecedores', 'Cadastros\Fornecedores\Fornecedores_Controller');
				Route::resource('usuarios', 'Cadastros\Usuarios\Usuarios_Controller');
				Route::resource('clientes', 'Cadastros\Clientes\Clientes_Controller');
			});

			Route::prefix('veiculos')->group(function() {
				Route::resource('veiculos/{id}/checklist', 'Veiculos\Veiculos\Checklist\Veiculos_Checklist_Controller');
// rota para imprimir o contrato
				Route::get('veiculos/{id}/contrato/{hash_contrato}/print', 'Veiculos\Contrato\Veiculos_Contrato_Controller@verifica_contrato');

				Route::get('veiculos/{id}/contrato/verifica/{hash_contrato}', 'Veiculos\Contrato\Veiculos_Contrato_Controller@verifica_contrato');
				Route::post('veiculos/{id}/contrato/verifica/{hash_contrato}', 'Veiculos\Contrato\Veiculos_Contrato_Controller@verifica_contrato_confirma');
				Route::resource('veiculos/{id}/contrato', 'Veiculos\Contrato\Veiculos_Contrato_Controller');
				Route::resource('veiculos/{id}/lucro', 'Veiculos\Lucro\Veiculos_Lucro_Controller');

				Route::post('/veiculos/{id}/fotos/reordenar', 'Veiculos\Fotos\Veiculos_Fotos_Controller@reordenar');
				Route::resource('/veiculos/{id}/fotos', 'Veiculos\Fotos\Veiculos_Fotos_Controller');



				Route::GET('/veiculos/{veiculosID}/checklist/{checklistID}/view', 'Veiculos\Veiculos\Checklist\Veiculos_Checklist_Controller@mostraChecklist');
				Route::resource('veiculos', 'Veiculos\Veiculos\Veiculos_Controller');
				Route::resource('checklist', 'Veiculos\Checklist\Veiculos_Checklist_Controller');
				Route::resource('tipos', 'Veiculos\Tipos\Tipos_Controller');
				Route::resource('cambio', 'Veiculos\Cambio\Cambio_Controller');
				Route::resource('cor', 'Veiculos\Cor\Cor_Controller');
				Route::resource('carroceria', 'Veiculos\Carroceria\Carroceria_Controller');
				Route::resource('portas', 'Veiculos\Portas\Portas_Controller');
				Route::resource('motorizacao', 'Veiculos\Motorizacao\Motorizacao_Controller');
				Route::resource('combustivel', 'Veiculos\Combustivel\Combustivel_Controller');
				Route::resource('montadoras', 'Veiculos\Montadoras\Montadoras_Controller');
			});

			Route::prefix('financeiro')->group(function() {
				Route::get('contas_pagar/{id}/recibo', 'Financeiro\ContasPagar\ContasPagar_Controller@recibo');
				Route::get('contas_pagar/{id}/pagar', 'Financeiro\ContasPagar\ContasPagar_Controller@pagar');
				Route::post('contas_pagar/{id}/pagar', 'Financeiro\ContasPagar\ContasPagar_Controller@pagar_grava');
				Route::resource('contas_pagar', 'Financeiro\ContasPagar\ContasPagar_Controller');

				Route::get('contas_receber/{id}/recibo', 'Financeiro\ContasReceber\ContasReceber_Controller@recibo');
				Route::get('contas_receber/{id}/pagar', 'Financeiro\ContasReceber\ContasReceber_Controller@pagar');
				Route::post('contas_receber/{id}/pagar', 'Financeiro\ContasReceber\ContasReceber_Controller@pagar_grava');
				Route::resource('contas_receber', 'Financeiro\ContasReceber\ContasReceber_Controller');

				Route::resource('caixa', 'Financeiro\Caixa\Caixa_Controller');
				Route::resource('bancos', 'Financeiro\Bancos\Bancos_Controller');
				Route::resource('sangria', 'Financeiro\Sangria\Sangria_Controller');
				Route::resource('retiradas', 'Financeiro\Retiradas\Retiradas_Controller');

				Route::get('nota_promissoria/imprimir/{codigo_transacao}', 'Financeiro\NotaPromissoria\NotaPromissoria_Controller@imprimir');
				Route::resource('nota_promissoria', 'Financeiro\NotaPromissoria\NotaPromissoria_Controller');
			});

			Route::prefix('documentos')->group(function() {
				Route::get('recibos/{id}/imprimir', 'Documentos\Recibos\Recibos_Controller@imprimir');
				Route::resource('recibos', 'Documentos\Recibos\Recibos_Controller');
				Route::resource('contratos', 'Documentos\Contratos\Contratos_Controller');
				Route::resource('lucro_veiculo', 'Documentos\LucroVeiculo\LucroVeiculo_Controller');
			});

			Route::prefix('configuracoes')->group(function() {
// Route::resource('contrato_cabecalho', 'Configuracoes\ContratoCabecalho\Configuracoes_ContratoCabecalho_Controller');
// Route::resource('contrato_rodape', 'Configuracoes\ContratoRodape\Configuracoes_ContratoRodape_Controller');
				Route::resource('contrato_contrato', 'Configuracoes\Contrato\Configuracoes_Contrato_Controller');
				Route::resource('checklist', 'Configuracoes\Checklist\Checklist_Controller');
				Route::resource('configuracoes', 'Configuracoes\Configuracoes\Configuracoes_Controller');
				Route::resource('geral', 'Configuracoes\Geral\Geral_Controller');
				Route::resource('formas_pgto', 'Configuracoes\Pagamento\FormasPagamento_Controller');
			});

			Route::prefix('relatorios')->group(function() {
				Route::get('{qualBusca}', 'Relatorios\Relatorios_Controller@qualBusca');
// Route::get('veiculos', 'Relatorios\Relatorios_Controller@veiculos');
// Route::get('clientes', 'Relatorios\Relatorios_Controller@clientes');
// Route::get('fornecedores', 'Relatorios\Relatorios_Controller@fornecedores');
// Route::get('contas_pagar', 'Relatorios\Relatorios_Controller@contas_pagar');
// Route::get('contas_receber', 'Relatorios\Relatorios_Controller@contas_receber');
// Route::get('custos', 'Relatorios\Relatorios_Controller@custos');
// Route::get('recibo', 'Relatorios\Relatorios_Controller@recibo');
// Route::get('contratos', 'Relatorios\Relatorios_Controller@contratos');
			});

			Route::prefix('website')->group(function() {
				Route::resource('quem_somos', 'Website\QuemSomos\QuemSomos_Controller');
				Route::resource('servicos', 'Website\QuemSomos\QuemSomos_Controller');
			});
		});
});
});
