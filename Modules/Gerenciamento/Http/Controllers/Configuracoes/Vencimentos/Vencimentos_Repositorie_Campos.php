<?php
namespace Modules\Gerenciamento\Http\Controllers\Configuracoes\Vencimentos;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class Vencimentos_Repositorie_Campos{

    const url = '/gerenciamento/painel/configuracoes/vencimentos';

    static function index($id = ''){
        $dados = [
            'rota_geral'=>Vencimentos_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Configurações|Vencimentos',
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>Vencimentos_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar nova moeda',
            ]),
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>85,'label'=>'Vencimento','nome_no_banco_de_dados'=>'conteudo',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Veiculos','Configuracoes')::where('chave','data_vencimento_sistema')->orderby('conteudo')->get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);

            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>Vencimentos_Repositorie_Campos::url.'/'.$d['id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>Vencimentos_Repositorie_Campos::url.'/'.$d['id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil','titulo'=>'Editar']);
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

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Dia para vencimento',
            'nome_no_banco_de_dados' => 'conteudo',
            'required'=>1,
            'icone' => ['tipo'=>'letra','arquivo'=>'1-30'],
            'tipo' => 'number',
            'valor_inicial' => ( !empty($data['conteudo']) ? $data['conteudo'] : ''),
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
            'conteudo|Dia de vencimento'=>['required'=>'campo_obrigatorio'],
        ];

        $dados = Vencimentos_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};