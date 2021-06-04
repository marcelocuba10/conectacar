<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Checklist;

use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use Modules\Veiculos\Http\Controllers\Veiculos\Checklist\Veiculos_Repositorie_Campos;

class Veiculos_Checklist_Repositorie_Campos{

    const url = '/veiculos/painel/veiculos/checklist';

    static function index(){

        $dados = [
            'rota_geral'=>Veiculos_Checklist_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Veículos|Campos de Checklist',
            'pageLength' => 25,
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>Veiculos_Checklist_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar novo checklist',
            ]),
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>85,'label'=>'Nome','nome_no_banco_de_dados'=>'titulo'],
            // ['tabela'=>50,'label'=>'Checklist´s desse veículo','nome_no_banco_de_dados'=>'criado_em'],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Veiculos','ChecklistConfiguracoes')::get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);
            $d['acoes'] = '';
            if( $d['emp_id'] === Auth()->user()->emp_id ){
                $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>Veiculos_Checklist_Repositorie_Campos::url.'/'.$d['id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
                $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>Veiculos_Checklist_Repositorie_Campos::url.'/'.$d['id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil','titulo'=>'Editar']);
            }
        }

        return compact('data','dados','datatable');
    }




    static function createorEdit($id = ''){

        if( !empty($id) ){
            $data = Model('Veiculos','ChecklistConfiguracoes')::find($id);
        }

        $formulario = [
            FormularioRepositorie::formulario([
                'formulario' => 9,
                'label' => 'Tipo',
                'nome_no_banco_de_dados' => 'titulo',
                'required'=>1,
                'valor_inicial' => ( !empty($data['titulo']) ? $data['titulo'] : '')
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

        $dados = Veiculos_Checklist_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }




    static function checklist($id){
        dd('checklist - ' . $id);
    }




    static function contrato($id){
        dd('contrato - ' . $id);
    }




    static function lucro($id){
        $data = Model('Veiculos','Veiculos')::find($id);

        $dados = [
            'rota_geral' => Veiculos_Checklist_Repositorie_Campos::url.'/'.$id.'/lucro',
            'rota_geral_voltar' => Veiculos_Checklist_Repositorie_Campos::url,
            'titulo_pagina' => 'Início|Veículos|Centro de custo|'.$data['nome'],
            'botoes_da_datatable' => Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>Veiculos_Checklist_Repositorie_Campos::url.'/'.$id.'/lucro/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar novo custo para esse veículo',
            ]) . Componentes::MontaBotao([
                'cor' => 'inverse',
                'url' => Veiculos_Checklist_Repositorie_Campos::url,
                'tipo' => 'LinkGeralIcone',
                'label' => 'Listar veículos',
                'icone' => 'fa fa-list',
            ]),
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>20,'label'=>'Tipo','nome_no_banco_de_dados'=>'tipo',],
            ['tabela'=>15,'label'=>'Valor','nome_no_banco_de_dados'=>'valor',],
            ['tabela'=>50,'label'=>'Observações','nome_no_banco_de_dados'=>'observacoes',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        return compact('dados','datatable');
    }

    static function lucro_show($id){
        return Model('Veiculos','VeiculosValores')::where('veiculo_id',$id)->get();
    }
};