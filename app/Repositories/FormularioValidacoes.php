<?php
namespace App\Repositories;
use App\Repositories\Componentes;
use DB;

class FormularioValidacoes{

	static function FormularioValidacoes($data, $validacao = ''){
		// primeiro loop para pegar os dados de validação que foram passados

		if( !empty($validacao) ){

			//	declara as variáveis de validação do final
			$statusValidacao = '';
			$msgRetorno = '';

			//	primeiro loop para percorrer todas as validações
			foreach ($validacao as $key => $validado) {

				$campos = explode('|', $key);
				$key = $campos[0];
				$placeholder = trataTraducoes($campos[1]);

				// segundo loop percorrendo cada valição passada para os campos
				foreach ($validado as $acao => $validado2) {
					
					$campoAcao = explode(':', $acao);

					switch ($campoAcao[0]){
						case 'equal':
							// 'password|senha'=>['equal:senha,re-senha'=>'senhas_sao_diferentes',],
							$campoAcao = explode(',',$campoAcao[1]);
							if ( $data[$campoAcao[0]] != $data[$campoAcao[1]] ) {
								$statusValidacao .= 1;
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => trataTraducoes('Atenção').' - '.$placeholder,'texto' => trataTraducoes($validado2)]);
							}
							break;

						case 'required':
							// 'nome|nome'=>['required'=>'campo_obrigatorio'],
							$statusValidacao .= ( empty($data[$key]) ? 1 : 0 );
							if( (int)$statusValidacao === 1 ){
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => trataTraducoes('Atenção').' - '.$placeholder,'texto' => trataTraducoes($validado2)]);
							}
							break;

						case 'unique':
							$campoAcao = explode(',',$campoAcao[1]);
							if(!empty($data['id'])){
								$consulta = DB::table($campoAcao[0])->where($campoAcao[1], $data[$key])->where('id', '<>', $data['id'])->count();
							} else {
								$consulta = DB::table($campoAcao[0])->where($campoAcao[1], $data[$key])->count();
							}

							if( $consulta != 0 ){
								$statusValidacao .= 1;
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => trataTraducoes('Atenção').' - '.$placeholder,'texto' => trataTraducoes($validado2)]);
							}
							break;

						case 'min':
							// 'min:3' => 'campo_deve_ter_minimo_de_|min|_caracteres',
							if( strlen($data[$key]) < $campoAcao[1] ){
								$statusValidacao .= 1;
								$validado2 = ( strpos($validado2, '|min|') > 0 ? str_replace('|min|', $campoAcao[1], trataTraducoes(''.$validado2)) : $validado2 );
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => trataTraducoes('Atenção').' - '.$placeholder,'texto' => $validado2]);
							}
							break;

						case 'max':
							if( $data[$key] > $campoAcao[1] ){
								$statusValidacao .= 1;
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => trataTraducoes('Atenção').' - '.$placeholder,'texto' => trataTraducoes($validado2) . ' ' . $campoAcao[1]]);
							}
							break;

						case 'size':
							if( strlen($data[$key]) <= $campoAcao[1] ){
								$statusValidacao .= 1;
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => trataTraducoes('Atenção').' - '.$placeholder,'texto' => trataTraducoes($validado2)]);
							}
							break;

						case 'exists':
							$campoAcao = explode(',',$campoAcao[1]);
							$consulta = DB::table($campoAcao[0])->where($campoAcao[1], $data[$key])->count();

							if( (int)$consulta === 0 ){
								$statusValidacao .= 1;
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => trataTraducoes('Atenção').' - '.$placeholder,'texto' => $key . ' ' . trataTraducoes($validado2)]);
							}
							break;

						case 'email':
							$statusValidacao .= ( !filter_var($data[$key], FILTER_VALIDATE_EMAIL) ? 1 : 0 );
							if( (int)$statusValidacao === 1 ){
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => trataTraducoes('Atenção').' - '.$placeholder,'texto' => trataTraducoes($validado2)]);
							}
							break;

						case 'exists2':
							$campoAcao = explode(',',$campoAcao[1]);
							$consulta = DB::table($campoAcao[0])->where($campoAcao[1], $data[$key])->where($campoAcao[2], Auth()->user()->id)->get();

							if( $consulta === 0 ){
								$statusValidacao .= 1;
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => trataTraducoes('Atenção').' - '.$placeholder,'texto' => trataTraducoes($validado2)]);
							}
							break;

						case 'positivo':
							if( $data[$key] < 0 ){
								$statusValidacao .= 1;
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => trataTraducoes('Atenção').' - '.$placeholder,'texto' => trataTraducoes($validado2)]);
							}
							break;

						case 'diferente':
							if ( ($data[$key]*1) === ($data[$campoAcao[1]]*1) ) {
								$statusValidacao .= 1;
								$msgRetorno .= Componentes::MontaBotao(['tipo' => 'botaoToaster','cor' => 'warning','titulo' => trataTraducoes('Atenção').' - '.$placeholder,'texto' => trataTraducoes($validado2)]);
							}
							break;

						default:
							$statusValidacao .= 0;
							$msgRetorno .= '';
					}
				}
			}
			if ( (int)$statusValidacao > 0 ){
				destravaBotaoFormulario();
				return $msgRetorno;
			}
		}
		return $data;
	}
};

/*

modelo de chamada

			'nomedocampo' => [
				'int' => trataTraducoes('Selecione um valor disponível'),
				'exists2:carteiras,id,users_id' => trataTraducoes('Precisará ser uma carteira de sua propriedade'),
				'checaSaldo:financeiro_saldo,carteira_id' => trataTraducoes('Você não tem saldo suficiente nessa carteira'),
			],
			'total' => [
				'maiorquezero:financeiro_saldo,carteira_id' => trataTraducoes('Você não tem saldo suficiente nessa carteira'),
			],

*/