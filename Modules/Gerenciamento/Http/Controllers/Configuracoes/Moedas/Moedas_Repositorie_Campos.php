<?php
namespace Modules\Gerenciamento\Http\Controllers\Configuracoes\Moedas;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class Moedas_Repositorie_Campos{

    const url = '/gerenciamento/painel/configuracoes/moedas';

    static function index($id = ''){
        $dados = [
            'rota_geral'=>Moedas_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Configurações|Moedas',
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>Moedas_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar nova moeda',
            ]),
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>20,'label'=>'Sigla','nome_no_banco_de_dados'=>'moeda_sigla',],
            ['tabela'=>40,'label'=>'Nome','nome_no_banco_de_dados'=>'moeda_nome',],
            ['tabela'=>25,'label'=>'Última cotação','nome_no_banco_de_dados'=>'ultima_cotacao',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Gerenciamento','MoedasPlataforma')::orderby('moeda_nome')->get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);

            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>Moedas_Repositorie_Campos::url.'/'.$d['id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>Moedas_Repositorie_Campos::url.'/'.$d['id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil','titulo'=>'Editar']);
        } 

        return [
            'data'=>$data,
            'dados'=>$dados,
            'datatable'=>$datatable,
        ];
    }




    static function createorEdit($id = ''){

        if( !empty($id) ){
            $data = Model('Gerenciamento','MoedasPlataforma')::find($id);
        }

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Sigla',
            'nome_no_banco_de_dados' => 'moeda_sigla',
            'required'=>1,
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-info'],
            'valor_inicial' => ( !empty($data['moeda_sigla']) ? $data['moeda_sigla'] : ''),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Símbolo',
            'nome_no_banco_de_dados' => 'simbolo',
            'required'=>1,
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-info'],
            'valor_inicial' => ( !empty($data['simbolo']) ? $data['simbolo'] : ''),
        ]);

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Nome',
            'nome_no_banco_de_dados' => 'moeda_nome',
            'required'=>( empty($id) ? 1 : 0 ),
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-info'],
            'valor_inicial' => ( !empty($data['moeda_nome']) ? $data['moeda_nome'] : ''),
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
            'moeda_sigla|Sigla'=>['required'=>'campo_obrigatorio','min:1'=>'Campo deve ter no mínimo |min| caracteres',],
            'simbolo|Símbolo'=>['required'=>'campo_obrigatorio','min:1'=>'Campo deve ter no mínimo |min| caracteres',],
            'moeda_nome|Nome'=>['required'=>'campo_obrigatorio','min:3'=>'Campo deve ter no mínimo |min| caracteres',],
        ];

        $dados = Moedas_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};