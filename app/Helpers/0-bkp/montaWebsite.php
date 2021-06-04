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

	foreach( $settings['conteudoFilho'] as $settings1 ){
		if( !is_null($settings1['grupo']) ? [$settings1['grupo']] : '' ){
			$data['settings'][$settings1['chave']][$settings1['grupo']] = $settings1['conteudo'];
		} else {
			$data['settings'][$settings1['chave']] = $settings1['conteudo'];
		}
	}

	$data['nav'] = [
		[
			'url' => '/',
			'label' => 'Início',
		],[
			'url' => 'about',
			'label' => 'Quem somos',
		],[
			'url' => 'cars',
			'label' => 'Carros',
		],[
			'url' => 'services',
			'label' => 'Serviços',
		],[
			'url' => 'contact',
			'label' => 'Contato',
		],
	];

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
		$resultado = Model('Veiculos','VeiculosParaSite')::where('ativo',1)->paginate($paginacao);
	} else {
		$resultado = Model('Veiculos','VeiculosParaSite')::where('ativo',1)->get();
	}

	foreach( $resultado as $key => $r ){
		$r['tipo'] = $r['qualTipo']['nome'];
		$r['cambio'] = $r['qualCambio']['nome'];
		$r['cor'] = $r['qualCor']['nome'];
		$r['carroceria'] = $r['qualCarroceria']['nome'];
		$r['portas'] = $r['qualPorta']['nome'];
		$r['motorizacao'] = $r['qualMotorizacao']['nome'];
		$r['combustivel'] = $r['qualCombustivel']['nome'];
		$r['montadora'] = $r['qualMontadora']['nome'];
	}

	return $resultado;
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