<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Tipos;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class Tipos_Repositorie_Campos{

    const url = '/veiculos/painel/veiculos/tipos';

    static function index($id = ''){

        $dados = [
            'rota_geral'=>Tipos_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Veículos|Tipos',
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>Tipos_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar novo tipo',
            ]),
            'botaoPDF'=>0,
            'botaoExcel'=>0,
            'botaoImprimir'=>0,
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>85,'label'=>'Tipo','nome_no_banco_de_dados'=>'nome',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Veiculos','VeiculosVariacoes')::where('tipo','tipos')->orderby('nome')->get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);
            $d['acoes'] = '';
            if( $d['emp_id'] === Auth()->user()->emp_id ){
                $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>Tipos_Repositorie_Campos::url.'/'.$d['id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
                $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>Tipos_Repositorie_Campos::url.'/'.$d['id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil','titulo'=>'Editar']);
            }
        } 

        return compact('data','dados','datatable');
    }




    static function createorEdit($id = ''){

        if( !empty($id) ){
            $data = Model('Veiculos','VeiculosVariacoes')::find($id);
        }

        $formulario = [
            FormularioRepositorie::formulario([
                'formulario' => 9,
                'label' => 'Tipo',
                'nome_no_banco_de_dados' => 'nome',
                'required'=>1,
                'valor_inicial' => ( !empty($data['nome']) ? $data['nome'] : '')
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

        $dados = Tipos_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};