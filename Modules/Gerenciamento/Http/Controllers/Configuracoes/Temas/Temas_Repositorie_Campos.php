<?php
namespace Modules\Gerenciamento\Http\Controllers\Configuracoes\Temas;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class Temas_Repositorie_Campos{

    const url = '/gerenciamento/painel/configuracoes/temas';

    static function index($id = ''){
        $dados = [
            'rota_geral'=>Temas_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Configurações|Temas',
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>Temas_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar nova moeda',
            ]),
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>15,'label'=>'Capa','nome_no_banco_de_dados'=>'capa',],
            ['tabela'=>20,'label'=>'Nome','nome_no_banco_de_dados'=>'nome',],
            ['tabela'=>30,'label'=>'Descrição','nome_no_banco_de_dados'=>'descricao',],
            ['tabela'=>20,'label'=>'URL origem','nome_no_banco_de_dados'=>'url_origem',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Gerenciamento','Temas')::orderby('nome')->get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);

            $d['capa'] = verificaImagemouIcone($d['imagem'],'50px','h');

            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>Temas_Repositorie_Campos::url.'/'.$d['id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>Temas_Repositorie_Campos::url.'/'.$d['id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil','titulo'=>'Editar']);
        } 

        return [
            'data'=>$data,
            'dados'=>$dados,
            'datatable'=>$datatable,
        ];
    }




    static function createorEdit($id = ''){

        if( !empty($id) ){
            $data = Model('Gerenciamento','Temas')::find($id);
        }

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Nome',
            'nome_no_banco_de_dados' => 'nome',
            'required'=>( empty($id) ? 1 : 0 ),
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-info'],
            'valor_inicial' => ( !empty($data['nome']) ? $data['nome'] : ''),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Descrição',
            'nome_no_banco_de_dados' => 'descricao',
            'required'=>( empty($id) ? 1 : 0 ),
            'tipo' => 'textarea',
            'editor' => 'ckeditor',
            'valor_inicial' => ( !empty($data['descricao']) ? $data['descricao'] : ''),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Imagem',
            'nome_no_banco_de_dados' => 'imagem',
            'required'=>( empty($id) ? 1 : 0 ),
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-file'],
            'tipo' => 'file',
            'valor_inicial' => ( !empty($data['imagem']) ? $data['imagem'] : ''),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'URL de origem',
            'nome_no_banco_de_dados' => 'url_origem',
            'required'=>( empty($id) ? 1 : 0 ),
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-globe'],
            'valor_inicial' => ( !empty($data['url_origem']) ? $data['url_origem'] : ''),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Site compactado',
            'nome_no_banco_de_dados' => 'arquivo_compactado',
            'required'=>( empty($id) ? 1 : 0 ),
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-file'],
            'tipo' => 'file',
            'valor_inicial' => ( !empty($data['arquivo_compactado']) ? $data['arquivo_compactado'] : ''),
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
            'nome|Nome'=>['required'=>'campo_obrigatorio','min:5'=>'Campo deve ter no mínimo |min| caracteres',],
            'descricao|Descrição'=>['required'=>'campo_obrigatorio','min:5'=>'Campo deve ter no mínimo |min| caracteres',],
        ];

        $dados = Temas_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};