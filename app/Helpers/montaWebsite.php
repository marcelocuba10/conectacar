<?php
function montaWebsite($url='/'){
	$url = ( $url === '/' ? 'home' : $url );

	$siteAtual = "$_SERVER[HTTP_HOST]";
	$paginaAtual = "$_SERVER[REQUEST_URI]";
	$qualUsuario = site_id();
	$qualTema = ( !empty($qualUsuario) ? $qualUsuario['tema'] : 1 );
	$consultaCompleta = Model($qualUsuario['modulo'],'TemaWebsite')::where('template_id', $qualTema)->where('root', 0)->get();

	$data['settings'] = [];
	$settings = $consultaCompleta->where('chave', 'settings')->first();

	if( empty($settings) ){
		return [];
	}

	foreach( $settings['conteudoFilho'] as $settings1 ){
		if( !is_null($settings1['grupo']) ? [$settings1['grupo']] : '' ){
			$data['settings'][$settings1['chave']][$settings1['grupo']] = $settings1['conteudo'];
		} else {
			$data['settings'][$settings1['chave']] = $settings1['conteudo'];
		}
	}

	switch (site_id()['emp_id']) {
		case 0:
		$data['nav'] = [
			['url' => '/','label' => 'Início',],
			['url' => 'about','label' => 'Quem somos',],
			['url' => 'cars','label' => 'Carros',],
			['url' => 'services','label' => 'Serviços',],
			['url' => 'contact','label' => 'Contato',],
		];
		break;
		
		default:
		$data['nav'] = [
			['url' => '/','label' => 'Início',],
			// ['url' => 'about','label' => 'Quem somos',],
			['url' => 'cars','label' => 'Carros',],
			// ['url' => 'services','label' => 'Serviços',],
			// ['url' => 'contact','label' => 'Contato',],
		];
		break;
	}

	$paginaAtual = ( $paginaAtual === '/' ? 'home' : $paginaAtual );
	$conteudo = Model($qualUsuario['modulo'],'TemaWebsite')::where('idioma',$_SESSION['idioma'])->where('template_id', $qualTema)->where('chave', ( $paginaAtual === '/' ? 'home' : $paginaAtual ))->where('root', Null)->first();

	$data['conteudo'] = [];
	if( !empty($conteudo) ){
		foreach( $conteudo['conteudoFilho'] as $conteudo1 ){
			if( !is_null($conteudo1['grupo']) ? [$conteudo1['grupo']] : '' ){
				$data['conteudo'][$conteudo1['grupo']][$conteudo1['chave']] = $conteudo1['conteudo'];
			} else {
				$data['conteudo'][$conteudo1['chave']] = $conteudo1['conteudo'];
			}
		}
	}

	$localizacao = $data['settings']['location'];
	$data['settings']['localizacao']['url'] = ( !empty($localizacao['url']) ? $localizacao['url'] : 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3601.8157740752545!2d-54.626377284461306!3d-25.47782634102399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f6850512e96efd%3A0xeb4bd3d36e90e340!2sConectaCode!5e0!3m2!1spt-BR!2spy!4v1611669116790!5m2!1spt-BR!2spy' );
	$data['settings']['localizacao']['width'] = ( !empty($localizacao['width']) ? $localizacao['width'] : '100%' );
	$data['settings']['localizacao']['height'] = ( !empty($localizacao['height']) ? $localizacao['height'] : '500px' );

	return $data;
}

function retornaCarros($paginacao=true){
	$qualUsuario = site_id();
	$configuracoes = Model('Veiculos','Configuracoes')::where('emp_id',$qualUsuario['emp_id'])->get();
	$numero_veiculos_interna = ( ( !empty($configuracoes->where('chave','numero_veiculos_interna')->first()) ? $configuracoes->where('chave','numero_veiculos_interna')->first()['conteudo'] : 3 ) );
	$numero_veiculos_home = ( ( !empty($configuracoes->where('chave','numero_veiculos_home')->first()) ? $configuracoes->where('chave','numero_veiculos_home')->first()['conteudo'] : 3 ) );

	$paginaAtual = "$_SERVER[REQUEST_URI]";
	$paginaAtual = ( $paginaAtual === '/' ? 'home' : $paginaAtual );
	$paginacao = ( $paginaAtual === 'home' ? $numero_veiculos_home : $numero_veiculos_interna );
	
	if( $paginacao ){
		$resultado = Model('Veiculos','VeiculosParaSite')::where('emp_id',$qualUsuario['emp_id'])->where('ativo',1)->orderby('id','desc')->paginate($paginacao);
	} else {
		$resultado = Model('Veiculos','VeiculosParaSite')::where('emp_id',$qualUsuario['emp_id'])->where('ativo',1)->orderby('id','desc')->get();
	}

	return $resultado;
}

function veiculosMaisVistos($qdade=4){
	return Model('Veiculos','VeiculosParaSite')::where('emp_id',site_id()['emp_id'])->where('ativo',1)->limit($qdade)->orderby('visualizacoes','desc')->orderby('id','desc')->get();
	
}

function retornaItensUnicos($qualItem){
	$resultado = Model('Veiculos','Veiculos')::select($qualItem)->groupby($qualItem)->get();
	
	if( $qualItem === 'ano_fabricacao' || $qualItem === 'ano_veiculo' ){
		return $resultado->sortBy($qualItem)->values()->all();
	}

	foreach( $resultado as $r ){
		$consulta = Model('Veiculos','VeiculosVariacoes')::find($r[$qualItem]);
		$r[$qualItem] = ( !empty($consulta) ? $consulta['nome'] : trataTraducoes('Não localizado') );
	}

	return $resultado->sortBy($qualItem)->values()->all();
}