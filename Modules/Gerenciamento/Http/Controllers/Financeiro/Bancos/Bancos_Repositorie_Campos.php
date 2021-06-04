<?php
namespace Modules\Gerenciamento\Http\Controllers\Financeiro\Bancos;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class Bancos_Repositorie_Campos{

    const url = '/gerenciamento/painel/financeiro/bancos';

    static function index($id = ''){
        $dados = [
            'rota_geral'=>Bancos_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Financeiro|Bancos',
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>Bancos_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar novo idioma',
            ]),
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>20,'label'=>'Nome','nome_no_banco_de_dados'=>'agencia',],
            ['tabela'=>10,'label'=>'Agência','nome_no_banco_de_dados'=>'agencia',],
            ['tabela'=>15,'label'=>'Conta','nome_no_banco_de_dados'=>'conta',],
            ['tabela'=>40,'label'=>'Observações','nome_no_banco_de_dados'=>'observacoes',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Gerenciamento','Bancos')::orderby('nome')->get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);

            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>Bancos_Repositorie_Campos::url.'/'.$d['id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>Bancos_Repositorie_Campos::url.'/'.$d['id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil','titulo'=>'Editar']);
        } 

        return [
            'data'=>$data,
            'dados'=>$dados,
            'datatable'=>$datatable,
        ];
    }




    static function createorEdit($id = ''){

        if( !empty($id) ){
            $data = Model('Gerenciamento','Bancos')::find($id);
        }

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Nome',
            'nome_no_banco_de_dados' => 'nome',
            'required'=>1,
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-info'],
            'valor_inicial' => ( !empty($data['nome']) ? $data['nome'] : ''),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Agência',
            'nome_no_banco_de_dados' => 'agencia',
            'required'=>1,
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-info'],
            'valor_inicial' => ( !empty($data['agencia']) ? $data['agencia'] : ''),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Conta',
            'nome_no_banco_de_dados' => 'conta',
            'required'=>1,
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-info'],
            'valor_inicial' => ( !empty($data['conta']) ? $data['conta'] : ''),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Observações',
            'nome_no_banco_de_dados' => 'observacoes',
            'required'=>1,
            'tipo'=>'textarea',
            'editor'=>'ckeditor',
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-info'],
            'valor_inicial' => ( !empty($data['observacoes']) ? $data['observacoes'] : ''),
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
            'nome|Nome'=>['required'=>'campo_obrigatorio','min:3'=>'Campo deve ter no mínimo de |min| caracteres',],
            'agencia|Agência'=>['required'=>'campo_obrigatorio','min:3'=>'Campo deve ter no mínimo de |min| caracteres',],
            'conta|Conta'=>['required'=>'campo_obrigatorio','min:3'=>'Campo deve ter no mínimo de |min| caracteres',],
        ];

        $dados = Bancos_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};