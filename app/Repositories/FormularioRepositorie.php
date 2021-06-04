<?php
namespace App\Repositories;
use App\Models\CamposDoSistema;
use App\Models\contract;
use App\Repositories\Componentes;
use App\Repositories\Tratamentos;
use App\Repositories\ConsultasRepositore;
use DB;

class FormularioRepositorie{

	static function formulario($data){

		$label = 					( !empty($data['label']) ? $data['label'] : '' );
		$label_botao_direita = 		( !empty($data['label_botao_direita']) ? $data['label_botao_direita'] : '' );
		$formulario = 				( !empty($data['formulario']) ? $data['formulario'] : 4 );
		$tipo = 					( !empty($data['tipo']) ? $data['tipo'] : 'text' );
		$required = 				( !empty($data['required']) ? 'required="required"' : '' );
		$required_label = 			( !empty($data['required']) ? '<small>(*) </small>' : '' );
		$valor_inicial = 			( !empty($data['valor_inicial']) ? $data['valor_inicial'] : Null );
		$readonly = 				( !empty($data['readonly']) ? 'readonly="readonly"' : '' );
		$disabled = 				( !empty($data['disabled']) ? ' disabled="disabled"' : '' );
		$placeholder = 				( !empty($data['placeholder']) ? $data['placeholder'] : $label );
		$minlength = 				( !empty($data['minlength']) ? 'minlength="'.$data['minlength'].'"' : '' );
		$maxlength = 				( !empty($data['maxlength']) ? 'maxlength="'.$data['maxlength'].'"' : '' );
		$rowsTextarea = 			( !empty($data['rows']) ? $data['rows'] : '5' );
		$min = 						( !empty($data['min']) ? ' max="'.$data['min'].'"' : Null );
		$max = 						( !empty($data['max']) ? ' max="'.$data['max'].'"' : Null );
		$tabela_relacional = 		( !empty($data['tabela_relacional']) ? $data['tabela_relacional'] : '' );
		$chave_tabela_relacional = 	( !empty($data['chave_tabela_relacional']) ? $data['chave_tabela_relacional'] : 'filhos' );
		$nome_no_banco_de_dados = 	( !empty($data['nome_no_banco_de_dados']) ? $data['nome_no_banco_de_dados'] : 'id' );
		$mascara = 					( !empty($data['mascara']) ? $data['mascara'] : '' );
		$multiple = 				( !empty($data['multiple']) ? 'multiple="multiple"' : '' );
		$dados_aux = 				( !empty($data['dados_aux']) ? $data['dados_aux'] : '' );
		$style = 					( !empty($data['style']) ? $data['style']: '');
		$cssAdicionalInput = 		( !empty($data['cssAdicionalInput']) ? $data['cssAdicionalInput']: 'form-control');
		$campoLivre = 				( !empty($data['campoLivre']) ? $data['campoLivre']: Null);
		$checked = 					( !empty($data['checked']) ? ' checked="checked"' : Null);
		$icone = 					( !empty($data['icone']) ? $data['icone'] : Null);  // passar um array com tipo e arquivo, tipo: icone, imagem, letra
		$iconeD = 					( !empty($data['iconeD']) ? $data['iconeD'] : Null);  // passar um array com url, tipo e arquivo, tipo: icone, imagem, letra

		$editor = 					( !empty($data['editor']) ? 'ckeditor' : 'summernote');

		$autofocus = 				( !empty($data['autofocus']) ? 'autofocus' : Null);
		$tamanhoCheio =				( !empty($data['tamanhoCheio']) ? 1 : 0);
		$confirmacao =				( !empty($data['confirmacao']) ? $data['confirmacao'] : 0);
		$msg_base =					( !empty($data['msg_base']) ? '<small>'.trataTraducoes($data['msg_base']).'</small>' : Null);

		$tamDiv   = 				( !empty($data['tamDiv']) ? $data['tamDiv'] : 10);
		$tamLabel = 				( !empty($data['tamLabel']) ? $data['tamLabel'] : 2);
		$mostraIconeA = '';
		$mostraIconeD = '';


		if( !empty($icone) ){
			$mostraIconeA = '<div class="input-group-prepend">';
			$mostraIconeA .= '<span class="input-group-addon">';
			switch ($icone['tipo']) {
				case 'imagem':
				$mostraIconeA .= '<img src="'.$icone['arquivo'].'" style="height: 15px !important;">';
				break;

				case 'letra':
				$mostraIconeA .= '<span style="font-weight: bold">'.$icone['arquivo'].'</span>';
				break;

				default:
				$mostraIconeA .= '<i class="'.$icone['arquivo'].'"></i>';
				break;
			}
			$mostraIconeA .= '</span></div>';
		}

		if( !empty($iconeD) ){
			$mostraIconeD = '<div class="input-group-append">';
			$mostraIconeD .= '<span class="input-group-addon">';
			$mostraIconeD .= ( !empty($iconeD['url']) ? '<a onclick="'.trataUrlparaFuncao($iconeD['url']).'" style="cursor: pointer">' : Null );
			switch ($iconeD['tipo']) {
				case 'imagem':
				$mostraIconeD .= '<img src="'.$iconeD['arquivo'].'" style="height: 15px !important;">';
				break;

				case 'letra':
				$mostraIconeD .= '<span style="font-weight: bold">'.$iconeD['arquivo'].'</span>';
				break;

				default:
				$mostraIconeD .= '<i class="'.$iconeD['arquivo'].'"></i>';
				break;
			}
			$mostraIconeD .= ( !empty($iconeD['url']) ? '</a>' : Null );
			$mostraIconeD .= '</span></div>';
		}





		switch ($tipo) {
			case 'select':
			case 'select_multiple':
				$option = '<option value="">...</option>';
				foreach( ConsultasRepositore::ConsultasRepositore($tabela_relacional) as $dado ){
					$selecionado = ( $valor_inicial === $dado['value'] ? 'selected="selected"' : Null );
					$option .= '<option style="font-family: monospace;" '.$selecionado.' value="'.$dado['value'].'">';

					$option .= $dado['label_1'];
					$option .= ( isset($dado['label_2']) ? ' | ' .  $dado['label_2'] : '' );
					$option .= ( isset($dado['label_3']) ? ' | ' .  $dado['label_3'] : '' );

					$option .= '</option>';
				}

				$retorno = '<div class="form-group row">';
				$retorno .= '<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes($label).'</label>';
				$retorno .= '<div class="col-sm-'.$tamDiv.'">';
				$retorno .= $label_botao_direita;
				
				$retorno .= '<div class="input-group m-b">';
				$retorno .= $mostraIconeA;

				$retorno .= '<select '.$campoLivre.' '.$disabled.' style="'.$style.'" '.( $tipo === 'select_multiple' ? 'multiple' : ''  ).' '.$required.' name="'.$nome_no_banco_de_dados.''.( $tipo === 'select_multiple' ? '[]' : ''  ).'" id="'.$nome_no_banco_de_dados.'" class="form-control js-example-basic-single '.$cssAdicionalInput.'" style="width:10px !important;">';
				$retorno .= $option;
				$retorno .= '</select>';

				$retorno .= '<script type="text/javascript">';
				$retorno .= 'function gerarEspaco(qtd) {';
				$retorno .= "var str = '';";
				$retorno .= "for (var i = 0; i < qtd; i++) str += '&nbsp;'";
				$retorno .= 'return str;';
				$retorno .= '}';
				$retorno .= "var options = [].slice.call(document.querySelectorAll('option'));";
				$retorno .= 'var partes = options.map(function(option) {';
				$retorno .= 'return option.innerHTML.split(' | ');';
				$retorno .= '});';
				$retorno .= 'var maximos = options[0].innerHTML.split(' | ').map(function(str, i) {';
				$retorno .= 'var max = 0;';
				$retorno .= 'partes.forEach(function(parte) {';
				$retorno .= 'if (parte[i].length > max) max = parte[i].length;';
				$retorno .= '})';
				$retorno .= 'return max;';
				$retorno .= '});';
				$retorno .= 'options.forEach(function(option, i) {';
				$retorno .= 'var html = partes[i].map(function(parte, j) {';
				$retorno .= 'var emFalta = maximos[j] - parte.length;';
				$retorno .= 'var novosEspacos = gerarEspaco(emFalta)';
				$retorno .= 'return parte + novosEspacos;';
				$retorno .= '}).join(' | ');';
				$retorno .= 'option.innerHTML = html;';
				$retorno .= '});';
				$retorno .= 'console.log(maximos);';
				$retorno .= '</script>';

				$retorno .= $mostraIconeD;
				$retorno .= '</div>';

				$retorno .= $msg_base;
				$retorno .= '</div></div>';
				break;



			case 'select2':
				$option = '';
				foreach( ConsultasRepositore::ConsultasRepositore($tabela_relacional) as $dado ){
					$selecionado = ( $valor_inicial === $dado['value'] ? 'selected="selected"' : Null );
					$option .= '<option '.$selecionado.' value="'.$dado['value'].'">';
					$option .= $dado['label_1'];
					$option .= ( isset($dado['label_2']) ? ' - ' . $dado['label_2'] : Null );
					$option .= ( isset($dado['label_3']) ? ' - ' . $dado['label_3'] : Null );
					$option .= '</option>';
				}

				$retorno = '<div class="form-group row">';
				$retorno .= '<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes($label).'</label>';
				$retorno .= '<div class="col-sm-'.$tamDiv.'">';
				$retorno .= $label_botao_direita;
				$retorno .= '<select '.( !empty($multiple) ? 'multiple="multiple"' : Null ).' '.$disabled.' name="'.$nome_no_banco_de_dados.''.( !empty($multiple) ? '[]' : Null ).'" id="'.$nome_no_banco_de_dados.' data-placeholder="'.trataTraducoes($placeholder).'" class="'.$nome_no_banco_de_dados.'" style="width:350px;" tabindex="4">';
				$retorno .= '<option value=""></option>';
				$retorno .= $option;
				$retorno .= '</select>';
				$retorno .= $msg_base;
				$retorno .= "<script>$('.".$nome_no_banco_de_dados."').chosen({width: '100%'});</script>";
				$retorno .= '</div>';
				$retorno .= '</div>';
				break;



			case 'select_acesso_rapido':
				$valor_relacional = MenuSistema::MenuSistema();
				$option = '';
				foreach($valor_relacional as $dado ){
					$option .= '<optgroup label="'.trataTraducoes($dado['menu']).'">';
					foreach($dado[$chave_tabela_relacional] as $filhos ){
						$option .= '<option value="'.$filhos['id'].'">'.trataTraducoes($filhos['menu']).'</option>';
					}
					$option .= '</optgroup>';
				}

				$retorno = '<div class="form-group col-sm-'.$formulario.'">
					'.trataTraducoes($label).'
					'.$label_botao_direita.'
				<select '.$campoLivre.' '.$disabled.' style="width: 100%" '.( $tipo === 'select_multiple' ? 'multiple' : ''  ).' '.$required.' name="'.$nome_no_banco_de_dados.''.( $tipo === 'select_multiple' ? '[]' : ''  ).'" id="'.$nome_no_banco_de_dados.'" class="js-example-basic-single '.$cssAdicionalInput.'" style="width:10px !important;"><option value=""></option>'.$option.'</select>'.$msg_base.'</div>';
				break;



			case 'radio_image':

				$option = '';
				foreach( ConsultasRepositore::ConsultasRepositore($tabela_relacional) as $dado ){
					$selecionado = ( $valor_inicial === $dado['value'] ? 'selected="selected"' : 'vazio' );
					$option .= '<option '.$selecionado.' value="'.$dado['value'].'">'.$dado['label_1'].( isset($dado['label_2']) ? ' - ' . $dado['label_2'] : '' ).'</option>';
				}

				$retorno = '<div class="form-group col-sm-'.$formulario.'">
					'.trataTraducoes($label).'
					'.$label_botao_direita.'
				<select '.$campoLivre.' '.$disabled.' style="width: 100%" '.( $tipo === 'select_multiple' ? 'multiple' : ''  ).' '.$required.' name="'.$nome_no_banco_de_dados.''.( $tipo === 'select_multiple' ? '[]' : ''  ).'" id="'.$nome_no_banco_de_dados.'" class="js-example-basic-single '.$cssAdicionalInput.'" style="width:10px !important;"><option value=""></option>'.$option.'</select>'.$msg_base.'</div>';
				break;



			case 'optgroup':

				$option = '';
				$valor_relacional = ConsultasRepositore::ConsultasRepositore($tabela_relacional);
				foreach($valor_relacional  as $dado ){
					$option .= '<optgroup label="'.$dado['label_1'].'">';
					foreach($dado[$chave_tabela_relacional] as $filhos ){
						$selecionado = ( $valor_inicial === $filhos['value'] ? 'selected="selected"' : 'vazio' );
						$option .= '<option '.$selecionado.' value="'.$filhos['value'].'">'.$filhos['label_1'].( isset($filhos['label_2']) ? ' - ' . $filhos['label_2'] : '' ).'</option>';
					}
					$option .= '</optgroup>';
				}

				$retorno = '<div class="form-group col-sm-'.$formulario.'">
					'.trataTraducoes($label).'
					'.$label_botao_direita.'
				<select '.$campoLivre.' '.$disabled.' style="width: 100%" '.( $tipo === 'select_multiple' ? 'multiple' : ''  ).' '.$required.' name="'.$nome_no_banco_de_dados.''.( $tipo === 'select_multiple' ? '[]' : ''  ).'" id="'.$nome_no_banco_de_dados.'" class="js-example-basic-single '.$cssAdicionalInput.'" style="width:10px !important;"><option value=""></option>'.$option.'</select>'.$msg_base.'</div>';
				break;



			case 'textarea':
				$retorno = '<div class="form-group row">';
				if( !empty($label) ){
					$retorno .= '<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes($label).'</label>';
				}
				$retorno .= '<div class="col-sm-'.$tamDiv.'">';
				if( $editor ){
					$retorno .= '<textarea name="'.$nome_no_banco_de_dados.'" id="'.$nome_no_banco_de_dados.'" class="'.$editor.'">'.$valor_inicial.'</textarea>';
				} else {
					$retorno .= '<textarea '.$campoLivre.' style="width: 100% !important; '.$style.'" '.$required.' name="'.$nome_no_banco_de_dados.'" class="'.$editor.' form-control" data-sample-short rows="'.$rowsTextarea.'">'.$valor_inicial.'</textarea>';
				}
				$retorno .= $msg_base;

				$retorno .= "
					<script>
						CKEDITOR.replace( '".$nome_no_banco_de_dados."', {
						language: 'pt-br',
						height: '".( $rowsTextarea > 100 ? $rowsTextarea : '400' )."px',
						toolbar:[[
							'Cut','Copy','Paste','-',
							'Undo','Redo','RemoveFormat','-',
							'Link','Unlink','-',
							'Table','HorizontalRule','-',
							'Format','Bold','Italic','Underline','-',
							'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-',
							'Superscript','-',
							'NumberedList','BulletedList','-',
							'Outdent','Indent','-',
						]],
						});
					</script>
				";

				$retorno .= '</div>';
				$retorno .= '</div>';
			break;



			case 'campos_em_linha':
				$retorno = '<div class="form-group row">';

				$retorno .= '<div class="form-group col-sm-'.$tamLabel.'">'.trataTraducoes($label).'</div>';
				$retorno .= '<div class="col-sm-'.$tamDiv.'">';
				$retorno .= '<div class="row">';

				foreach( $data['campos'] as $campos ){
				$selecionado = ( $valor_inicial === deixaApenasTexto($campos) ? 'selected="selected"' : Null );
				$retorno .= '<div class="col-sm-'.(12 / count($data['campos'])).' text-center">
							 <label>
							 <input '.$selecionado.' type="radio" name="'.$nome_no_banco_de_dados.'" value="'.deixaApenasTexto($campos).'" '.$required.'>
							 <br>
							 '.trataTraducoes($campos).'
							 </label>
							 </div>';
				}

				$retorno .= '</div>';
				$retorno .= '</div>';
				$retorno .= '</div>';
			break;

			case 'search':

				$option = '';
				foreach( ConsultasRepositore::ConsultasRepositore($tabela_relacional) as $dado ){
					$selecionado = ( $valor_inicial === $dado['value'] ? 'selected="selected"' : '' );
					$option .= '<option '.$selecionado.' value="'.$dado['value'].'|'.$dado['label_1'].'" class="form-control">'.$dado['label_1'].'</option>';
				}

				$retorno = '<div class="form-group col-sm-'.$formulario.'">
					
						'.trataTraducoes($label).'
						'.$label_botao_direita.'

					<input '.$campoLivre.' autocomplete="off" '.$required.' '.$readonly.' value="'.$valor_inicial.'" '.$minlength.' '.$maxlength.' name="'.$nome_no_banco_de_dados.'" id="'.$nome_no_banco_de_dados.'" type="search" class="'.$mascara.' '.$cssAdicionalInput.'" value="'.$data['value'].'" list="busca_'.$nome_no_banco_de_dados.'">
					'.$msg_base.'
					<datalist id="busca_'.$nome_no_banco_de_dados.'">
					<option class="form-control" value="">Digite aqui</option>
					'.$option.'
					</datalist>
					'.$msg_base.'
					</div>';
				break;



			case 'password':
				$retorno = '<div class="form-group row">
							<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes('Senha').'</label>
							<div class="col-sm-'.$tamDiv.'">
							'.( !empty($mostraIconeA) ? '<div class="input-group m-b">'.$mostraIconeA : Null ).'
							<input '.$campoLivre.' autocomplete="off" '.$required.' '.$readonly.' '.$minlength.' '.$maxlength.' name="'.$nome_no_banco_de_dados.'" type="password" id="senha" onkeyup="javascript:verifica()" class="'.$cssAdicionalInput.'" value=""></div>
							'.( !empty($mostraIconeA) ? '</div>' : Null ).'
							</div>';

				if( $confirmacao === 0 ){
				$retorno .= '<div class="form-group row">
							<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes('Confirme sua senha').'</label>
							<div class="col-sm-'.$tamDiv.'">
							'.( !empty($mostraIconeA) ? '<div class="input-group m-b">'.$mostraIconeA : Null ).'
							<input '.$campoLivre.' autocomplete="off" '.$required.' '.$readonly.' '.$minlength.' '.$maxlength.' name="re-'.$nome_no_banco_de_dados.'" type="password" id="senha" onkeyup="javascript:verifica()" class="'.$cssAdicionalInput.'" value="">
							'.( !empty($mostraIconeA) ? '</div>' : Null ).'
							</div>
							</div>';

				$retorno .= '<div class="form-group row">
							<label class="col-sm-'.$tamLabel.' col-form-label"></label>
							<div class="col-sm-'.$tamDiv.'">
							<script src="'.url('assets/backend/js/jquery.complexify.js').'"></script>
							<script type="text/javascript">$(function () {$("#'.$nome_no_banco_de_dados.'").complexify({}, function (valid, complexity) {});});
							</script>
							<script>
								$(function (){
							  $("#senha").keyup(function (e){
							      var senha = $(this).val();        
							      if(senha == ""){
							        $("#senhaBarra").hide();
							      }else{
							        var fSenha = forcaSenha(senha);
							        var texto = "";
							        $("#senhaForca").css("width", fSenha+"%");
							        $("#senhaForca").removeClass();
							        $("#senhaForca").addClass("progress-bar");
							        if(fSenha <= 40){
							            texto = "'.trataTraducoes('Senha fraca').'";
							            $("#senhaForca").addClass("progress-bar-danger");
							        }
							        
							        if(fSenha > 40 && fSenha <= 70){
							            texto = "'.trataTraducoes('Senha média').'";
							        }
							        
							        if(fSenha > 70 && fSenha <= 90){
							            texto = "'.trataTraducoes('Senha boa').'";
							            $("#senhaForca").addClass("progress-bar-success");
							        }
							        
							        if(fSenha > 90){
							            texto = "'.trataTraducoes('Senha muito boa').'";
							            $("#senhaForca").addClass("progress-bar-success");
							        }
							        
							        $("#senhaForca").text(texto);
							        
							        $("#senhaBarra").show();
							      }
							    });
							});
							    
							function forcaSenha(senha){
							    var forca = 0;
							    
							    var regLetrasMa     = /[A-Z]/;
							    var regLetrasMi     = /[a-z]/;
							    var regNumero       = /[0-9]/;
							    var regEspecial     = /[!@#$%&*?]/;
							    
							    var tam         = false;
							    var tamM        = false;
							    var letrasMa    = false;
							    var letrasMi    = false;
							    var numero      = false;
							    var especial    = false;

							//    console.clear();
							//    console.log("senha: "+senha);

							    if(senha.length >= 6) tam = true;
							    if(senha.length >= 10) tamM = true;
							    if(regLetrasMa.exec(senha)) letrasMa = true;
							    if(regLetrasMi.exec(senha)) letrasMi = true;
							    if(regNumero.exec(senha)) numero = true;
							    if(regEspecial.exec(senha)) especial = true;
							    
							    if(tam) forca += 10;
							    if(tamM) forca += 10;
							    if(letrasMa) forca += 10;
							    if(letrasMi) forca += 10;
							    if(letrasMa && letrasMi) forca += 20;
							    if(numero) forca += 20;
							    if(especial) forca += 20;
							        
							//    console.log("força: "+forca);
							    
							    return forca;
							}
							</script>
							<div style="height: 20px !important; background-color: #f8f8f8 !important; width:100%; margin:auto; border-radius: 50px;">
							<barraProgresso id="senhaBarra" class="progress" style="display: none; border-radius: 50px;">
							<barraProgresso id="senhaForca" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%; border-radius: 50px;"></barraProgresso>
							</barraProgresso>
							</div>
							</div>
							</div>
							';
				}
				break;
	


			case 'checkbox':
				// $option = '';
				// foreach( ConsultasRepositore::ConsultasRepositore($tabela_relacional) as $dado ){
				// 	$selecionado = ( $valor_inicial === $dado['value'] ? 'selected="selected"' : 'vazio' );
				// 	$option .= '<option '.$selecionado.' value="'.$dado['value'].'">'.trataTraducoes($dado['label_1']).( isset($dado['label_2']) ? ' - ' . trataTraducoes($dado['label_2']) : '' ).'</option>';
				// }

				$retorno = '<div class="form-group col-sm-'.$formulario.'">
					'.trataTraducoes($label).'
					'.$label_botao_direita.'
				<input '.$campoLivre.' type="checkbox" name="'.$nome_no_banco_de_dados.'[]" id="'.$nome_no_banco_de_dados.'[]" value="'.$valor_inicial.'" '.( !empty($data['checked']) ? ' checked="checked"' : '' ).' class=" '.$cssAdicionalInput.'" />
				</div>';
				break;



			case 'quadro_imagem_radio':
				$retorno = '<div class="row">';
				$retorno .= trataTraducoes('<div class="col-md-12" style="text-align: center !important; font-size: 14pt !important; font-weight: bold !important; ">Após selecionar o tema não é possível trocar!</div>');
				foreach( ConsultasRepositore::ConsultasRepositore($tabela_relacional) as $dado ){
					$selecionado = ( $valor_inicial === $dado['value'] ? 'checked="checked"' : Null );

					$retorno .= '<div class="col-md-3" style="border:1px solid #e6e6e6 !important; border-radius: 5px !important; max-width: 18.7% !important; margin: 10px !important;">';
					$retorno .= '<label id="'.$dado['value'].'" name="'.$dado['value'].'" value="'.$dado['value'].'">';
					$retorno .= '<table width="100%" cellpadding="0" cellspacing="0" border="0">';
					$retorno .= '<tr><td style="height: 35px !important;">'.$dado['label_1'].'<td></tr>';
					$retorno .= '<tr><td style="height: 200px !important; overflow: hidden !important; vertical-align: text-top !important; ">
								<img src="'.verificaImagemSistem($dado['imagem']).'" style="height: auto !important; width: 100% !important; padding: 10px !important; float: left !important; border:1px solid #e6e6e6 !important; border-radius: 5px !important; ">
								</td></tr>';
					$retorno .= '<tr><td style="height: 35px !important;">
								<input '.$selecionado.' type="radio" name="'.$nome_no_banco_de_dados.'" id="'.$nome_no_banco_de_dados.'" value="'.$dado['value'].'">
								<td></tr>';
					$retorno .= '</table>';
					$retorno .= '</label>';
					$retorno .= '</div>';
				}
				$retorno .= '</div>';
				break;



			case 'hidden':
				$retorno = '<input '.$campoLivre.' type="hidden" value="'.$valor_inicial.'" name="'.$nome_no_banco_de_dados.'">';
				break;
			

			
			case 'vazio':
				$retorno = '<div class="form-group col-sm-'.$formulario.'">'.trataTraducoes($label).'</div>';
				break;
			

			
			case 'labelComTexto':
				$retorno = '
					<div class="form-group col-sm-'.$formulario.'">
					'.trataTraducoes($label).'
					'.$label_botao_direita.'
					<div class="col-sm-12 '.$cssAdicionalInput.'">
					'.$valor_inicial.'
					</div>
					</div>';
				$retorno = '<div class="form-group row">';
				$retorno .= '<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes($label).'</label>';
				$retorno .= '<div class="col-sm-'.$tamDiv.'">';
				$retorno .= trataTraducoes($valor_inicial);
				$retorno .= trataTraducoes($msg_base);
				$retorno .= '</div>';
				$retorno .= '</div>';
				break;
			

			
			case 'upload_com_previa':
				$retorno = '<div class="form-group col-sm-'.$formulario.'" style="text-align: center !important">
					'.trataTraducoes($label).'
					'.$label_botao_direita.'
				<input '.$campoLivre.' '.$required.' value="'.$valor_inicial.'" name="'.$nome_no_banco_de_dados.'" id="'.$nome_no_banco_de_dados.'" type="file" class="'.$cssAdicionalInput.'">'.$msg_base.'
				<img src="'.url("sem_imagem.png").'" style="margin-top: 65px; max-height: 250px;">
				<script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.js"></script>
				<script type="text/javascript" src="/js/previa_imagem_upload.js"></script>
				</div>';
				break;
			
			// default:
			// 	$retorno = '
			// 		<div class="form-group row">
			// 			<label class="col-sm-'.$tamLabel.' col-form-label">campo 1</label>
			// 			<div class="col-sm-'.$tamDiv.'">
			// 				<input type="text" class="form-control">
			// 			</div>
			// 		</div>
			// 	';
			// break;


			case 'switch':
				$retorno = '';

				if( $tamanhoCheio === 1 ){
				$retorno .= '<div class="form-group row">';
				$retorno .= '<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes($label).'</label>';
				$retorno .= '<div class="col-sm-'.$tamDiv.'">';
				}

				$retorno .= '<div class="form-group col-sm-'.$formulario.'">';

				if( $tamanhoCheio === 0 ){
				$retorno .= trataTraducoes($label);
				}

				$retorno .= $label_botao_direita;
				$retorno .= '<style>.onoffswitch-inner:before { content: "'.trataTraducoes('S').'";}.onoffswitch-inner:after {content: "'.trataTraducoes('N').'";}</style>';
				$retorno .= '<div class="onoffswitch">';
				$retorno .= '<input '.$checked.' type="checkbox" class="onoffswitch-checkbox" id="'.$nome_no_banco_de_dados.$valor_inicial.'" name="'.$nome_no_banco_de_dados.'" value="'.$valor_inicial.'">';
				$retorno .= '<label class="onoffswitch-label" for="'.$nome_no_banco_de_dados.$valor_inicial.'">';
				$retorno .= '<span class="onoffswitch-inner"></span>';
				$retorno .= '<span class="onoffswitch-switch"></span>';
				$retorno .= '</label>';
				$retorno .= '</div>';

				$retorno .= '</div>';
				if( $tamanhoCheio === 1 ){
				$retorno .= '</div>';
				$retorno .= '</div>';
				}
				break;



			case 'numberAdicionaRemove':

				$retorno = '<div class="form-group row">';
				$retorno .= '<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes($label).'</label>';
				$retorno .= '<div class="col-sm-'.$tamDiv.'">';
				$retorno .= '<div class="row">';
				$retorno .= '<div class="col-sm-'.$tamLabel.'">';
				$retorno .= '<a onclick="menos()" class="btn btn-white btn-block"><i class="fa fa-minus"></i></a>';
				$retorno .= '</div>';
				$retorno .= '<div class="col-sm-8">';
				$retorno .= '<input placeholder="'.trataTraducoes($placeholder).'" min="'.$min.'" id="'.$nome_no_banco_de_dados.'" name="'.$nome_no_banco_de_dados.'" type="number" class="'.$mascara.' '.$cssAdicionalInput.'" style="width: 100% !important; text-align: center !important; '.$style.'" required="required">';
				$retorno .= '</div>';
				$retorno .= '<div class="col-sm-'.$tamLabel.'">';
				$retorno .= '<a onclick="mais()" class="btn btn-white btn-block"><i class="fa fa-plus"></i></a>';
				$retorno .= '</div>';
				$retorno .= '</div>';
				$retorno .= '<script type="text/javascript">';
				$retorno .= 'function mais(){';
				$retorno .= 'var atual = document.getElementById("qdade").value;';
				$retorno .= 'var novo = atual - (-1);';
				$retorno .= 'document.getElementById("qdade").value = novo;';
				$retorno .= '}';
				$retorno .= 'function menos(){';
				$retorno .= 'var atual = document.getElementById("qdade").value;';
				$retorno .= 'if(atual > 1) {';
				$retorno .= 'var novo = atual - 1;';
				$retorno .= 'document.getElementById("qdade").value = novo;';
				$retorno .= '}';
				$retorno .= '}';
				$retorno .= '</script>';
				$retorno .= '</div>';
				$retorno .= '</div>';
				break;



			default:
				$retorno = '<div class="form-group row">';
				$retorno .= '<label class="col-sm-'.$tamLabel.' col-form-label">'.$required_label . trataTraducoes($label).'</label>';
				$retorno .= '<div class="col-sm-'.$tamDiv.'">';
				
				$retorno .= '<div class="input-group m-b">';
				$retorno .= $mostraIconeA;

				$retorno .= '<input '.$autofocus.' '.$campoLivre.' autocomplete="off" '.$required.' '.$readonly.' value="'.$valor_inicial.'" '.$minlength.' '.$maxlength.' '.$multiple.'  name="'.$nome_no_banco_de_dados.''.( !empty($multiple) ? '[]' : Null ).'" id="'.$nome_no_banco_de_dados.'" type="'.$tipo.'" class="'.$mascara.' '.$cssAdicionalInput.' form-control" '.$min.' '.$max.' style="'.$style.'" />';

				$retorno .= $mostraIconeD;

				$retorno .= '</div>';

				$retorno .= $msg_base;
				$retorno .= '</div>';
				$retorno .= '</div>';
			break;
		}

		return $retorno;
	}



































	static function abasSeparadoras($data){

		$tamanho = count($data);
		$larguraQuadro = round(100/$tamanho,5);
		if( $tamanho*$larguraQuadro > 100 ){
			$totalCalculado = $tamanho*$larguraQuadro;
			$larguraQuadro = round((100-($totalCalculado-100))/$tamanho,5);
		}

		$tamLabel = ( !empty($data['tamLabel']) ? $data['tamLabel'] : 0);
		$tamDiv = ( !empty($data['tamDiv']) ? $data['tamDiv'] : 12);
		$label = ( !empty($data['label']) ? $data['label'] : '' );

		$retorno = '<div class="row">';
		$retorno .= '<div class="col-lg-'.$tamLabel.'">';
		$retorno .= trataTraducoes($label);
		$retorno .= '</div>';
		$retorno .= '<div class="col-lg-'.$tamDiv.'">';
		$retorno .= '<div class="tabs-container">';
		$retorno .= '<ul class="nav nav-tabs" role="tablist">';

		// topos das abas
		foreach( $data as $key => $datas ){
		$retorno .= '<li style="width: '.$larguraQuadro.'% !important;"><a class="nav-link '.( $key === 0 ? 'active' : Null ).' text-center" data-toggle="tab" href="#tab-'.$key.'">';
		$retorno .= '<i class="'.$datas['icone'].'"></i><br>';
		$retorno .= trataTraducoes($datas['label']);
		$retorno .= '</a></li>';
		}
		// topos das abas

		$retorno .= '</ul>';
		$retorno .= '<div class="tab-content">';


		// conteudo das abas
		foreach( $data as $subkey => $datas ){
		$retorno .= '<div role="tabpanel" id="tab-'.$subkey.'" class="tab-pane '.( $subkey === 0 ? 'active' : Null ).'">';
		$retorno .= '<div class="panel-body">';
		
		foreach( $datas['formulario'] as $formulario ){
			$retorno .= $formulario;
		}

		$retorno .= '</div>';
		$retorno .= '</div>';
		}
		// conteudo das abas


		$retorno .= '</div>';
		$retorno .= '</div>';
		$retorno .= '</div>';
		$retorno .= '</div>';
		$retorno .= '<div class="row">';
		$retorno .= '<div class="col-lg-12">&nbsp;</div>';
		$retorno .= '</div>';

		return $retorno;
	}



































	static function camposParaContrato($tipo){
		switch ($tipo) {
			case 'loja_veiculos_usados':
				$data = '<div class="row">';
				$data .= '<div class="col-lg-2">'.trataTraducoes('Tags para contrato').'</div>';
				$data .= '<div class="col-lg-10">';
				$data .= '<div class="tabs-container">';
				$data .= '<ul class="nav nav-tabs">';

				$total = 0;
				foreach( pegaDadosContrato('loja_veiculos_usados') as $key => $geral ){
					$data .= '<li style="width: 20%; text-align: center"><a class="nav-link '.( $total === 0 ? 'active show' : Null ).'" data-toggle="tab" href="#'.deixaApenasTexto($key).'">'.trataTraducoes($key).'</a></li>';
					$total++;
				}

				$data .= '</ul>';
				$data .= '<div class="tab-content">';
				$total = 0;
				foreach( pegaDadosContrato('loja_veiculos_usados') as $key => $geral ){
					$data .= '<div id="'.deixaApenasTexto($key).'" class="tab-pane '.( $total === 0 ? 'active show' : Null ).'">';
					$data .= '<div class="panel-body">';
					$data .= '<div class="row">';
					foreach( $geral as $termos){
						$data .= '<div class="col-sm-3" style="margin-bottom: 10px;">'.copiatesteConteudo(['conteudo'=>$termos['conteudo'],'label'=>$termos['label'],'corbotao'=>'default']).'</div>';
					}
					$data .= '</div>';
					$data .= '</div>';
					$data .= '</div>';
					$total++;
				}
				$data .= '</div>';
				$data .= '</div>';
				$data .= '</div>';
				$data .= '<div class="col-lg-12">&nbsp;</div>';
				$data .= '</div>';
				break;
			
			default:
				$data = '';
				break;
		}
		return $data;
	}
};