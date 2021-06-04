<?php
function listaVeiculos($qualHash=''){
    if( !empty($qualHash) ){
        return Model('Veiculos','Veiculos')::where('hash_id', $qualHash)->with(['qualTipo','qualCambio','qualCor','qualCarroceria','qualPorta','qualMotorizacao','qualCombustivel','qualMontadora',])->first();
    }

    $data = Model('Veiculos','Veiculos')::orderby('id','desc')->paginate(12);
    $urlCompleta = explode('&page=',urlCompleta())[0];
    $data->withPath($urlCompleta);
    return $data;
}

function listaPorTipodeItem($qualTipo='montadoras') {
    $data = Model('Veiculos','VeiculosVariacoes')::
                        where('veiculos_variacoes.tipo',$qualTipo)->
                        join('veiculos','veiculos.montadora','=','veiculos_variacoes.id')->
                        select('veiculos_variacoes.nome')->
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