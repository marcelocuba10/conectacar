<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Fotos;

use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use Modules\Veiculos\Http\Controllers\Veiculos\Veiculos\Veiculos_Repositorie_Campos;

class Veiculos_Fotos_Repositorie_Campos{

    const url = '/veiculos/painel/veiculos/veiculos/{veiculosID}/fotos';

    static function index($veiculosID){

        $urlCompleta = str_replace('{veiculosID}', $veiculosID, Veiculos_Fotos_Repositorie_Campos::url);

        $qualVeiculo = Model('Veiculos','Veiculos')::where('hash_id', $veiculosID)->first();

        $dados = [
            'rota_geral'=>$urlCompleta,
            'titulo_pagina'=>'Início|Veículos|Veículos|Fotos do veículo ' . $qualVeiculo['placa'],
            'botoes_da_datatable' => Veiculos_Repositorie_Campos::iconesTopoVeiculos($veiculosID),
            'botaoPDF'=>0,
            'botaoExcel'=>0,
            'botaoImprimir'=>0,
            'searching'=>0,
        ];

        $datatable = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>40,'label'=>'Foto','nome_no_banco_de_dados'=>'imagem',],
            ['tabela'=>45,'label'=>'Legenda','nome_no_banco_de_dados'=>'legenda',],
            ['tabela'=>10,'label'=>'Ações','nome_no_banco_de_dados'=>'acoes',]
        ];
        $data = Model('Veiculos','VeiculosFotos')::where('veiculos_id',$qualVeiculo['id'])->orderby('ordem')->get();

        foreach( $data as $key=>$d ){
            $d['contador'] = ($key+1);
            $d['acoes'] .= Componentes::MontaBotao(['cor'=>'danger','url'=>$urlCompleta.'/'.$d['id'].'','tipo'=>'BotaoRemover','icone'=>'fa fa-times','titulo'=>'remover','classHref'=>'botaoRemover']);
        } 

        $formulario[] = FormularioRepositorie::formulario([
            'formulario' => 9,
            'label' => 'Foto(s)',
            'nome_no_banco_de_dados' => 'imagem',
            'required' => 1,
            'tipo' => 'file',
            'multiple' => 1,
        ]);

        $formulario[] = Componentes::MontaBotao([
            'tipo' => 'BotaoModalSalvar',
            'size'=>10,
            'icone' => 'fa fa-save',
            'titulo' => 'Enviar fotos <small> ( Máximo de 20 fotos ) </small>',
            'cor' => ( empty($id) ? 'primary' : 'warning' )
        ]);

        $formRequest = [];

        return compact('data','dados','datatable','veiculosID','formulario','formRequest');
    }
};