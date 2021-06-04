<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Lucro;

use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use Modules\Veiculos\Http\Controllers\Veiculos\Veiculos\Veiculos_Repositorie_Campos;

class Veiculos_Lucro_Repositorie_Campos{

    const url = '/veiculos/painel/veiculos/veiculos/{veiculosID}/lucro';

    static function index($veiculosID){

        $urlCompleta = str_replace('{veiculosID}', $veiculosID, Veiculos_Lucro_Repositorie_Campos::url);

        $qualVeiculo = Model('Veiculos','Veiculos')::where('hash_id', $veiculosID)->first();

        $dados = [
            'rota_geral'=>$urlCompleta,
            'titulo_pagina'=>'Início|Veículos|Lucro|Veículo ' . $qualVeiculo['placa'],
            'ordering'=>0,
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>$urlCompleta.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar novo lucro',
            ]) . Componentes::MontaBotao([
                'cor'=>'warning',
                'url'=>'/veiculos/painel/veiculos/veiculos',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Listar veículos',
                'icone'=>'fa fa-list',
            ]),
        ];

        $dados['javascript'] = '';

        $dados['botoes_da_datatable'] .= Veiculos_Repositorie_Campos::iconesTopoVeiculos($veiculosID);
        $moedasDisponiveis = Model('Gerenciamento','MoedasPlataforma')::get();

        $casasDecimais = $moedasDisponiveis->where('moeda_sigla',configuracoesPadrao()['moeda_padrao'])->first()['casas_decimais'];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>65,'label'=>'Gasto','nome_no_banco_de_dados'=>'tipo'],
            ['tabela'=>25,'label'=>'Valor','nome_no_banco_de_dados'=>'valor'],
            ['tabela'=>5,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Veiculos','VeiculosValores')::where('contrato_id', Null)->where('veiculo_id',$qualVeiculo['id'])->get();

        $somatoria = 0;
        foreach( $data as $key=>$d ){
            $somatoria += $d['valor'];

            $d['valor'] = '<div style="text-align: right !important;">'.currencyToSystemDefaultBD($d['valor'],$casasDecimais,true).'</div>';
            $d['contador'] = ($key+1);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>$urlCompleta.'/'.$d['hash'].$d['id'],'tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
        }

        $data[] = [
            'contador' => (count($data)+1)
,            'tipo' => 'Total',
            'valor' => '<div style="text-align: right !important;">'.currencyToSystemDefaultBD($somatoria,$casasDecimais,true).'</div>',
            'acoes' => '',
        ];

        // foreach( $moedasDisponiveis as $key => $moedas ){
        //     $data[] = [
        //         'contador' => (count($data)+1),
        //         'tipo' => '<div style="'.( configuracoesPadrao()['moeda_padrao'] === $moedas['moeda_sigla'] ? 'font-weight: bold !important' : Null ).'">Total '.$moedas['moeda_sigla'].'</div>',
        //         'valor' => '<div style="text-align: right !important; '.( configuracoesPadrao()['moeda_padrao'] === $moedas['moeda_sigla'] ? 'font-weight: bold !important' : Null ).'">'.currencyToSystemDefaultBD(($somatoria*$moedas['ultima_cotacao']),$moedas['casas_decimais'],$casasDecimais,true).'</div>',
        //         'acoes' => '',
        //     ];
        // }

        $formulario = Veiculos_Lucro_Repositorie_Campos::createorEdit()['formulario'];
        $formRequest = Veiculos_Lucro_Repositorie_Campos::createorEdit()['formRequest'];

        return compact('data','dados','datatable','formulario','formRequest');
    }




    static function createorEdit(){

        $configuracao = Model('Gerenciamento','MoedasPlataforma')::where('moeda_sigla',configuracoesPadrao()['moeda_padrao'])->first();

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Tipo de gasto',
            'nome_no_banco_de_dados' => 'tipo',
            'required'=>1,
            'valor_inicial' => ( !empty($data['tipo']) ? $data['tipo'] : ''),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Valor',
            'nome_no_banco_de_dados' => 'valor',
            'required'=>1,
            'mascara' => $configuracao['mascara_moeda'],
            'icone' => ['tipo'=>'letra','arquivo'=>mostraMoedaPadrao('g')],
            'valor_inicial' => ( !empty($data['valor']) ? $data['valor'] : ''),
        ]);

        $formulario[] = Componentes::MontaBotao([
            'tipo' => 'BotaoModalSalvar',
            'size'=>10,
            'icone' => 'fa fa-save',
            'titulo' => ( empty($id) ? 'Salvar' : 'Atualizar' ),
            'cor' => ( empty($id) ? 'primary' : 'warning' )
        ]);

        $formRequest['tipo|Tipo de gasto'] = ['required'=>'Campo obrigatório'];
        $formRequest['valor|Valor'] = ['required'=>'Campo obrigatório'];

        return compact('formulario','formRequest');
    }
};