<?php
namespace Modules\Veiculos\Http\Controllers\Cadastros\Usuarios;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class Usuarios_Repositorie_Campos{

    const url = '/veiculos/painel/cadastros/usuarios';

    static function index($id = ''){

        $dados = [
            'rota_geral'=>Usuarios_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Cadastros|Usuários',
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>Usuarios_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar novo usuário',
            ]),
            'botaoPDF'=>0,
            'botaoExcel'=>0,
            'botaoImprimir'=>0,
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>50,'label'=>'Nome','nome_no_banco_de_dados'=>'name',],
            ['tabela'=>35,'label'=>'Email','nome_no_banco_de_dados'=>'email',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Gerenciamento','UsersSemRelacionamentos')::where('nivel','usu')->orderby('name')->get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>Usuarios_Repositorie_Campos::url.'/'.$d['hash_id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>Usuarios_Repositorie_Campos::url.'/'.$d['hash_id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil','titulo'=>'Editar']);
        } 

        return compact('data','dados','datatable');
    }




    static function createorEdit($id = ''){

        if( !empty($id) ){
            $data = Model('Gerenciamento','UsersSemRelacionamentos')::
            leftjoin('users_dados', 'users_dados.id', '=', 'users.id')->
            where('hash_id',$id)->
            first();
        }

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Nome',
            'nome_no_banco_de_dados' => 'name',
            'required'=>1,
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-user'],
            'valor_inicial' => ( !empty($data['name']) ? $data['name'] : '')
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 5,
            'label' => 'Email',
            'nome_no_banco_de_dados' => 'email',
            'required'=>1,
            'tipo'=>'email',
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-envelope'],
            'valor_inicial' => ( !empty($data['email']) ? $data['email'] : '')
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 3,
            'label' => 'Senha',
            'nome_no_banco_de_dados' => 'password',
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-lock'],
            'required'=> ( !empty($data['id']) ? 0 : 1 ),
            'tipo'=>'password',
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 12,
            'label' => 'Observações',
            'nome_no_banco_de_dados' => 'observacoes',
            'tipo' => 'textarea',
            'valor_inicial' => ( !empty($data['observacoes']) ? $data['observacoes'] : '')
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

        $formRequest['name|Nome'] = ['required'=>'Campo obrigatório'];
        if( !empty($data['id']) ){
            $formRequest['email|Email'] = ['required'=>'Campo obrigatório','unique:users,email' => 'Email já existe na base de dados'];
        }

        if (!empty($data['id'])){
            $formRequest['password|Senha'] = ['required'=>'Campo obrigatório','min:6'=>'Campo de deve ter no mínimo |min| caracteres','equal:password,re-password'=>'Senha e confirmação são diferentes'];
        }

        $dados = Usuarios_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};