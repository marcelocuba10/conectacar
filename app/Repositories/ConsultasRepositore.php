<?php
namespace App\Repositories;
use App\Repositories\Tratamentos;
/*
	armazena todas as consultas que serão executadas
	'tabela_relacional'=>[
		'model'=>'Textos',
		'select'=>['texto as value', 'titulo as label_1'],
		'where'=>['campo'=>'condicao'],
		'order' => [array de where],
	],
*/
class ConsultasRepositore{
	static function ConsultasRepositore($data){
		/*
			$data = [
				'model' => nomedamodel,
				'select' => [array de select],
				'where' => [array de where],
				'order' => [array de where],
			]
		*/
		if( !empty($data['model']) ){
				$qualModel = $data['model'];
				$conexao = 'App\Models\\' . $qualModel;
				$objeto = new $conexao();
				$order = ( !empty($data['order']) ? $data['order'] : 'id' );
				if( !empty($data['where']) ){
					$retorno = $objeto::select($data['select'])->where($data['where'])->orderby($order)->get();
				} else {
					$retorno = $objeto::select($data['select'])->orderby($order)->get();
				}
		} else {
			if( is_array($data) ){
				$tipo = $data['tabela'];
			} else {
				$tipo = ( !empty($data['tipo']) ? $data['tipo'] : $data );
			}

			switch ($tipo) {
				// aqui deve se passar a condição da tabela textos, definido no campo local_uso
				case 'Consulta_Tabela_Textos':
					$retorno = Model('Gerenciamento','Textos')::where('local_uso',$data['local_uso'])->orderby('label_1')->get();
					foreach( $retorno as $data ){
						$data['value'] = $data['texto'];
						$data['label_1'] = $data['titulo'];
						if( !empty($data['imagem'])  ){
							$data['label_2'] = $data['imagem'];
						}
						if( !empty($data['link'])  ){
							$data['label_3'] = $data['link'];
						}
					}
					break;

				case 'Consulta_Usuarios':
					$retorno = Model('Gerenciamento','UsersSemRelacionamentos')::
								where('emp_id', Auth()->user()->emp_id)->
								orderby('name')->
								select(['id as value', 'name as label_1', 'email as label_2'])->
								get();
					break;

				case 'Consulta_Cadastros':
					$retorno = Model('Veiculos','Cadastros')::orderby('nome')->select(['id as value', 'nome as label_1', 'email as label_2'])->get();
					break;

				case 'Consulta_Fornecedores':
					$retorno = Model('Veiculos','Cadastros')::where('tipo','for')->orderby('nome')->select(['id as value', 'nome as label_1', 'email as label_2'])->get();
					break;

				case 'Consultas_Veiculos':
					$retorno = Model('Veiculos','Veiculos')::orderby('ano_fabricacao')->select(['id as value', 'nome as label_1', 'placa as label_2'])->get();
					break;

				case 'Consultas_Veiculos_Ativos':
					$retorno = Model('Veiculos','Veiculos')::where('ativo',1)->orderby('ano_fabricacao')->select(['id as value', 'nome as label_1', 'placa as label_2'])->get();
					break;

				case 'Consulta_formas_de_pagamento':
					$retorno = Model('Veiculos','FormasPagamento')::where('ativo',1)->orderby('nome')->select(['id as value', 'nome as label_1'])->get();
					break;

				case 'Consultas_Veiculos_Variacoes':
					$consulta = Model('Veiculos','VeiculosVariacoes')::where('tipo',$data['variacao'])->orderby('nome')->get();

					$retorno = [];
					foreach( $consulta as $data ){
						$retorno[] = [
							'value' => $data['id'],
							'label_1' => $data['nome'],
						];
					}
					break;

				case 'Consulta_idioma_disponivel':
					$retorno = Model('Gerenciamento','Idiomas')::select('sigla as value','sigla as label_1','nome as label_1')->get();
					break;

				case 'Consultas_Veiculos_Veiculos_Ano':
					$retorno = [];

					$datai = (date('Y')+1);
					$dataf = 1900;

					while( $datai > $dataf ){
						$retorno[] = [
							'value' => $datai,
							'label_1' => $datai,
						];
					$datai--;
					}
					break;

				case 'Consulta_Paises':
					// $retorno = Model('Gerenciamento','Paises')::select('id as value', 'nome as label_1')->orderby('nome')->get();
					$retorno = [];
					break;

				case 'Consulta_Tipos_Moedas':
						$retorno = [
							[
								'value' => 'e',
								'label_1' => trataTraducoes('Externo'),
							],
							[
								'value' => 'i',
								'label_1' => trataTraducoes('Interno'),
							],
						];
					break;

				case 'Consulta_Sexo':
					$retorno = Model('Gerenciamento','Textos')::select(['texto as value', 'titulo as label_1'])->where('local_uso','sexo')->orderby('titulo')->get();
					break;

				case 'Consulta_Temas':
					$retorno = Model('Gerenciamento','Temas')::where('modulos', strtolower(Auth()->user()->modulo))->where('id','>',1)->select(['id as value','nome as label_1','imagem as imagem'])->orderby('nome')->get();
					break;

				case 'Consulta_Templates':
					$retorno = Model('Gerenciamento','Templates')::select(['id as value', 'nome as label_1'])->orderby('nome')->get();
					break;

				case 'Consulta_Sim_Nao_1_0':
					$retorno = Model('Gerenciamento','Textos')::select(['texto as value', 'titulo as label_1'])->where('local_uso','sim_nao_1_0')->orderby('titulo')->get();
					break;

				case 'Consulta_Modulo_disponivel':
					// $retorno = Model('Modulos')::select(['sigla as value','nome as label_1'])->orderby('label_1')->get();
					$retorno = [];
					break;
				
				case 'Consulta_Moedas_Plataforma':
					$retorno = Model('Gerenciamento','MoedasPlataforma')::select(['moeda_sigla as value','moeda_sigla as label_1','moeda_nome as label_2'])->orderby('moeda_nome')->get();
					break;
				
				case 'Consulta_Clientes_Usuario_Logado':
					$retorno = Model('Veiculos','Cadastros')::where('tipo','cli')->select(['id as value','nome as label_1','email as label_2'])->orderby('nome')->get();
					break;
				
				case 'Consulta_Tipos_Alertas':
					// $retorno = Model('AlertasTipo')::select(['id as value', 'titulo as label_1'])->get();
					$retorno = [];
					break;				

				default:
					$retorno = [];
					break;
			}
		}

		foreach( $retorno as $key => $data ){
			$data['label_1'] = trataTraducoes($data['label_1']);
			if( isset($data['label_2']) ){
				$data['label_2'] = trataTraducoes($data['label_2']);
			}
		}
		
		return $retorno;
	}


	static function WidgetConsultasRepositore($qualConsulta = ''){
		switch ($qualConsulta) {
			case 'select_ultimos_usuarios':
			$consulta = User::where('root', Auth()->user()->id)->select('name as label_1', 'created_at as label_2', 'foto as imagem')->orderby('id', 'desc')->whereBetween('created_at', primeiroUltimodia())->get();
			break;
			default:
			$consulta = [];
			break;
		}
		return $consulta;
	}
};