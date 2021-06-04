<?php
function populaDadosContrato($data){
    $qualCliente = Model('Veiculos','Cadastros')::find($data['cliente']);
    $qualLoja = site_id();
    $veiculoVenda = Model('Veiculos','VeiculosParaSite')::where('hash_id',$data['id'])->where('ativo',1)->first();
    $qualMoeda = Model('Gerenciamento','MoedasPlataforma')::where('moeda_sigla',strtoupper($veiculoVenda['moeda']))->first();
    $qualMoeda = ( !empty($qualMoeda) ? $qualMoeda['casas_decimais'] : 2 );
    $qualContrato = Model('Veiculos','Documentos')::where('tipo','contrato')->first();

    if( empty($qualCliente) ){ trataOperacaoIlegal(); }
    if( empty($veiculoVenda) ){ trataOperacaoIlegal(); }

    $dadosTroca = [
        'comprador' => [
            'comprador_name' => $qualCliente['nome'],
            'comprador_email' => $qualCliente['email'],
            'comprador_cpf_cnpj' => $qualCliente['cpf_cnpj'],
            'comprador_rg_ie' => $qualCliente['rg_ie'],
            'comprador_nascimento_fundacao' => $qualCliente['nascimento_fundacao'],
            'comprador_cep' => $qualCliente['cep'],
            'comprador_logradouro' => $qualCliente['logradouro'],
            'comprador_numero' => $qualCliente['numero'],
            'comprador_complemento' => $qualCliente['complemento'],
            'comprador_bairro' => $qualCliente['bairro'],
            'comprador_cidade' => $qualCliente['cidade'],
            'comprador_estado' => $qualCliente['estado'],
            'comprador_fone_1' => $qualCliente['fone_1'],
            'comprador_fone_2' => $qualCliente['fone_2'],
            'comprador_fone_3' => $qualCliente['fone_3'],
            'comprador_fone_4' => $qualCliente['fone_4'],
        ],
        'vendedor' => [
            'vendedor_name' => $qualLoja['name'],
            'vendedor_email' => $qualLoja['email'],
            'vendedor_cpf_cnpj' => $qualLoja['quaisDados']['documento_principal'],
            'vendedor_rg_ie' => $qualLoja['quaisDados']['documento_secundario'],
            'vendedor_nascimento_fundacao' => $qualLoja['quaisDados']['fundacao'],
            'vendedor_cep' => $qualLoja['quaisDados']['fundacao'],
            'vendedor_endereco' => $qualLoja['quaisDados']['endereco'],
            'vendedor_numero' => $qualLoja['quaisDados']['numero'],
            'vendedor_complemento' => $qualLoja['quaisDados']['complemento'],
            'vendedor_bairro' => $qualLoja['quaisDados']['bairro'],
            'vendedor_cidade' => $qualLoja['quaisDados']['cidade'],
            'vendedor_estado' => $qualLoja['quaisDados']['estado'],
            'vendedor_pais' => $qualLoja['quaisDados']['pais'],
            'vendedor_fone_1' => $qualLoja['quaisDados']['fone_1'],
            'vendedor_fone_2' => $qualLoja['quaisDados']['fone_2'],
            'vendedor_fone_3' => $qualLoja['quaisDados']['fone_3'],
            'vendedor_fone_4' => $qualLoja['quaisDados']['fone_4'],
        ],
        'veiculoVenda' => [
            'veiculos_hash_id' => $veiculoVenda['hash_id'],
            'veiculos_ultimo_contrato' => $veiculoVenda['ultimo_contrato'],
            'veiculos_tipo' => $veiculoVenda['pegaTipo'],
            'veiculos_nome' => $veiculoVenda['nome'],
            'veiculos_ano_fabricacao' => $veiculoVenda['ano_fabricacao'],
            'veiculos_ano_carro' => $veiculoVenda['ano_veiculo'],
            'veiculos_cambio' => $veiculoVenda['pegaCambio'],
            'veiculos_km' => $veiculoVenda['km'],
            'veiculos_placa' => $veiculoVenda['placa'],
            'veiculos_cor' => $veiculoVenda['pegaCor'],
            'veiculos_pais' => $veiculoVenda['pais'],
            'veiculos_carroceria' => $veiculoVenda['pegaCarroceria'],
            'veiculos_portas' => $veiculoVenda['pegaPorta'],
            'veiculos_motor' => $veiculoVenda['pegaMotorizacao'],
            'veiculos_combustivel' => $veiculoVenda['pegaCombustivel'],
            'veiculos_chassi' => $veiculoVenda['chassi'],
            'veiculos_renavam' => $veiculoVenda['renavam'],
            'veiculos_montadora' => $veiculoVenda['pegaMontadora'],
            'veiculos_modelo' => $veiculoVenda['modelo'],
            'veiculos_versao' => $veiculoVenda['versao'],
            'veiculos_valor' => currencyToSystemDefaultBD($veiculoVenda['valor']),
            'veiculos_valor_extenso' => escreveValoresPorExtenso(currencyToSystemDefaultBD($veiculoVenda['valor'],$qualMoeda)),
            'veiculos_moeda' => $veiculoVenda['moeda'],
        ],
        'camposExtras' => [
            'pagamento_valor' => $data['valor_veiculo'],
            'pagamento_valor_extenso' => escreveValoresPorExtenso(currencyToSystemDefaultBD($data['valor_veiculo'],$qualMoeda)),
            'contrato_dia' => date('d'),
            'contrato_mes' => date('m'),
            'contrato_ano' => date('Y'),
            'checklist_numero_parcelas_extenso' => escreveValoresPorExtenso($data['qdade_parcela']),
            'checklist_valor_entrada' => $data['valor_entrada'],
            'checklist_valor_entrada_extenso' => escreveValoresPorExtenso(currencyToSystemDefaultBD($data['valor_entrada'],$qualMoeda)),
            'checklist_dia_vencimento_parcela' => (!empty(explode('-',$data['vencimento_parcela'])[2]) ? explode('-',$data['vencimento_parcela'])[2] : ' - ' ),
            'checklist_numero_parcelas' => $data['qdade_parcela'],
            'checklist_dia_vencimento_parcela_extenso' => (!empty(explode('-',$data['vencimento_parcela'])[2]) ? escreveValoresPorExtenso(explode('-',$data['vencimento_parcela'])[2]) : ' - ' ),
            'veiculos_na_troca' => '',
        ],
    ];

    if( !empty($data['veiculo_troca']) ){
        foreach( $data['veiculo_troca'] as $trocas ){
            $consulta = Model('Veiculos','VeiculosParaSite')::
                        where('emp_id',Auth()->user()->emp_id)->
                        where('id','<>',$veiculoVenda['id'])->
                        where('id',$trocas)->
                        first();

            if( !empty($consulta) ){
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '<table width="100%" cellpadding="10" cellspacing="0" border="0">';
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '<tr><td>' . trataTraducoes('Tipo') . ': </td><td>' . $consulta['pegaTipo'] . '</td></tr>';
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '<tr><td>' . trataTraducoes('Nome') . ': </td><td>' . $consulta['nome'] . '</td></tr>';
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '<tr><td>' . trataTraducoes('Fabricação') . ': </td><td>' . $consulta['ano_fabricacao'] . '</td></tr>';
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '<tr><td>' . trataTraducoes('Modelo') . ': </td><td>' . $consulta['ano_veiculo'] . '</td></tr>';
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '<tr><td>' . trataTraducoes('Câmbio') . ': </td><td>' . $consulta['pegaCambio'] . '</td></tr>';
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '<tr><td>' . trataTraducoes('KM') . ': </td><td>' . $consulta['km'] . '</td></tr>';
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '<tr><td>' . trataTraducoes('Placa') . ': </td><td>' . $consulta['placa'] . '</td></tr>';
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '<tr><td>' . trataTraducoes('Cor') . ': </td><td>' . $consulta['pegaCor'] . '</td></tr>';
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '<tr><td>' . trataTraducoes('Carroceria') . ': </td><td>' . $consulta['pegaCarroceria'] . '</td></tr>';
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '<tr><td>' . trataTraducoes('Portas') . ': </td><td>' . $consulta['pegaPorta'] . '</td></tr>';
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '<tr><td>' . trataTraducoes('Motorização') . ': </td><td>' . $consulta['pegaMotorizacao'] . '</td></tr>';
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '<tr><td>' . trataTraducoes('Combustível') . ': </td><td>' . $consulta['pegaCombustivel'] . '</td></tr>';
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '<tr><td>' . trataTraducoes('Chassi') . ': </td><td>' . $consulta['chassi'] . '</td></tr>';
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '<tr><td>' . trataTraducoes('Montadora') . ': </td><td>' . $consulta['pegaMontadora'] . '</td></tr>';
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '<tr><td>' . trataTraducoes('Modelo') . ': </td><td>' . $consulta['modelo'] . '</td></tr>';
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '<tr><td>' . trataTraducoes('Versão') . ': </td><td>' . $consulta['versao'] . '</td></tr>';
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '<tr><td>' . trataTraducoes('Valor') . ': </td><td>' . currencyToSystemDefaultBD($consulta['valor'],$qualMoeda) . '</td></tr>';
                $dadosTroca['camposExtras']['veiculos_na_troca'] .= '</table>';
            }
        }
    }

    $dadosOrigem = json_encode(array_merge($data,$dadosTroca));

    $contrato = $qualContrato['conteudo'];

    foreach( pegaDadosContrato('loja_veiculos_usados','n') as $trocas ){
        $correspondente = $dadosTroca[$trocas['correspondente']][(str_replace('|','',$trocas['chave']))];
        $contrato = str_replace($trocas['chave'],$correspondente,$contrato);
    }

    $dadosContrato['documento_id'] = $qualContrato['id'];
    $dadosContrato['veiculo_id'] = $veiculoVenda['id'];
    $dadosContrato['tipo'] = 'contrato';
    $dadosContrato['dados_origem'] = $dadosOrigem;
    $dadosContrato['documento'] = $contrato;
    $dadosContrato['cliente_id'] = $data['cliente'];

    $ultimoContrato = Model('Veiculos','DocumentosGerados')::create($dadosContrato);

    return compact('ultimoContrato','qualContrato');

}


/*
  "cliente" => "1"
  "veiculo_venda" => "Nome 03 -"
  "valor_veiculo" => "300.000"
  "veiculo_troca" => array:4 [▼
    0 => "2"
    1 => "3"
    2 => "5"
    3 => "6"
  ]
  "valor_entrada" => "0.000"
  "data_entrada" => "2021-02-12"
  "qdade_parcela" => "1"
  "valor_parcela" => "300.000"
  "vencimento_parcela" => "2021-03-14"
  "id" => "hash03"
*/