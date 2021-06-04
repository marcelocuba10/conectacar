<?php
namespace App\Repositories;

use App\Repositories\Componentes;
use App\Repositories\Tratamentos;
use Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\PinSolicitados;
use App\Models\Users;
/*
backend.1.emails.corpo_email		=	layout externo, para uso no site
backend.1.emails.novo_cadastro		=	layout para email
*/

class SendRepositorie{

	CONST formatacaoPinEmail = ' style="text-align: center !important; font-size: 50pt !important;"';

	static function index($qualFuncao, $data = ''){

		$hash = ( !empty($hash) ? $hash : Null );
		$data = ( !empty($data) ? $data : Null );
		$data = SendRepositorie::$qualFuncao($data);

		$envia = ( explode(':',site_id()['url'])[0] );

		if( $envia != 'localhost' ){
			try {
				Mail::send($data['layout'], ['data' => $data], function ($m) use ($data){
					$m->from(env('MAIL_USERNAME',''), site_id()['name']);
					$m->to(( !empty($data['email']) ? $data['email'] : $_SESSION['email'] ))->subject(trataTraducoes($data['assunto']));
				});
			} catch (Exception $e) {
    			// refatorar - criar um notificador de erros
			}
			return redirect(url('/check_register'));
		} else {
			return view($data['layout'],compact('data'));
		}
	}




	static function enviodeEmail($data){
		return [
			'envia' => 1,
			'layout' => ( !empty($data['layout']) ? $data['layout'] : 'temas.'.site_id()['template'].'.email.enviodeEmail' ),
			'logotipo' => ( !empty($data['logotipo']) ? $data['logotipo'] : '/clientes/1/logo_conectacar.png'),
			'conteudo' => ( !empty($data['conteudo']) ? $data['conteudo'] : Null ),
			'rodape' => site_id()['name'],
			'assunto' => ( !empty($data['assunto']) ? $data['assunto'] : trataTraducoes('Email recebido') ),
		];
	}




	static function cadastroConcluido($data){
		return [
			'envia' => 1,
			'layout' => 'temas.'.site_id()['template'].'.email.cadastroConcluido',
			'logotipo' => url('/'.site_id()['id'].'/logotipo_intgracao.png'),
			'conteudo' => 'Enviamos um e-mail de confirmação para o endereço <strong>'.$data['email'].'</strong>.<br><br>Para finalizarmos a abertura da sua conta, clique no link que você recebeu e confirme o seu cadastro.<br><br>Atenciosamente.<br>Equipe '.site_id()['name'],
			'rodape' => site_id()['name'],
			'assunto' => 'Confirmação de cadastro',
		];
	}




	static function emailClicado($hash){

		if( Auth()->check() ){
			Auth::logout();
		}

		$qualUser = UsersFrontEnd::where('hash', $hash)->where('email_validado', 0)->first();
		$qualUser = ( !empty($qualUser) ? $qualUser['id'] : 0 );

		if( $qualUser != 0 ){

			$consultaOrigem = PinSolicitados::where('users_id', $qualUser)->where('modulo', site_id()['modulo'])->orderby('id', 'desc')->first();
			if( empty($consultaOrigem) ){
				$consultaOrigem = PinSolicitados::create([
					'emp_id' => site_id()['id'],
					'users_id' => $qualUser,
					'modulo' => site_id()['modulo'],
					'nivel' => 'cli',
				]);
			}

			UsersFrontEnd::find($qualUser)->update(['email_validado' => 1]);
			Auth::loginUsingId($qualUser);

			return [
				'envia' => 0,
				'layout' => 'temas.'.site_id()['template'].'.email.emailClicado',
				'logotipo' => url('/'.site_id()['id'].'/logotipo_intgracao.png'),
				'conteudo' => '<p style="text-align: center">Seu cadastro foi ativado com sucesso.<br><br><a href="/backend/home'.'">Clique aqui</a> para acessar a plataforma',
				'rodape' => site_id()['name'],
				'assunto' => 'Ativação de cadastro',
			];
		}

		return [
			'envia' => 0,
			'layout' => 'temas.'.site_id()['template'].'.email.emailClicado',
			'logotipo' => url('/'.site_id()['id'].'/logotipo_intgracao.png'),
			'conteudo' => '<p style="text-align: center">Seu cadastro já foi ativado!<br><br><a href="/login">Clique aqui</a> para efetuar login e acessar a plataforma.',
			'rodape' => site_id()['name'],
			'assunto' => 'Email já validado',
		];


	}




	static function acessoSemValidarConta($hash = ''){

		$hash = ( !empty($hash) ? $hash : Null );

		$qualUser = UsersFrontEnd::where('remember_token', $hash)->get();
		$qualUser = ( count($qualUser) != 1 ? 0 : $qualUser[0]['id'] );

		return [
			'envia' => 0,
			'layout' => 'temas.'.site_id()['template'].'.email.acessoSemValidarConta',
			'logotipo' => url('/'.site_id()['id'].'/logotipo_intgracao.png'),
			'conteudo' => 'Sua conta ainda não foi validada em nossa plataforma.<br><br>Pedimos que verifique sua caixa de email (verifique também sua caixa de spam) e clique no link enviado para a ativação de sua conta.<br><br><a href="'.url('/').'">Voltar</a>',
			'rodape' => site_id()['name'],
			'assunto' => 'Conta não validada',
		];
	}




