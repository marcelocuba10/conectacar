<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Veiculos\Checklist;

use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use Modules\Veiculos\Http\Controllers\Veiculos\Veiculos\Veiculos_Repositorie_Campos;

class Veiculos_Checklist_Repositorie_Campos{

    const url = '/veiculos/painel/veiculos/veiculos/{veiculosID}/checklist';

    static function index($veiculosID){

        $urlCompleta = str_replace('{veiculosID}', $veiculosID, Veiculos_Checklist_Repositorie_Campos::url);

        $qualVeiculo = Model('Veiculos','Veiculos')::where('hash_id', $veiculosID)->first();

        $dados = [
            'rota_geral'=>$urlCompleta,
            'titulo_pagina'=>'Início|Veículos|Checklist|Veículo ' . $qualVeiculo['placa'],
            'botoes_da_datatable'=>Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>$urlCompleta.'/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar novo checklist',
            ]) . Componentes::MontaBotao([
                'cor'=>'warning',
                'url'=>'/veiculos/painel/veiculos/veiculos',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Listar veículos',
                'icone'=>'fa fa-list',
            ]),
        ];
        $dados['botoes_da_datatable'] .= Veiculos_Repositorie_Campos::iconesTopoVeiculos($veiculosID);

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>35,'label'=>'Feito por','nome_no_banco_de_dados'=>'feito_por'],
            ['tabela'=>50,'label'=>'Checklist desse veículo','nome_no_banco_de_dados'=>'criado_em'],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        $data = Model('Veiculos','VeiculosChecklist')::where('veiculo_id',$qualVeiculo['id'])->get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);

            $d['feito_por'] = Model('Gerenciamento','Users')->find($d['created_by'])['name'];
            $d['criado_em'] = formataData($d['created_at']) . ' - ' . explode(' ',$d['created_at'])[1];

            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>$urlCompleta.'/'.$d['id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-trash','titulo'=>'Remover','classHref'=>'botaoRemover']);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'info','url'=>$urlCompleta.'/'.$d['hash'].'/view','tipo'=>'LinkGeralIcone','icone'=>'fa fa-file-pdf-o','titulo'=>'Visualizar','target'=>'_blank']);
        }

        return compact('data','dados','datatable');
    }




    static function createorEdit($veiculosID,$id = ''){
        $data = Model('Veiculos','Veiculos')::where('hash_id', $veiculosID)->first();
        $data = Model('Veiculos','ChecklistConfiguracoes')::get();

        $formRequest = [];
        $dados = Veiculos_Checklist_Repositorie_Campos::index($veiculosID)['dados'];
        $dados['botoes_da_datatable'] = Componentes::MontaBotao([
                'cor'=>'warning',
                'url'=>'/veiculos/painel/veiculos/veiculos',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Listar veículos',
                'icone'=>'fa fa-list',
            ]);
        $dados['botoes_da_datatable'] .= Veiculos_Repositorie_Campos::iconesTopoVeiculos($veiculosID);
        return compact('dados','formRequest','data');
    }




    static function checklist($id){
        dd('checklist - ' . $id);
    }




    static function contrato($id){
        dd('contrato - ' . $id);
    }




    static function lucro($id){
        $data = Model('Veiculos','Veiculos')::find($id);

        $dados = [
            'rota_geral' => $urlCompleta.'/'.$id.'/lucro',
            'rota_geral_voltar' => $urlCompleta,
            'titulo_pagina' => 'Início|Veículos|Centro de custo|'.$data['nome'],
            'botoes_da_datatable' => Componentes::MontaBotao([
                'cor'=>'primary',
                'url'=>$urlCompleta.'/'.$id.'/lucro/create',
                'tipo'=>'LinkGeralIcone',
                'titulo'=>'Cadastrar novo custo para esse veículo',
            ]) . Componentes::MontaBotao([
                'cor' => 'inverse',
                'url' => $urlCompleta,
                'tipo' => 'LinkGeralIcone',
                'label' => 'Listar veículos',
                'icone' => 'fa fa-list',
            ]),
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>20,'label'=>'Tipo','nome_no_banco_de_dados'=>'tipo',],
            ['tabela'=>15,'label'=>'Valor','nome_no_banco_de_dados'=>'valor',],
            ['tabela'=>50,'label'=>'Observações','nome_no_banco_de_dados'=>'observacoes',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];

        return compact('dados','datatable');
    }

    static function lucro_show($id){
        return Model('Veiculos','VeiculosValores')::where('veiculo_id',$id)->get();
    }
};