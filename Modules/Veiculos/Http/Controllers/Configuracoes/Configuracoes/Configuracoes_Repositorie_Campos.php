<?php
namespace Modules\Veiculos\Http\Controllers\Configuracoes\Configuracoes;

use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;

class Configuracoes_Repositorie_Campos{

    const url = '/veiculos/painel/configuracoes/configuracoes';

    static function index($id = ''){
        $dados = [
            'rota_geral'=>Configuracoes_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Configurações|Configurações da conta',
            'botao_listagem' => 'd',
        ];

        return compact('dados');
    }




    static function createorEdit($id = ''){

        $data = Model('Veiculos','Configuracoes')::where('emp_id', 'padrao')->get();
        $dataPadrao = Model('Veiculos','Configuracoes')::where('emp_id', Auth()->user()->emp_id)->get();

        foreach( $data as $d ){
            $formulario[] = FormularioRepositorie::formulario([
                'formulario' => 9,
                'label' => $d['label'],
                'nome_no_banco_de_dados' => $d['chave'],
                'required'=>1,
                'disabled'=>( $d['chave'] === 'moeda_padrao' && site_id()['quaisDados']['moeda_atualizada'] === 1 ? 1 : 0 ),
                'autofocus'=>1,
                'tipo'=>$d['campo_form'],
                'tabela_relacional'=>$d['tabela_relacional'],
                'mascara'=>$d['mascara'],
                'valor_inicial' => $dataPadrao->where('chave',$d['chave'])->first()['conteudo'],
            ]);
        }

        $formulario[] = Componentes::MontaBotao([
            'tipo' => 'BotaoModalSalvar',
            'size'=>10,
            'icone' => 'fa fa-refresh',
            'titulo' => 'Atualizar configurações',
            'cor' => 'warning',
        ]);

        if( !empty($id) ){
            $formulario[] = FormularioRepositorie::formulario([
                'formulario' => 12,
                'nome_no_banco_de_dados' => 'id',
                'valor_inicial' => $id,
                'tipo' => 'hidden'
            ]);
        }

        $formRequest = [];

        $dados = Configuracoes_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};