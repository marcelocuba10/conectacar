<?php
namespace Modules\Gerenciamento\Http\Controllers\Configuracoes\Idiomas;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class Idiomas_Repositorie_Campos{

    const url = '/gerenciamento/painel/configuracoes/idiomas';

    static function index($id = ''){
        $dados = [
            'rota_geral'=>Idiomas_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Configurações|Idiomas',
            // 'botoes_da_datatable'=>Componentes::MontaBotao([
            //     'cor'=>'primary',
            //     'url'=>Idiomas_Repositorie_Campos::url.'/create',
            //     'tipo'=>'LinkGeralIcone',
            //     'titulo'=>'Cadastrar novo idioma',
            // ]),
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>20,'label'=>'Bandeira','nome_no_banco_de_dados'=>'bandeira',],
            ['tabela'=>25,'label'=>'Sigla','nome_no_banco_de_dados'=>'sigla',],
            ['tabela'=>40,'label'=>'Nome','nome_no_banco_de_dados'=>'nome',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Gerenciamento','Idiomas')::orderby('nome')->get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);

            $d['bandeira'] = verificaImagemouIcone($d['bandeira'],'50px','h');

            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>Idiomas_Repositorie_Campos::url.'/'.$d['id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>Idiomas_Repositorie_Campos::url.'/'.$d['id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil','titulo'=>'Editar']);
        } 

        return [
            'data'=>$data,
            'dados'=>$dados,
            'datatable'=>$datatable,
        ];
    }




    static function createorEdit($id = ''){

        if( !empty($id) ){
            $data = Model('Gerenciamento','Idiomas')::find($id);
        }

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Sigla',
            'nome_no_banco_de_dados' => 'sigla',
            'required'=>1,
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-info'],
            'valor_inicial' => ( !empty($data['sigla']) ? $data['sigla'] : ''),
        ]);

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
            'label' => 'Bandeira',
            'nome_no_banco_de_dados' => 'bandeira',
            'required'=>( empty($id) ? 1 : 0 ),
            'tipo'=>'file',
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-file-image-o'],
            'valor_inicial' => ( !empty($data['bandeira']) ? $data['bandeira'] : ''),
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
            'sigla|Sigla'=>['required'=>'campo_obrigatorio','min:1'=>'Campo deve ter no mínimo |min| caracteres',],
            'nome|Nome'=>['required'=>'campo_obrigatorio','min:1'=>'Campo deve ter no mínimo |min| caracteres',],
        ];

        $dados = Idiomas_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};