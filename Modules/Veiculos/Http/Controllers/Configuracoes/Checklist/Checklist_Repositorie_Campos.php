<?php
namespace Modules\Veiculos\Http\Controllers\Configuracoes\Checklist;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class Checklist_Repositorie_Campos{

    const url = '/veiculos/painel/configuracoes/checklist';

    static function index($id = ''){
        $dados = [
            'rota_geral'=>Checklist_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Configurações|Checklist',
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>Checklist_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar novo item',
            ]),
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>85,'label'=>'Item','nome_no_banco_de_dados'=>'titulo',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Veiculos','ChecklistConfiguracoes')::get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);
            $d['titulo'] = trataTraducoes($d['titulo']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>Checklist_Repositorie_Campos::url.'/'.$d['id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'remover','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>Checklist_Repositorie_Campos::url.'/'.$d['id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil','titulo'=>'editar']);
        } 

        return [
            'data'=>$data,
            'dados'=>$dados,
            'datatable'=>$datatable,
        ];
    }




    static function createorEdit($id = ''){

        if( !empty($id) ){
            $data = Model('Veiculos','ChecklistConfiguracoes')::find($id);
        }

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Item',
            'nome_no_banco_de_dados' => 'titulo',
            'required'=>1,
            'autofocus'=>1,
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-list'],
            'valor_inicial' => ( !empty($data['titulo']) ? $data['titulo'] : '')
        ]);

        $formulario[] = Componentes::MontaBotao([
            'tipo' => 'BotaoModalSalvar',
            'size'=>10,
            'icone' => 'fa fa-save',
            'titulo' => ( empty($id) ? 'Salvar' : 'Atualizar' ),
            'cor' => ( empty($id) ? 'primary' : 'warning' )
        ]);

        if( !empty($id) ){
            $formulario[] = FormularioRepositorie::formulario([
                'formulario' => 12,
                'nome_no_banco_de_dados' => 'id',
                'valor_inicial' => $id,
                'tipo' => 'hidden'
            ]);
        }

        $formRequest = [
            'titulo|campo'=>['required'=>'campo_obrigatorio','min:3'=>'Campo deve ter no mínimo |min| caracteres',],
        ];

        $dados = Checklist_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};