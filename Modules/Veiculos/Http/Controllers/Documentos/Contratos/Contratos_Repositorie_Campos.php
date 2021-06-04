<?php
namespace Modules\Veiculos\Http\Controllers\Documentos\Contratos;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class Contratos_Repositorie_Campos{

    const url = '/veiculos/painel/documentos/contratos';

    static function index($id = ''){

        $dados = [
            'rota_geral'=>Contratos_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Documentos|Contratos',
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>Contratos_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar novo contrato',
            ]),
            'botaoPDF'=>0,
            'botaoExcel'=>0,
            'botaoImprimir'=>0,
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>55,'label'=>'Nome','nome_no_banco_de_dados'=>'nome_cliente',],
            ['tabela'=>30,'label'=>'Valor','nome_no_banco_de_dados'=>'valor_do_contrato',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Veiculos','DocumentosGerados')::where('tipo','contratos')->get();

        foreach( $data as $key=>$d ){
            $dadosOrigem = json_decode($d['dados_origem'],true);
            $clienteId = Model('Veiculos','Users')::find($dadosOrigem['cliente_id']);

            $d['contador'] = ($key+1);
            $d['nome_cliente'] = $clienteId['name'];
            $d['valor_do_contrato'] = $dadosOrigem['valor'];
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'info','url'=>Contratos_Repositorie_Campos::url.'/'.$d['id'].'/imprimir','tipo'=>'LinkGeralIcone','icone'=>'fa fa-print','titulo'=>'Visualizar contrato','target'=>'_blank']);
        } 

        return compact('data','dados','datatable');
    }




    static function createorEdit($id = ''){

        if( !empty($id) ){
            $data = Model('Veiculos','VeiculosFinanceiroTipo')::find($id);
        }

        $formulario = [
            FormularioRepositorie::formulario([
                'formulario' => 9,
                'label' => 'Cliente',
                'nome_no_banco_de_dados' => 'cliente_id',
                'required'=>1,
                'tipo'=>'select2',
                'multiple'=>0,
                'tabela_relacional'=>'Consulta_Clientes_Usuario_Logado',
                'valor_inicial' => ''
            ]),

            FormularioRepositorie::formulario([
                'formulario' => 9,
                'label' => 'Valor do contrato',
                'nome_no_banco_de_dados' => 'valor',
                'required'=>1,
                'mascara'=>'mascaraMoeda',
                'valor_inicial' => '',
                'icone' => ['tipo'=>'icone','tipo'=>'letra','arquivo'=>'Gs'],
            ]),

            FormularioRepositorie::formulario([
                'formulario' => 9,
                'label' => 'Contrato referente à',
                'nome_no_banco_de_dados' => 'contrato_referente_a',
                'required'=>1,
                'icone' => ['tipo'=>'icone','tipo'=>'icone','arquivo'=>'fa fa-list'],
                'valor_inicial' => ''
            ]),

            FormularioRepositorie::formulario([
                'formulario' => 9,
                'label' => 'Data do contrato',
                'nome_no_banco_de_dados' => 'data_contrato',
                'required'=>1,
                'tipo'=>'date',
                'icone' => ['tipo'=>'icone','tipo'=>'icone','arquivo'=>'fa fa-calendar'],
                'valor_inicial' => ''
            ]),

            Componentes::MontaBotao([
                'tipo' => 'BotaoModalSalvar',
                'size'=>10,
                'icone' => 'fa fa-file-pdf-o',
                'titulo' => 'Gerar',
                'cor' => ( empty($id) ? 'primary' : 'warning' )
            ]),
        ];

        if( !empty($id) ){
            $formulario[] = FormularioRepositorie::formulario([
                'formulario' => 12,
                'nome_no_banco_de_dados' => 'id',
                'valor_inicial' => $id,
                'tipo' => 'hidden'
            ]);
        }

        $formRequest = [
            'cliente_id|Cliente'=>['required'=>'Campo obrigatório'],
            'valor|Valor do contrato'=>['required'=>'Campo obrigatório','min:4'=>'Campo deve ter no mínimo |min| caracteres'],
            'data_contrato|Data do contrato'=>['required'=>'Campo obrigatório'],
        ];

/*
        $formRequest['name|nome_completo'] = ['required'=>'campo_obrigatorio'];
        $formRequest['email|email'] = ['required'=>'campo_obrigatorio'];

        if (empty($data['id'])){
        $formRequest['senha|senha'] = ['required'=>'campo_obrigatorio','min:6'=>'Campo deve ter no mínimo |min| caracteres',];
        $formRequest['logo|logotipo'] = ['required'=>'campo_obrigatorio',];
        $formRequest['fundo|fundo_login'] = ['required'=>'campo_obrigatorio',];
        }
*/

        $dados = Contratos_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};