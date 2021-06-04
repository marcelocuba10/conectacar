<?php
Route::prefix('gerenciamento')->group(function() {
	Route::prefix('/painel')->group(function() {
		Route::group(['middleware' => ['auth','LogGeralSistema']], function () {
			Route::get('/', 'GerenciamentoController@index');
			Route::prefix('cadastros')->group(function() {
				Route::resource('administradores', 'Cadastros\Administradores\Administradores_Controller');
				Route::resource('empresas', 'Cadastros\Empresas\Empresas_Controller');
			});

			Route::prefix('financeiro')->group(function() {
				Route::resource('contas_pagar', 'Financeiro\Pagar\ContasPagar_Controller');
				Route::resource('contas_receber', 'Financeiro\Receber\ContasReceber_Controller');
				Route::resource('bancos', 'Financeiro\Bancos\Bancos_Controller');
			});

			Route::prefix('configuracoes')->group(function() {
				Route::resource('temas', 'Configuracoes\Temas\Temas_Controller');
				Route::resource('idiomas', 'Configuracoes\Idiomas\Idiomas_Controller');
				Route::resource('moedas', 'Configuracoes\Moedas\Moedas_Controller');
				Route::resource('forma_pagamento', 'Configuracoes\Pagamento\FormasPagamento_Controller');
				Route::post('forma_pagamento/{id}/ativa_desativa', 'Configuracoes\Pagamento\FormasPagamento_Controller@ativa_desativa');
				Route::resource('vencimentos', 'Configuracoes\Vencimentos\Vencimentos_Controller');
				Route::resource('geral', 'Configuracoes\Geral\Geral_Controller');
			});
		});
	});
});