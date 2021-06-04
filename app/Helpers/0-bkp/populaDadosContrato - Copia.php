<?php
function populaDadosContrato($data){
    $qualContrato = Model('Veiculos','Documentos')::where('tipo','contrato')->first();
    $qualVeiculo = Model('Veiculos','Veiculos')::where('hash_id',$data['id'])->first();
    $formatoMoeda = Model('Gerenciamento','MoedasPlataforma')::where('moeda_sigla',strtoupper($qualVeiculo['moeda']))->first();
    $formatoMoeda = (!empty($formatoMoeda['casas_decimais']) ? $formatoMoeda['casas_decimais'] : 2);

    $qualVeiculo['valor'] = currencyToSystemDefaultBD($qualVeiculo['valor'],$formatoMoeda);

    if( empty($qualContrato) ){
        echo direcionaAposConcluir([
            'url' => '/'.strtolower(Auth()->user()->modulo).'/painel/configuracoes/contrato_contrato',
            'cor' => 'warning',
            'titulo' => 'Atenção',
            'mensagem' => 'Você deve cadastrar um contrato para prosseguir!',
        ]);
        dd();
    }

    $dadosContrato = [
        'documento_id' => $qualContrato['id'],
        'veiculo_id' => $qualVeiculo['id'],
        'tipo' => 'contrato',
        'dados_origem' => json_encode($data),
    ];

    $ultimoContrato = Model('Veiculos','DocumentosGerados')::create($dadosContrato);
    $dados_origem = json_decode($dadosContrato['dados_origem'],true);
    $qualContrato = $qualContrato['conteudo'];
    $camposDeContrato = pegaDadosContrato('loja_veiculos_usados','n');
    $qualVeiculo = Model('Veiculos','Veiculos')::with('qualTipo','qualCambio','qualCor','qualCarroceria','qualPorta','qualMotorizacao','qualCombustivel','qualMontadora')->where('hash_id',$dados_origem['id'])->first();

    foreach( $camposDeContrato as $percorre ){
        $campoCoringa = explode('|',$percorre['correspondente']);
        $bancoDados = explode('::',$campoCoringa[0]);
        switch ($campoCoringa[1]) {
            case 'VeiculosVariacoes':
                $campoDestino = $qualVeiculo[$campoCoringa[2]]['nome'];
                break;

            case 'acao_adicional':
                $acaoAdicional = explode(',',$campoCoringa[2]);
                switch ($acaoAdicional[0]) {
                    case 'escreve_extenso':
                        $dados_origem = json_decode($dadosContrato[$acaoAdicional[1]],true);
                        $campoDestino = escreveValoresPorExtenso($dados_origem[$acaoAdicional[2]].',00');
                        break;
                    
                    default:
                        break;
                }
                
                $campoDestino = $qualVeiculo[$campoCoringa[2]]['nome'];
                break;

            case 'pegadata':
                // dd('pegadata');
                // d,created_at
                // $campoDestino = $qualVeiculo[$campoCoringa[2]]['nome'];
                $campoDestino = '';
                break;
            
            default:
                $campoDestino = Model($bancoDados[0],$bancoDados[1])->first()[$campoCoringa[1]];
                break;
        }

        $qualContrato = str_replace($percorre['chave'],$campoDestino,$qualContrato);
    }

    $ultimoContrato->update(['documento' => $qualContrato]);

    return compact('ultimoContrato','qualContrato');
}