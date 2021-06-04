<?php
namespace Modules\Veiculos\Http\Controllers\Financeiro\FormaPgto;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class FormaPgto_Repositorie_Campos{

    const url = '/veiculos/painel/financeiro/formas_pgto';

    static function index($id = ''){

        $dados = [
            'rota_geral'=>FormaPgto_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Financeiro|Formas de pagamento',
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>FormaPgto_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar nova forma de pagamento',
            ]),
            'botaoPDF'=>0,
            'botaoExcel'=>0,
            'botaoImprimir'=>0,
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>65,'label'=>'Forma de pagamento','nome_no_banco_de_dados'=>'nome',],
            ['tabela'=>20,'label'=>'Compensação','nome_no_banco_de_dados'=>'prazo',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Veiculos','VeiculosFinanceiroTipo')::where('tipo','formas_pgto')->orderby('nome')->get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>FormaPgto_Repositorie_Campos::url.'/'.$d['id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>FormaPgto_Repositorie_Campos::url.'/'.$d['id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil','titulo'=>'Editar']);
        } 

        return compact('data','dados','datatable');
    }




    static function createorEdit($id = ''){

        if( !empty($id) ){
            $data = Model('Veiculos','VeiculosFinanceiroTipo')::find($id);
        }

        $formulario = [
            FormularioRepositorie::formulario([
                'formulario' => 9,
                'label' => 'Forma de pagamento',
                'nome_no_banco_de_dados' => 'nome',
                'required'=>1,
                'valor_inicial' => ( !empty($data['nome']) ? $data['nome'] : '')
            ]),

            FormularioRepositorie::formulario([
                'formulario' => 9,
                'label' => 'Prazo de compensação',
                'nome_no_banco_de_dados' => 'prazo',
                'required'=>1,
                'tipo'=>'number',
                'valor_inicial' => ( !empty($data['prazo']) ? $data['prazo'] : '')
            ]),

            FormularioRepositorie::formulario([
                'formulario' => 9,
                'label' => 'Adicionar mais',
                'nome_no_banco_de_dados' => 'direciona',
                'required'=>1,
                'tipo'=>'switch',
                'tamanhoCheio' => 1,
                'checked' => ( !empty($data['ativo']) ? 1 : 0 ),
                'valor_inicial' => ( !empty($data['ativo']) ? (int)$data['ativo'] : 1 ),
            ]),

            Componentes::MontaBotao([
                'tipo' => 'BotaoModalSalvar',
                'size'=>10,
                'icone' => 'fa fa-save',
                'titulo' => ( empty($id) ? 'Salvar' : 'Atualizar' ),
                'cor' => ( empty($id) ? 'primary' : 'warning' )
            ]),
        ];

        if( !empty($id) ){
            $formulario[] = FormularioRepositorie::formulario([
                'formulario' => 12,
                'nome_no_banco_de_dados' => 'id',
                'valor_inicial' => $id,
                'tipo' => 'hidden'
            ]);
        }

        $formRequest = [];

/*
        $formRequest['name|nome_completo'] = ['required'=>'campo_obrigatorio'];
        $formRequest['email|email'] = ['required'=>'campo_obrigatorio'];

        if (empty($data['id'])){
        $formRequest['senha|senha'] = ['required'=>'campo_obrigatorio','min:6'=>'Campo deve ter no mínimo |min| caracteres',];
        $formRequest['logo|logotipo'] = ['required'=>'campo_obrigatorio',];
        $formRequest['fundo|fundo_login'] = ['required'=>'campo_obrigatorio',];
        }
*/

        $dados = FormaPgto_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};