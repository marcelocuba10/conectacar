<?php
namespace Modules\Gerenciamento\Http\Controllers\Cadastros\Administradores;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class Administradores_Repositorie_Campos{

    const url = '/gerenciamento/painel/cadastros/administradores';

    static function index($id = ''){
        $dados = [
            'rota_geral'=>Administradores_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Cadastros|Administradores',
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>Administradores_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar novo administrador',
            ]),
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>25,'label'=>'Nome','nome_no_banco_de_dados'=>'name',],
            ['tabela'=>60,'label'=>'Email','nome_no_banco_de_dados'=>'email',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Gerenciamento','UsersSemRelacionamentos')::where('nivel','adm')->orderby('name')->get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);

            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>Administradores_Repositorie_Campos::url.'/'.$d['hash_id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>Administradores_Repositorie_Campos::url.'/'.$d['hash_id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil','titulo'=>'Editar']);
        } 

        return [
            'data'=>$data,
            'dados'=>$dados,
            'datatable'=>$datatable,
        ];
    }




    static function createorEdit($id = ''){
        if( !empty($id) ){
            $data = Model('Gerenciamento','UsersSemRelacionamentos')::
            where('hash_id',$id)->
            first();
        }

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Nome',
            'nome_no_banco_de_dados' => 'name',
            'required'=>1,
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-user'],
            'valor_inicial' => ( !empty($data['name']) ? $data['name'] : ''),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 5,
            'label' => 'Email',
            'nome_no_banco_de_dados' => 'email',
            'required'=>1,
            'tipo'=>'email',
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-envelope'],
            'valor_inicial' => ( !empty($data['email']) ? $data['email'] : ''),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 3,
            'label' => 'Senha',
            'nome_no_banco_de_dados' => 'password',
            'tipo'=>'password',
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-lock'],
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
            // 'name|Nome'=>['required'=>'Campo obrigatório','min:3'=>'Campo deve ter no mínimo |min| caracteres',],
            // 'email|Email'=>['required'=>'Campo obrigatório','min:7'=>'Campo deve ter no mínimo |min| caracteres','unique:Users,email' => 'Email já está cadastrado na plataforma'],
        ];

        $dados = Administradores_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};