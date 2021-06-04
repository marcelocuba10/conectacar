<?php
namespace Modules\Veiculos\Http\Controllers\Configuracoes\ContratoRodape;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use App\Repositories\ConsultasRepositore;

class Configuracoes_ContratoRodape_Repositorie_Campos{

    const url = '/veiculos/painel/configuracoes/contrato_rodape';

    static function index($id = ''){
        $dados = [
            'rota_geral'=>Configuracoes_ContratoRodape_Repositorie_Campos::url,
            'titulo_pagina'=>'Início|Configurações|Rodapé do contrato',
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>Configuracoes_ContratoRodape_Repositorie_Campos::url.'/create',
                'tipo'=>'LinkGeralIcone',
                'label'=>'Rodapé do contrato',
            ]),
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>50,'label'=>'Nome','nome_no_banco_de_dados'=>'name',],
            ['tabela'=>35,'label'=>'Email','nome_no_banco_de_dados'=>'email',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Users::where('nivel','cli')->orderby('name')->get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>Configuracoes_ContratoRodape_Repositorie_Campos::url.'/'.$d['id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'remover','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'warning','url'=>Configuracoes_ContratoRodape_Repositorie_Campos::url.'/'.$d['id'].'/edit','tipo'=>'LinkGeralIcone','icone'=>'fa fa-pencil','titulo'=>'editar']);
        } 

        return [
            'data'=>$data,
            'dados'=>$dados,
            'datatable'=>$datatable,
        ];
    }




    static function createorEdit($id = ''){

        $data = Model('Veiculos','Documentos')::where('tipo', 'rodape')->first();

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Rodapé',
            'nome_no_banco_de_dados' => 'conteudo',
            'required'=>1,
            'tipo'=>'textarea',
            'editor'=>'summernote',
            'valor_inicial' => ( !empty($data['conteudo']) ? $data['conteudo'] : '')
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
            'conteudo|Cabeçalho'=>['required'=>'campo_obrigatorio','min:1'=>'Campo deve ter no mínimo |min| caracteres',],
        ];

        $dados = Configuracoes_ContratoRodape_Repositorie_Campos::index()['dados'];

        return [
            'dados'=>$dados,
            'formulario'=>$formulario,
            'formRequest'=>$formRequest,
        ];
    }
};