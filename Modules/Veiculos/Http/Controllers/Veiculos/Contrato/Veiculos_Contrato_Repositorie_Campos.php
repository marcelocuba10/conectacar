<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Contrato;

use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use Modules\Veiculos\Http\Controllers\Veiculos\Veiculos\Veiculos_Repositorie_Campos;

class Veiculos_Contrato_Repositorie_Campos{

    const url = '/veiculos/painel/veiculos/veiculos/{veiculosID}/contrato';

    static function index($veiculosID){

        $urlCompleta = str_replace('{veiculosID}', $veiculosID, Veiculos_Contrato_Repositorie_Campos::url);

        $qualVeiculo = Model('Veiculos','Veiculos')::where('hash_id', $veiculosID)->first();

        $dados = [
            'rota_geral'=>$urlCompleta,
            'titulo_pagina'=>'Início|Veículos|Contrato|Veículo ' . $qualVeiculo['placa'],
            'botoes_da_datatable'=>( $qualVeiculo['ativo'] === 1 ? Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>$urlCompleta.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar novo contrato',
            ]) : Null) . Componentes::MontaBotao([
                'cor'=>'warning',
                'url'=>'/veiculos/painel/veiculos/veiculos',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Listar veículos',
                'icone'=>'fa fa-list',
            ]),
        ];
        $dados['botoes_da_datatable'] .= Veiculos_Repositorie_Campos::iconesTopoVeiculos($veiculosID);

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>25,'label'=>'Cliente','nome_no_banco_de_dados'=>'cliente_nome'],
            ['tabela'=>20,'label'=>'Valor do contrato','nome_no_banco_de_dados'=>'valor_contrato'],
            ['tabela'=>25,'label'=>'Feito por','nome_no_banco_de_dados'=>'feito_por'],
            ['tabela'=>20,'label'=>'Valor de entrada','nome_no_banco_de_dados'=>'valor_entrada'],
            ['tabela'=>5,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Veiculos','DocumentosGerados')::where('tipo','contrato')->get();

        foreach( $data as $key=>$d ){
            $dadosOrigem = json_decode($d['dados_origem'],true);
            $cliente = $d['qualCliente'];
            $veiculo = $d['qualVeiculo'];
            $clienteNome = ( !empty($cliente) ? $cliente['name'] : trataTraducoes('Cliente não localizado') );

            $d['contador'] = ($key+1);
            $d['cliente_nome'] = $cliente['nome'];
            $d['feito_por'] = Model('Gerenciamento','UsersSemRelacionamentos')->find($d['created_by'])['name'];
            $d['valor_entrada'] = currencyToSystemDefaultBD($dadosOrigem['valor_entrada']);
            $d['valor_contrato'] = currencyToSystemDefaultBD($dadosOrigem['valor_veiculo']);
            $d['veiculos_troca'] = ' - ';

            // $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>$urlCompleta.'/'.$d['id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'info','url'=>$urlCompleta.'/'.$d['hash'].'/print','tipo'=>'LinkGeralIcone','icone'=>'fa fa-file-pdf-o','titulo'=>'Gerar PDF','target'=>'_blank']);
        }

        return compact('data','dados','datatable');
    }




    static function createorEdit($veiculosID){

        $urlCompleta = str_replace('{veiculosID}', $veiculosID, Veiculos_Contrato_Repositorie_Campos::url);
        $configuracaoMoedas = Model('Gerenciamento','MoedasPlataforma')::get();
        $data = Model('Veiculos','Veiculos')::where('hash_id', $veiculosID)->where('ativo',1)->first();
        $casasDecimais = Model('Gerenciamento','MoedasPlataforma')::where('moeda_sigla',strtoupper($data['moeda']))->first();
        $casasDecimais = ( !empty($casasDecimais['casas_decimais']) ? $casasDecimais['casas_decimais'] : 2 );
        
        if( empty($data) ){
            echo direcionaAposConcluir([
                'url' => '/veiculos/painel/veiculos/veiculos',
                'cor' => 'warning',
                'titulo' => 'Atenção',
                'mensagem' => 'Veículo não está ativo. <br> Ative-o e volte para gerar contrato.',
            ]);
            dd();
        }

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Cliente',
            'nome_no_banco_de_dados' => 'cliente',
            'tipo'=>'select',
            'multiple'=>'1',
            'tabela_relacional'=>'Consulta_Clientes_Usuario_Logado',
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Veículo de venda',
            'nome_no_banco_de_dados' => 'veiculo_venda',
            'readonly'=>1,
            'valor_inicial' => $data['nome'] . ' - ' . $data['placa']
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Valor do veículo',
            'nome_no_banco_de_dados' => 'valor_veiculo',
            'readonly'=>1,
            'icone' => ['tipo'=>'letra','arquivo'=>$data['moeda']],
            'valor_inicial' => currencyToSystemDefaultBD($data['valor'],$casasDecimais,true),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Veículo na troca',
            'nome_no_banco_de_dados' => 'veiculo_troca',
            'tipo'=>'select2',
            'multiple'=>'1',
            'tabela_relacional'=>'Consultas_Veiculos_Ativos',
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Valor de entrada',
            'nome_no_banco_de_dados' => 'valor_entrada',
            'mascara' => 'mascaraMoeda',
            'icone' => ['tipo'=>'letra','arquivo'=>$data['moeda']],
            'valor_inicial' => currencyToSystemDefaultBD('0.00',$casasDecimais,true),
            'campoLivre' => 'onblur="calculaGeral()"'
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Data da entrada',
            'nome_no_banco_de_dados' => 'data_entrada',
            'icone' => ['tipo'=>'letra','arquivo'=>$data['moeda']],
            'tipo' => 'date',
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-calendar'],
            'valor_inicial' => date('Y-m-d'),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Parcelas',
            'nome_no_banco_de_dados' => 'qdade_parcela',
            'tipo' => 'number',
            'valor_inicial' => 1,
            'campoLivre' => 'onblur="calculaGeral()"'
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Valor da parcela',
            'nome_no_banco_de_dados' => 'valor_parcela',
            'mascara' => 'mascaraMoeda',
            'readonly' => 1,
            'icone' => ['tipo'=>'letra','arquivo'=>$data['moeda']],
            'valor_inicial' => currencyToSystemDefaultBD($data['valor'],$casasDecimais,true),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Data do primeiro vencimento',
            'nome_no_banco_de_dados' => 'vencimento_parcela',
            'tipo' => 'date',
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-calendar'],
            'valor_inicial' => dateCalculate(date('Y-m-d'),30,'d'),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'tipo' => 'hidden',
            'valor_inicial' => $veiculosID,
        ]);

        $formulario[] = Componentes::MontaBotao([
            'tipo' => 'BotaoModalSalvar',
            'size'=>10,
            'icone' => 'fa fa-file-pdf-o',
            'titulo' => 'Preparar contrato',
            'cor' => ( empty($id) ? 'primary' : 'warning' )
        ]);

        $formRequest['cliente|Cliente'] = ['required'=>'campo_obrigatorio'];
        $formRequest['veiculo_venda|É necessário um veículo'] = ['required'=>'campo_obrigatorio'];
        $formRequest['valor_veiculo|Valor do veículo'] = ['required'=>'campo_obrigatorio'];
        $formRequest['valor_entrada|Valor de entrada'] = ['required'=>'campo_obrigatorio'];
        $formRequest['data_entrada|Data da entrada'] = ['required'=>'campo_obrigatorio'];
        $formRequest['qdade_parcela|Quantidade de parcelas'] = ['required'=>'campo_obrigatorio'];
        $formRequest['valor_parcela|Valor da parcela'] = ['required'=>'campo_obrigatorio'];
        $formRequest['vencimento_parcela|Vencimento da parcela'] = ['required'=>'campo_obrigatorio'];

        $dados = Veiculos_Contrato_Repositorie_Campos::index($veiculosID)['dados'];

        return compact('urlCompleta','configuracaoMoedas','data','dados','formulario','casasDecimais','formRequest');
    }




    static function verificado($veiculosID, $data){

        $contrato = populaDadosContrato($data);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Conferência do contrato',
            'nome_no_banco_de_dados' => 'contrato',
            'tipo'=>'textarea',
            'editor'=>'ckeditor',
            'valor_inicial' => $contrato['ultimoContrato']['documento'],
        ]);

        foreach( $data as $key => $datas ){
            if( is_array($datas) ){
                foreach( $datas as $veiculosTroca ){
                    $formulario[] = FormularioRepositorie::formulario([
                        'tipo' => 'hidden',
                        'nome_no_banco_de_dados' => 'veiculo_troca[]',
                        'valor_inicial' => $veiculosTroca,
                    ]);
                }
            } else {
                $formulario[] = FormularioRepositorie::formulario([
                    'tipo' => 'hidden',
                    'nome_no_banco_de_dados' => $key,
                    'valor_inicial' => $datas,
                ]);
            }
        }
        
        $formulario[] = FormularioRepositorie::formulario([
            'tipo' => 'hidden',
            'nome_no_banco_de_dados' => 'verificado',
            'valor_inicial' => $veiculosID,
        ]);
        
        $formulario[] = FormularioRepositorie::formulario([
            'tipo' => 'hidden',
            'nome_no_banco_de_dados' => 'ultimoContrato',
            'valor_inicial' => $contrato['ultimoContrato']['hash'],
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'tipo' => 'hidden',
            'valor_inicial' => $veiculosID,
        ]);

        $formulario[] = Componentes::MontaBotao([
            'tipo' => 'BotaoModalSalvar',
            'size'=>10,
            'icone' => 'fa fa-file-pdf-o',
            'titulo' => 'Finalizar contrato',
            'cor' => 'success',
            'styleDiv' => 'padding-bottom: 150px !important;'
        ]);

        $formRequest = [];

        $dados = Veiculos_Contrato_Repositorie_Campos::index($veiculosID)['dados'];

        return compact('data','dados','formulario','contrato');
    }
};