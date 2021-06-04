<?php
namespace Modules\Veiculos\Http\Controllers\Relatorios;

use App\Repositories\FormularioRepositorie;
use App\Repositories\Componentes;
use Hash;

class Relatorios_Repositorie{
    static function qualBusca($qualBusca){

        $dados = [];
        $data = [];
        $formulario = [];
        $datatable = [];
        
        $dados['titulo_pagina'] = 'Início|Relatórios';
        $dados['rota_geral'] = '/veiculos/painel/relatorios/'.$qualBusca;

        switch ($qualBusca) {
            case 'veiculos':

                    $dados['titulo_pagina'] = 'Início|Relatórios|Veículos';
                    $dados['rota_geral'] = '/veiculos/painel/relatorios/veiculos';

                    $formulario[] = FormularioRepositorie::formulario([
                        'tripo' => 'campos_em_linha',
                        'campos' => [
                            FormularioRepositorie::formulario(['formulario' => 3,'tamDiv' => 3,'label' => 'Data inicial','nome_no_banco_de_dados' => 'data_ini','required'=>1,'tipo'=>'date','valor_inicial' => date('Y-m-d'),]),
                            Componentes::MontaBotao(['tipo' => 'BotaoModalSalvar','size'=>10,'icone' => 'fa fa-refresh','titulo' => 'Atualizar configurações','cor' => 'warning',]),
                        ]]);

                    $datatable = [
                        ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
                        ['tabela'=>7,'label'=>'Ativo','nome_no_banco_de_dados'=>'ativo',],
                        ['tabela'=>28,'label'=>'Nome','nome_no_banco_de_dados'=>'nome',],
                        ['tabela'=>15,'label'=>'Placa','nome_no_banco_de_dados'=>'placa',],
                        ['tabela'=>10,'label'=>'Ano','nome_no_banco_de_dados'=>'ano_veiculo',],
                        ['tabela'=>10,'label'=>'Fabricação','nome_no_banco_de_dados'=>'ano_fabricacao',],
                    ];

                    $data = Model('Veiculos','Veiculos')::get();
                    foreach( $data as $key => $d ){
                        $d['contador'] = ($key+1);
                    }
                    return compact('dados','data','formulario','datatable');
                break;
            
            default:
                return compact('dados','data','formulario','datatable');
            break;
        }
        
    }
}