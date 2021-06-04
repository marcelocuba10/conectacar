<?php
namespace Modules\Gerenciamento\Http\Controllers\Configuracoes\Geral;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class Geral_Repositorie_Campos{

    const url = '/gerenciamento/painel/configuracoes/geral';

    static function index($id = ''){
        $dados = [
            'rota_geral'=>Geral_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Configurações|Geral',
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>Geral_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar novo idioma',
            ]),
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>20,'label'=>'Nome','nome_no_banco_de_dados'=>'label',],
            ['tabela'=>25,'label'=>'Chave','nome_no_banco_de_dados'=>'chave',],
            ['tabela'=>40,'label'=>'Conteúdo','nome_no_banco_de_dados'=>'conteudo',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Veiculos','Configuracoes')::where('emp_id',0)->get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);

            $d['bandeira'] = verificaImagemouIcone($d['bandeira'],'50px','h');

            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>Geral_Repositorie_Campos::url.'/'.$d['id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>Geral_Repositorie_Campos::url.'/'.$d['id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil','titulo'=>'Editar']);
        } 

        return [
            'data'=>$data,
            'dados'=>$dados,
            'datatable'=>$datatable,
        ];
    }




    static function createorEdit($id = ''){

        if( !empty($id) ){
            $data = Model('Veiculos','Configuracoes')::find($id);
        }

        if( empty($id) ){
            $formulario[] = FormularioRepositorie::formulario([
                'formulario' => 9,
                'label' => 'Nome',
                'nome_no_banco_de_dados' => 'label',
                'readonly'=>( !empty($data['label']) ? 1 : 0),
                'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-info'],
                'valor_inicial' => ( !empty($data['label']) ? $data['label'] : ''),
            ]);
        }

        if( empty($id) ){
            $formulario[] = FormularioRepositorie::formulario([
                'formulario' => 9,
                'label' => 'Chave',
                'nome_no_banco_de_dados' => 'chave',
                'readonly'=>( !empty($data['chave']) ? 1 : 0),
                'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-info'],
                'valor_inicial' => ( !empty($data['chave']) ? $data['chave'] : ''),
            ]);
        }

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Conteúdo',
            'nome_no_banco_de_dados' => 'conteudo',
            'required' => 1,
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-info'],
            'valor_inicial' => ( !empty($data['conteudo']) ? $data['conteudo'] : ''),
        ]);

        if( empty($id) ){
            $formulario[] = FormularioRepositorie::formulario([
                'formulario' => 9,
                'label' => 'Campo de formulário',
                'nome_no_banco_de_dados' => 'campo_form',
                'required' => 1,
                'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-info'],
                'valor_inicial' => ( !empty($data['campo_form']) ? $data['campo_form'] : ''),
            ]);
        }

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
            'conteudo|Conteúdo'=>['required'=>'campo_obrigatorio','min:1'=>'Campo deve ter no mínimo |min| caracteres',],
        ];

        $dados = Geral_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};