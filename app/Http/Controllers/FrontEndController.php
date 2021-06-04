<?php
namespace App\Http\Controllers;

use App\Http\Controllers\ControllerFrontEnd;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class FrontEndController extends ControllerFrontEnd
{
	use DispatchesJobs, ValidatesRequests;

	public function index(){
		//geraEstatisticasSite();

		if( !empty($_GET['idioma']) ){
			$consulta = Model('Gerenciamento','Idiomas')::where('sigla',strtolower($_GET['idioma']))->count();
			if( $consulta === 1 ){
				$_SESSION['idioma'] = strtolower($_GET['idioma']);
				return back();
			}
		}

		$siteId = site_id();
		$data = montaWebsite();

		if( empty($data) ){
			$data = Model('Gerenciamento','UsersSemRelacionamentos')::where('nivel','emp')->where('nome_fantasia', '<>', Null)->with('quaisDados')->get();
			return view('veiculos::temas.0.index',compact('data','siteId'));
			return view('welcome',compact('data'));
		}

		$localizacao = $data['settings']['location'];

		return view(strtolower($siteId['modulo']).'::temas.'.$siteId['tema'].'.index', compact('siteId','data'));
	}

	public function internas(Request $request){
		//geraEstatisticasSite();

		$urlAtual = str_replace('/','',"$_SERVER[REQUEST_URI]");

		if( str_contains($urlAtual,'?') ){
			$urlAtual = explode('?',$urlAtual)[0];
		}

		$siteId = site_id();
		if( $siteId['id'] === 1 ){
			$siteId['modulo'] = 'veiculos';
		}

		switch ($urlAtual) {
			case 'about':
			case 'cars':
			case 'services':
			case 'stores':
			case 'demo':
			case 'sell_your_vehicle':
			case 'contact':
			$busca = $request->all();

			switch ($urlAtual) {
				case 'stores':
				$data = Model('Gerenciamento','UsersLivre')::where('nivel','emp')->get();
				break;

				default:
				$data = montaWebsite($urlAtual);
				break;
			}
			return view(strtolower($siteId['modulo']).'::temas.'.$siteId['tema'].'.'.$urlAtual, compact('siteId','data','busca'));
			break;
			
			default:
			return redirect('/');
			break;
		}

	}

	public function detalhes_veiculo($hash_id_veiculo=''){
		if( empty($hash_id_veiculo) ){
			return redirect('/');
		}

		//geraEstatisticasSite();

		$siteId = site_id();
		$carroSelecionado = Model('Veiculos','VeiculosParaSite')::where('hash_id',$hash_id_veiculo)->first();
		$data = montaWebsite('cars');

		if( empty($carroSelecionado) ){
			return redirect('/cars');
		}

		if( $siteId['id'] === 1 ){
			$siteId['modulo'] = 'veiculos';
		}

		return view(strtolower($siteId['modulo']).'::temas.'.$siteId['tema'].'.detalhes_veiculo', compact('siteId','carroSelecionado','data'));
	}

	public function contact_envia(Request $request){
		$data = $request->all();
		$data['layout'] = 'veiculos::email_site';
		$data['logotipo'] = site_id()['quaisDados']['logotipo'];

		Model('Veiculos','Mensagens')::create([
			'emp_id' => site_id()['emp_id'],
			'nome' => ( !empty($data['nome']) ? $data['nome'] : Null ),
			'email' => ( !empty($data['email']) ? $data['email'] : Null ),
			'telefone' => ( !empty($data['telefone']) ? $data['telefone'] : Null ),
			'mensagem' => ( !empty($data['texto']) ? $data['texto'] : Null ),
			'original' => json_encode($data),
		]);

		try {
			if( StatusDoSistema() != 0 ){
				Mail::send($data['layout'], compact('data'), function ($m) use ($data){
					$m->from(site_id()['email'], site_id()['name']);
					$m->replyTo(site_id()['email'], site_id()['name']);
					$m->to(site_id()['email'])->subject(trataTraducoes(trataTraducoes('Email vindo pelo site ' . site_id()['name'])));
				});
			}
		} catch (Exception $e) {
			return back()->with('mensagem',trataTraducoes('Servidor temporariamente indisponível!'));
		}

		return back()->with('mensagem',trataTraducoes('Mensagem enviada com sucesso!'));
	}

	public function envia_veiculo(Request $request){
		$hash_veiculo = str_replace('/cars/details/','',urlCompleta());

		$qualVeiculo = Model('Veiculos','Veiculos')::where('hash_id',$hash_veiculo)->first();

		if( empty($qualVeiculo) ){
			return redirect('/')->with('mensagem',trataTraducoes('Veículo não localizado!'));
		}

		$data = $request->all();
		$data['layout'] = 'veiculos::propostas_veiculos';
		$data['logotipo'] = site_id()['logotipo'];
		$data['veiculo'] = $qualVeiculo;

		Model('Veiculos','Mensagens')::create([
			'emp_id' => site_id()['emp_id'],
			'veiculo_id' => $qualVeiculo['id'],
			'nome' => ( !empty($data['nome']) ? $data['nome'] : Null ),
			'email' => ( !empty($data['email']) ? $data['email'] : Null ),
			'telefone' => ( !empty($data['telefone']) ? $data['telefone'] : Null ),
			'mensagem' => ( !empty($data['texto']) ? $data['texto'] : Null ),
			'original' => json_encode($data),
		]);

		try {
			if( StatusDoSistema() != 0 ){
				Mail::send($data['layout'], compact('data'), function ($m) use ($data){
					$m->from(site_id()['email'], site_id()['name']);
					$m->replyTo(site_id()['email'], site_id()['name']);
					$m->to(site_id()['email'])->subject(trataTraducoes(trataTraducoes('Email vindo pelo site ' . site_id()['name'])));
				});
			}
		} catch (Exception $e) {
			return back()->with('mensagem',trataTraducoes('Servidor temporariamente indisponível!'));
		}

		return back()->with('mensagem',trataTraducoes('Mensagem enviada com sucesso!'));
	}
}