<?php
namespace Modules\Veiculos\Http\Controllers\Documentos\Recibos;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class Recibos_Repositorie_Campos{

    const url = '/veiculos/painel/documentos/recibos';

    static function index($id = ''){

        $dados = [
            'rota_geral'=>Recibos_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Documentos|Recibos',
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>Recibos_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar novo recibo',
            ]),
            'botaoPDF'=>0,
            'botaoExcel'=>0,
            'botaoImprimir'=>0,
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>35,'label'=>'Nome','nome_no_banco_de_dados'=>'nome_cliente',],
            ['tabela'=>25,'label'=>'Recibo de','nome_no_banco_de_dados'=>'referencia_recibo',],
            ['tabela'=>25,'label'=>'Valor','nome_no_banco_de_dados'=>'valor_recibo',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Veiculos','DocumentosGerados')::where('tipo','recibo')->get();

        foreach( $data as $key=>$d ){
            $dadosOrigem = json_decode($d['dados_origem'],true);
            $clienteId = Model('Veiculos','Cadastros')::find($dadosOrigem['cliente_id']);

            $d['contador'] = ($key+1);
            $d['nome_cliente'] = $clienteId['nome'];
            $d['referencia_recibo'] = $dadosOrigem['recibo_referente_a'];
            $d['valor_recibo'] = '<div style="text-align:left; width: 100% !important;">'.$dadosOrigem['valor'].'</div>';
            $d['acoes'] .= '<div style="float:left;">'. Componentes::MontaBotao(['cor'=>'info','url'=>Recibos_Repositorie_Campos::url.'/'.$d['hash'].'/imprimir','tipo'=>'LinkGeralIcone','icone'=>'fa fa-file-pdf-o','titulo'=>'Gerar PDF','target'=>'_blank']).'</div>';
        } 

        return compact('data','dados','datatable');
    }
    static function createorEdit($id = ''){
        if( !empty($id) ){
            $data = Model('Veiculos','VeiculosFinanceiroTipo')::find($id);
        }
        $moedaPadrao = Model('Veiculos','Configuracoes')::where('emp_id', Auth()->user()->emp_id)->where('chave','moeda_padrao')->first();
        $moedaPadrao = ( !empty($moedaPadrao) ? $moedaPadrao['conteudo'] : 'USD' );
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
                'label' => 'Valor do recibo',
                'nome_no_banco_de_dados' => 'valor',
                'required'=>1,
                'mascara'=>'mascaraMoeda',
                'valor_inicial' => ( !empty($data['valor']) ? currencyToSystemDefaultBD($data['valor'],( strtolower($data['moeda']) === 'pyg' ? 3 : 2 )) : 0 ),
                'icone' => ['tipo'=>'icone','tipo'=>'letra','arquivo'=>$moedaPadrao],
            ]),
            FormularioRepositorie::formulario([
                'formulario' => 9,
                'label' => 'Recibo referente à',
                'nome_no_banco_de_dados' => 'recibo_referente_a',
                'required'=>1,
                'icone' => ['tipo'=>'icone','tipo'=>'icone','arquivo'=>'fa fa-list'],
                'valor_inicial' => ''
            ]),
            FormularioRepositorie::formulario([
                'formulario' => 9,
                'label' => 'Data do recibo',
                'nome_no_banco_de_dados' => 'data_recibo',
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
            'valor|Valor do recibo'=>['required'=>'Campo obrigatório','min:4'=>'Campo deve ter no mínimo |min| caracteres'],
            'data_recibo|Data do recibo'=>['required'=>'Campo obrigatório'],
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

        $dados = Recibos_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};