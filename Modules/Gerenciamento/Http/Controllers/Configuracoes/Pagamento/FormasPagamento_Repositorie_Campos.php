<?php
namespace Modules\Gerenciamento\Http\Controllers\Configuracoes\Pagamento;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class FormasPagamento_Repositorie_Campos{

    const url = '/gerenciamento/painel/configuracoes/forma_pagamento';

    static function index($id = ''){
        $dados = [
            'rota_geral'=>FormasPagamento_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Configurações|Formas de pagamento',
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>FormasPagamento_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar nova moeda',
            ]),
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>15,'label'=>'Ativo','nome_no_banco_de_dados'=>'status',],
            ['tabela'=>25,'label'=>'Nome','nome_no_banco_de_dados'=>'nome',],
            ['tabela'=>45,'label'=>'Parametros','nome_no_banco_de_dados'=>'parametros',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Veiculos','FormasPagamento')::orderby('nome')->get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);

            $d['status'] = ( $d['ativo'] === 1 ? 'Ativo' : 'Desativado' );

            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>FormasPagamento_Repositorie_Campos::url.'/'.$d['id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>FormasPagamento_Repositorie_Campos::url.'/'.$d['id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil','titulo'=>'Editar']);
        } 

        return [
            'data'=>$data,
            'dados'=>$dados,
            'datatable'=>$datatable,
        ];
    }




    static function createorEdit($id = ''){

        if( !empty($id) ){
            $data = Model('Veiculos','FormasPagamento')::find($id);
        }

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Ativo',
            'nome_no_banco_de_dados' => 'ativo',
            'required'=>( empty($id) ? 1 : 0 ),
            'icone' => ['tipo'=>'icone','arquivo'=>'fa fa-info'],
            'tipo'=>'switch',
            'tamanhoCheio' => 1,
            'checked' => ( !empty($data['ativo']) ? 1 : 0 ),
            'valor_inicial' => ( !empty($data['ativo']) ? (int)$data['ativo'] : 1 ),
        ]);

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
            'label' => 'Parâmtros',
            'nome_no_banco_de_dados' => 'parametros',
            'required'=>1,
            'tipo' => 'textarea',
            'editor' => 'ckeditor',
            'valor_inicial' => ( !empty($data['parametros']) ? $data['parametros'] : ''),
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
            'parametros|Parâmetros'=>['required'=>'Informações de parâmetros são obrigatórias'],
        ];

        $dados = FormasPagamento_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};