	static function envio_pin_primeiro_cadastro($data=''){

		// if( !empty(Auth()->user()->id) ){
		// 	$idUsuarioSolicitante = Auth()->user()->id;
		// } else {
		// 	$retorno = Model('Gerenciamento','Users')::where('email', $_SESSION['email'])->first();
		// 	$idUsuarioSolicitante = $retorno['id'];
		// }

		// $consultaPIN = Model('Gerenciamento','PinSolicitados')::where('users_id',$idUsuarioSolicitante)->orderby('id')->first();
		// if( !empty($consultaPIN) ){
		// 	$numeroPIN = $consultaPIN['pin'];
		// } else {
		// 	$numeroPIN = ( !empty($_SESSION['financeiro']['pin']) ? $_SESSION['financeiro']['pin'] : Componentes::geraChavePin($idUsuarioSolicitante) );
		// }

		// $retorno = Model('Gerenciamento','PinSolicitados')::create([
		// 	'users_id' => $idUsuarioSolicitante,
		// 	'tabela' => 'financeiro',
		// 	'pin' => $numeroPIN,
		// 	'validade' => date('Y-m-d h:m:s', strtotime('+1 days')),
		// 	'url_origem' => urlCompleta(),
		// ]);

		return [
			'envia' => ( !is_null($data['envia']) ? $data['envia'] : 1 ),
			// 'layout' => ( !empty($data['layout']) ? $data['layout'] : 'temas.'.site_id()['template'].'.email.enviodePINparaemail' ),
			'layout' => ( !empty($data['layout']) ? $data['layout'] : 'temas.'.site_id()['template'].'.email.boas_vindas' ),
			'assunto' => trataTraducoes('Cadastro realizado com sucesso'),
			'titulo_corpo_email' => trataTraducoes('Seu cadastro foi efetivado com sucesso'),
			'subtitulo_corpo_email' => trataTraducoes('Leia atentamente os campos abaixo'),
			'corpo_email' => trataTraducoes('Email de saudação aqui'),
			'rodape_email' => copyright(),
		];
	}




	static function boas_vindas_primeiro_cadastro($data=''){

		if( !empty(Auth()->user()->id) ){
			$idUsuarioSolicitante = Auth()->user()->id;
		} else {
			$retorno = Users::where('email', $_SESSION['email'])->first();
			$idUsuarioSolicitante = $retorno['id'];
		}

		$consultaPIN = PinSolicitados::where('users_id',$idUsuarioSolicitante)->orderby('id')->first();
		if( !empty($consultaPIN) ){
			$numeroPIN = $consultaPIN['pin'];
		} else {
			$numeroPIN = ( !empty($_SESSION['financeiro']['pin']) ? $_SESSION['financeiro']['pin'] : Componentes::geraChavePin($idUsuarioSolicitante) );
		}

		$retorno = PinSolicitados::create([
			'users_id' => $idUsuarioSolicitante,
			'tabela' => 'financeiro',
			'pin' => $numeroPIN,
			'validade' => date('Y-m-d h:m:s', strtotime('+1 days')),
			'url_origem' => urlCompleta(),
		]);

		return [
			'envia' => ( !is_null($data['envia']) ? $data['envia'] : 1 ),
			'layout' => ( !empty($data['layout']) ? $data['layout'] : 'temas.'.site_id()['template'].'.email.enviodePINparaemail' ),
			'assunto' => trataTraducoes('Bem vindo'),
			'titulo_corpo_email' => trataTraducoes('Bem vindo'),
			'subtitulo_corpo_email' => trataTraducoes('Cadastro concluído'),
			'corpo_email' => trataTraducoes('texto_de_saudacao'),
			'rodape_email' => copyright(),
		];
	}




	static function esqueciMinhaSenha($data){

		$_SESSION['email'] = $data['email'];
		
		$consulta = Model('Gerenciamento','UsersSemRelacionamentos')::where('email', $data['email'])->first();

		return [
			'envia' => 1,
			'layout' => 'temas.'.site_id()['template'].'.email.esqueciMinhaSenha',
			'logotipo' => url(site_id()['logotipo']),
			'conteudo' => 'Olá '.explode(' ' ,$consulta['name'])[0].'.<br><br>Recebemos uma solicitação para redefinir sua senha do '.site_id()['name'].'.',
			'rodape' => site_id()['name'],
			'assunto' => 'Recuperação de senha',
			'titulo_corpo_email' => trataTraducoes('Pedido de recuperação de senha.'),
			'subtitulo_corpo_email' => trataTraducoes('Leia atentamente o email abaixo.'),
			'corpo_email' => camposPadraoEmail(['campo' => 'corpo_esqueci_minha_senha','email' => $_SESSION['email']]),
			'rodape_email' => copyright(),
		];
	}
};