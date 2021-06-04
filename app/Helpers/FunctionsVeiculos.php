<?php
function listaVeiculos($qualHash=''){

    if( !empty($qualHash) ){
        return Model('Veiculos','VeiculosParaSite')::
                where('ativo', 1)->
                where('hash_id', $qualHash)->
                with(['qualTipo','qualCambio','qualCor','qualCarroceria','qualPorta','qualMotorizacao','qualCombustivel','qualMontadora',])->
                first();
    }

    if( !empty($_GET['carmaker']) ){
        $montadora = ( strtolower($_GET['carmaker']) != 'all' ? strtolower($_GET['carmaker']) : Null );
        $modelo = ( strtolower($_GET['model']) != 'all' ? strtolower($_GET['model']) : Null );
        $carroceria = ( strtolower($_GET['bodywork']) != 'all' ? strtolower($_GET['bodywork']) : Null );
        $ano_min = ( strtolower($_GET['min_year']) != 'all' ? strtolower($_GET['min_year']) : '1900' );
        $ano_max = ( strtolower($_GET['max_year']) != 'all' ? strtolower($_GET['max_year']) : (date('Y')+1) );
        $preco_min = ( !empty($_GET['min_value']) ? currencyToSystemDefaultBD($_GET['min_value'],2) : 0 );
        $preco_max = ( !empty($_GET['max_value']) ? currencyToSystemDefaultBD($_GET['max_value'],2) : 999999999999999999999999 );

        return Model('Veiculos','VeiculosParaSite')::
                where('ativo', 1)->
                where('montadora', $montadora)->
                // where('modelo', $modelo)->
                // where('ano_veiculo', $ano_min)->
                // where('ano_veiculo', $ano_max)->
                // where('ano_veiculo', $preco_min)->
                // where('carroceria', $carroceria)->
                // whereBetween('valor', [$preco_min,$preco_max])->
                orderby('id','desc')->
                paginate(12);
    }

    $data = Model('Veiculos','VeiculosParaSite')::
                where('ativo', 1)->
                orderby('id','desc')->
                paginate(12);

    // $urlCompleta = explode('&page=',urlCompleta())[0];
    // $data->withPath($urlCompleta);
    // dd($data);

    return $data;
}

function listaPorTipodeItem($qualTipo='montadoras') {
    $data = Model('Veiculos','VeiculosVariacoes')::
                        where('veiculos_variacoes.tipo',$qualTipo)->
                        join('veiculos','veiculos.montadora','=','veiculos_variacoes.id')->
                        select('veiculos_variacoes.nome','veiculos_variacoes.id')->
                        orderby('veiculos_variacoes.nome')->
                        get()->
                        unique('nome');

    return $data;
}

function listaAnosDosVeiculos(){
    return Model('Veiculos','Veiculos')::orderby('ano_veiculo','desc')->get('ano_veiculo')->unique('ano_veiculo');
}

function listaVeiculosUnicosPorCampo($qualCampo='modelo'){
    return Model('Veiculos','Veiculos')::orderby($qualCampo)->get()->unique($qualCampo);
}

function listaVeiculosPorCarroceria(){
    return Model('Veiculos','Veiculos')::join('veiculos_variacoes','veiculos_variacoes.id','=','veiculos.carroceria')->select(['veiculos_variacoes.nome as variacao'])->orderby('variacao')->get()->unique('variacao');
}

function consultaTabelasServicos($qualServico='servicos'){
    return Model('Veiculos','Servicos')::where('local_uso',$qualServico)->get();
}