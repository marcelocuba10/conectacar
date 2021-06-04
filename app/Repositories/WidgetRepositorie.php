<?php
namespace App\Repositories;

use App\Models\Carteiras;
use App\Models\Dashboard;
use App\Models\FinanceiroSaldo;
use App\Models\UserSemRelacionamentos;
use App\Models\Projetos;
use App\Models\Financeiro;
use App\Models\EmpresasClientes;

use App\Repositories\CamposdoSistema\backend\financial\Extracts_CamposdoSistema;
use App\Repositories\Componentes;
use App\Repositories\Valorizador;
use App\Repositories\CamposdoSistema\backend\faq\FaqGroups_CamposdoSistema;
use App\Repositories\CamposdoSistema\backend\registrations\Affiliates_CamposdoSistema;

use App\Repositories\WidgetRepositorieClienteAuropays;
use App\Repositories\WidgetRepositorieClienteTradoniex;

//	para site de categorias
class WidgetRepositorie{

	static function WidgetRepositorie(){
		$data = Dashboard::widget();
		$widgets = [];
		foreach ($data as $key => $value) {
			$widgets[] = WidgetRepositorie::listaWidgets($value['filhos']);
		}

		return $widgets;
	}




	static function listaWidgets($data){
		// se baseia no ID da tabela widget do banco de dados
		switch ($data['id']) {
			case 1:
				// meucodigodeafiliado;
			$data = [
				'tamanho' => 12,
				'bgcor' => 'primary',
			];

			return view('backend.1.widget.5', ['data' => $data]);
			break;

			case 2:
				// saldodisponivel

			$disp = FinanceiroSaldo::where('users_id', Auth()->user()->id)->sum('saldo_disp');
			$disp_rel = moeda_info()['codigo'].' '.number_format(converte_moeda(moeda_oficial()['sigla'], moeda_info()['codigo'], $disp),2,',','.');

			
			$data = [
				'tamanho' => 4,
				'bgcor' => 'success',
				'valor' => moeda_oficial()['sigla'].' '.number_format(currencyToSystemDefaultBD($disp),8,'.',','),
				'titulo' => trataTraducoes('Saldo indisponível'),
				'icone' => 'fa fa-money',
				'botao' => trataTraducoes('Atualizar'),
				'iconeBotao' => 'fa fa-refresh',
				'target' => '_top',
				'url' => '/backend/home',
			];

			return view('backend.1.widget.1', ['data' => $data]);
			break;

			case 3:
				// saldobloqueado

			$bloq = FinanceiroSaldo::where('users_id', Auth()->user()->id)->sum('saldo_bloq');
			$bloq_rel = moeda_info()['codigo'].' '.number_format(converte_moeda(moeda_oficial()['sigla'], moeda_info()['codigo'], $bloq),2,',','.');


			$data = [
				'tamanho' => 4,
				'bgcor' => 'danger',
				'valor' => moeda_oficial()['sigla'].' '.number_format(currencyToSystemDefaultBD($bloq),8,'.',','),
				'titulo' => trataTraducoes('Saldo bloqueado'),
				'icone' => 'fa fa-bank',
				'botao' => trataTraducoes('Atualizar'),
				'iconeBotao' => 'fa fa-refresh',
				'target' => '_top',
				'url' => '/backend/home',
			];

			return view('backend.1.widget.1', ['data' => $data]);
			break;

			case 3:
				// extrato
			$data = [
				'tamanho' => 4,
				'bgcor' => 'primary',
				'valor' => Extracts_CamposdoSistema::Extracts_CamposdoSistema()['data'],
				'titulo' => trataTraducoes('Saldo bloqueado'),
				'icone' => 'fa fa-bank',
				'botao' => trataTraducoes('Atualizar'),
				'iconeBotao' => 'fa fa-refresh',
				'url' => '/backend/financial/extracts',
			];

			return view('backend.1.widget.4', ['data' => $data]);
			break;

			case 5:
				// carteiras
			$data = [
				'tamanho' => 4,
				'bgcor' => 'primary',
				'valor' => Carteiras::where('users_id', Auth()->user()->id)->count(),
				'titulo' => trataTraducoes('Carteiras'),
				'icone' => 'fa fa-archive',
				'botao' => trataTraducoes('Listar'),
				'iconeBotao' => 'fa fa-list',
				'url' => '/backend/management/wallet',
			];

			return view('backend.1.widget.1', ['data' => $data]);
			break;

			case 6:
				// investimentos
			$data = [
				'tamanho' => 4,
				'bgcor' => 'success',
				'valor' => 0,
				'titulo' => trataTraducoes('Investimentos'),
				'icone' => 'fa fa-line-chart',
				'botao' => trataTraducoes('Atualizar'),
				'iconeBotao' => 'fa fa-refresh',
				'url' => '/backend/home',
				'target' => '_top',
			];

			return view('backend.1.widget.1', ['data' => $data]);
			break;

			case 7:
				// afiliados
			$data = [
				'tamanho' => 4,
				'bgcor' => 'info',
				'valor' =>count(UserSemRelacionamentos::with('beneficiarios')->find(Auth()->user()->id)['beneficiarios']),
				'titulo' => trataTraducoes('Afiliados'),
				'icone' => 'fa fa-users',
				'botao' => trataTraducoes('Listar'),
				'iconeBotao' => 'fa fa-list',
				'url' => '/backend/registrations/affiliates',
			];

			return view('backend.1.widget.1', ['data' => $data]);
			break;

			case 8:
				// beneficiarios
			$data = [
				'tamanho' => 4,
				'bgcor' => 'info',
				'valor' =>count(UserSemRelacionamentos::with('beneficiarios')->find(Auth()->user()->id)['beneficiarios']),
				'titulo' => trataTraducoes('Beneficiários'),
				'icone' => 'fa fa-users',
				'botao' => trataTraducoes('Listar'),
				'iconeBotao' => 'fa fa-list',
				'url' => '/backend/registrations/beneficiaries',
			];

			return view('backend.1.widget.1', ['data' => $data]);
			break;

			case 9:
				// faq
				// return [];
			break;

			case 10:
				// depositos
			$data = [
				'tamanho' => 4,
				'bgcor' => 'info',
				'valor' => Financeiro::where('users_id_destino', Auth()->user()->id)->where('tipo', 'deposits')->count(),
				'titulo' => trataTraducoes('Depósitos'),
				'icone' => 'fa fa-cc',
				'botao' => trataTraducoes('Listar'),
				'iconeBotao' => 'fa fa-list',
				'url' => '/backend/financial/deposits',
			];

			return view('backend.1.widget.1', ['data' => $data]);
			break;

			case 11:
				// transferencias
			$data = [
				'tamanho' => 4,
				'bgcor' => 'info',
				'valor' => Financeiro::where('users_id_destino', Auth()->user()->id)->where('tipo', 'transfer')->count(),
				'titulo' => trataTraducoes('Transferências'),
				'icone' => 'fa fa-cc',
				'botao' => trataTraducoes('Listar'),
				'iconeBotao' => 'fa fa-list',
				'url' => '/backend/financial/transfer',
			];

			return view('backend.1.widget.1', ['data' => $data]);
			break;

			case 12:
			$data = [
				'tamanho' => 4,
				'bgcor' => 'info',
				'valor' => Financeiro::where('users_id_destino', Auth()->user()->id)->where('tipo', 'withdrawals')->count(),
				'titulo' => trataTraducoes('Saques'),
				'icone' => 'fa fa-cc',
				'botao' => trataTraducoes('Listar'),
				'iconeBotao' => 'fa fa-list',
				'url' => '/backend/financial/withdrawalslist',
			];

			return view('backend.1.widget.1', ['data' => $data]);
			break;

			case 13:
				// acoes
				// return [];
			break;

			case 14:
				// projetos
			$data = [
				'tamanho' => 12,
				'bgcor' => 'info',
				'valor' =>0,
				'titulo' => trataTraducoes('Projetos'),
				'icone' => 'fa fa-cubes',
				'botao' => trataTraducoes('Listar todos os projetos'),
				'iconeBotao' => 'fa fa-list',
				'url' => '/backend/projects/projects',
				'limite' => 8,
				'tabela_relacional' => Projetos::select(['id as value','nome as label_2','imagem as label_1'])->where('disponivel', 1)->get()->random(8),
				'contador' => 0,
			];

			return view('backend.1.widget.3', ['data' => $data]);
			break;

			case 15:
				// livrodeofertas
				// return [];
			break;

			case 16:
				// mensagemrapida
			$formulario = Affiliates_CamposdoSistema::Affiliates_CamposdoSistema()['formulario'];

			$dados = [
				'tamanho' => 12,
				'bgcor' => 'info',
				'titulo' => trataTraducoes('Convite para novo afiliado'),
				'icone' => 'fa fa-envelope',
				'url' => '/backend/home',
				'habilita_formulario' => True,
				'rota_geral' => '/backend/convites/novo_afiliado',
			];

			$dados = [
				'formulario' => $formulario,
				'dados' => $dados,
			];

			return view('backend.1.widget.6', ['dados' => $dados]);
			break;

			case 17:
				// valorizador
				// $formulario = Financeiro::whereBetween('created_at', [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->sum('valorizador');

			$valorInicial = currencyToSystemDefaultBD(1);
			$totalMoedas = currencyToSystemDefaultBD(FinanceiroSaldo::sum('saldo_disp'));

			$valormovimentado = currencyToSystemDefaultBD(Financeiro::sum('total'));
			$valordoBalde = currencyToSystemDefaultBD($valormovimentado * 0.0025);

			if( (int)$valordoBalde > 0 && (int)$totalMoedas > 0 ){
				$valorizacao = currencyToSystemDefaultBD($valordoBalde / $totalMoedas);
				$valorizacao = currencyToSystemDefaultBD($valorizacao + $valorInicial);
			} else {
				$valorizacao = currencyToSystemDefaultBD(0);
			}

			$data = [
				'tamanho' => 4,
				'bgcor' => 'success',
					// 'valor' => moeda_oficial()['sigla'].'BRL: '.number_format(currencyToSystemDefaultBD($formulario),8,'.',','),
				'valor' => 'BRL ' . $valorizacao,
				'titulo' => trataTraducoes('Cotação NCC'),
				'icone' => 'fa fa-pie-chart',
				'botao' => trataTraducoes('Atualizar'),
				'iconeBotao' => 'fa fa-refresh',
				'target' => '_top',
				'url' => '/backend/home',
			];

			return view('backend.1.widget.1', ['data' => $data]);
			break;

			default:
				// vazio
				// return [];
			break;
		}
	}
};