<?php
Route::get('/cameraQRcode', function(){
	return view('cameraQRcode');
});

Route::get('/geraqrcode', function(){

	/*
		geraqrcode/
		?destino=http://www.google.com.br/
		&tipo=url

		tipos disponíveis
			text
			url
	*/

			$tipo = ( !empty($_GET['tipo']) ? $_GET['tipo'] : 'text' );
			switch ($tipo) {
				case 'url':
				return QRCode::url($_GET['destino'])->svg();
				break;

				default:
				return QRCode::text($_GET['destino'])->svg();
				break;
			}
		});

Route::get('/reset_pin/{hash}', 'WebsiteController@reset_pin');
Route::post('/reset_pin', 'WebsiteController@reset_pin_processa');



Route::get('website', function(){
	return redirect('https://conectaerp.com.py/');
})->name('website');
// Route::get('website', 'WebsiteController@index')->name('website');

Route::group(['middleware' => ['auth','auth.unique.user']], function () {
	Route::get('ilegal_action', function(){ return view('temas.inspinia.acoes_ilegais'); });
	Route::get('register_success', 'WebsiteController@register_success');
	Route::get('receipt/{hash}', 'WebsiteController@comprovante');
	Route::get('/illegal_action', 'WebsiteController@illegal_action');
	Route::get('global', 'GlobalController@index');
});	


// Route::group(['middleware' => ['auth','auth.unique.user']], function () {
// 	Route::get('/', 'WebsiteController@home');
// });	

Route::get('painel', function(){ return redirect('login'); });
Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('forgot_password', 'WebsiteController@forgot_password');
Route::post('forgot_password', 'WebsiteController@forgot_password_send');
Route::get('forgot_password/{hash}', 'WebsiteController@forgot_password_hash');
Route::post('forgot_password/{hash}', 'WebsiteController@forgot_password_hash_grava');
Route::get('/painel/sair', 'WebsiteController@sair');

Route::get('terms_and_conditions', 'WebsiteController@terms_and_conditions');
Route::get('register', 'WebsiteController@register');
Route::get('register/{hash}', 'WebsiteController@register');
Route::post('register', 'WebsiteController@register_grava');
Route::get('resend_mail', 'WebsiteController@resend_mail');
Route::get('check_register', 'WebsiteController@check_register');
Route::post('check_register', 'WebsiteController@check_register_grava');






// rotas para o site de veículos
Route::get('/', function(){return redirect('/login');});
Route::get('/', 'FrontEndController@index');
Route::get('/{internas}', 'FrontEndController@internas');
Route::get('/cars/details/{hash_id_veiculo}', 'FrontEndController@detalhes_veiculo');
Route::get('/cars/details', 'FrontEndController@detalhes_veiculo');
Route::post('/contact', 'FrontEndController@contact_envia');
Route::post('/cars/details/{hash_id_veiculo}', 'FrontEndController@envia_veiculo');