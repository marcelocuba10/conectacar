<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Carroceria;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class Carroceria_Repositorie_Campos{

    const url = '/veiculos/painel/veiculos/carroceria';

    static function index($id = ''){

        $dados = [
            'rota_geral'=>Carroceria_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Veículos|Carroceria',
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>Carroceria_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar nova carroceria',
            ]),
            'botaoPDF'=>0,
            'botaoExcel'=>0,
            'botaoImprimir'=>0,
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>85,'label'=>'Carroceria','nome_no_banco_de_dados'=>'nome',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Veiculos','VeiculosVariacoes')::where('tipo','carroceria')->orderby('nome')->get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);
            $d['acoes'] = '';
            if( $d['emp_id'] === Auth()->user()->emp_id ){
                $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>Carroceria_Repositorie_Campos::url.'/'.$d['id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
                $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>Carroceria_Repositorie_Campos::url.'/'.$d['id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil','titulo'=>'Editar']);
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
                'label' => 'Carroceria',
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

/*
        $formRequest['name|nome_completo'] = ['required'=>'campo_obrigatorio'];
        $formRequest['email|email'] = ['required'=>'campo_obrigatorio'];

        if (empty($data['id'])){
        $formRequest['senha|senha'] = ['required'=>'campo_obrigatorio','min:6'=>'Campo deve ter no mínimo |min| caracteres',];
        $formRequest['logo|logotipo'] = ['required'=>'campo_obrigatorio',];
        $formRequest['fundo|fundo_login'] = ['required'=>'campo_obrigatorio',];
        }
*/

        $dados = Carroceria_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};