<?php
namespace Modules\Veiculos\Http\Controllers\Configuracoes\Contrato;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class Configuracoes_Contrato_Repositorie_Campos{

    const url = '/veiculos/painel/configuracoes/contrato_contrato';

    static function index($id = ''){
        $dados = [
            'rota_geral'=>Configuracoes_Contrato_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Configurações|Corpo do contrato',
            'botao_listagem' => 'd',
        ];

        return compact('dados');
    }




    static function createorEdit($id = ''){

        $data = Model('Veiculos','Documentos')::where('tipo', 'contrato')->first();

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Contrato',
            'nome_no_banco_de_dados' => 'conteudo',
            'required'=>1,
            'tipo'=>'textarea',
            'editor'=>'ckeditor',
            'valor_inicial' => ( !empty($data['conteudo']) ? $data['conteudo'] : '')
        ]);

        $formulario[] = FormularioRepositorie::camposParaContrato('loja_veiculos_usados');

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
            'conteudo|Cabeçalho'=>['required'=>'campo_obrigatorio','min:1'=>'Campo deve ter no mínimo |min| caracteres',],
        ];

        $dados = Configuracoes_Contrato_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};