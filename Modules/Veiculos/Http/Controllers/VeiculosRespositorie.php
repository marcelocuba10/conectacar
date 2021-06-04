<?php
namespace Modules\Veiculos\Http\Controllers;

class VeiculosRespositorie{
    static function index(){

        $dataAtualIni = date('Y-m-01');
        $dataAtualFim = date('Y-'.(dateCalculate(date('Y-m-d'),1,'m','m')).''.'-'.ultimoDiaMes((dateCalculate(date('Y-m-d'),1,'m','m'))));
        $data3MesesFim = date('Y-'.(dateCalculate(date('Y-m-d'),2,'m','m')).''.'-'.ultimoDiaMes((dateCalculate(date('Y-m-d'),2,'m','m'))));
        $data6MesesFim = date('Y-'.(dateCalculate(date('Y-m-d'),5,'m','m')).''.'-'.ultimoDiaMes((dateCalculate(date('Y-m-d'),5,'m','m'))));
        $data12MesesFim = date('Y-'.(dateCalculate(date('Y-m-d'),11,'m','m')).''.'-'.ultimoDiaMes((dateCalculate(date('Y-m-d'),11,'m','m'))));

        $siteID = site_id();

        $veiculos = Model('Veiculos','Veiculos')::get();

        $contasPagar = Model('Veiculos','Financeiro')::where('data_pagamento', Null)->where('tipo','contas_pagar')->sum('valor');
        $contasPagar = currencyToSystemDefaultBD(( $contasPagar > 0 ? $contasPagar : 0 ),2);
        $contasReceber = Model('Veiculos','Financeiro')::where('data_pagamento', Null)->where('tipo','contas_receber')->sum('valor');
        $contasReceber = currencyToSystemDefaultBD(( $contasReceber > 0 ? $contasReceber : 0 ),2);

        $data['veiculos'] = $veiculos;
        $data['totalVeiculos'] = $veiculos->where('ativo', 1)->count();
        $data['visitasNoSite'] = Model('Veiculos','WebsiteEstatisticas')::where('users_id',$siteID['id'])->count();
        $data['veiculosVisualizados'] = $veiculos->where('ativo', 1)->sum('visualizacoes');
        $data['mensagensEnviadas'] = Model('Veiculos','Mensagens')::get();
        $data['mensagensEnviadasTotal'] = count($data['mensagensEnviadas']);
        $data['cliquesTelefone'] = Model('Veiculos','WebsiteEstatisticas')::where('users_id',$siteID['id'])->where('tipo','%telefone|%')->count();
        $data['contasPagar'] = currencyToSystemDefaultBD($contasPagar,( strtolower($siteID['quaisDados']['moeda_padrao']) === 'pyg' ? 3 : 2 ), true);
        $data['contasReceber'] = currencyToSystemDefaultBD($contasReceber,( strtolower($siteID['quaisDados']['moeda_padrao']) === 'pyg' ? 3 : 2 ), true);

        $DocumentosGerados = Model('Veiculos','DocumentosGerados')::where('tipo','contrato')->get();

        for( $i=0; $i<=12; $i++ ){
            $data['mesesPercorridos'][$i]['ini'] = dateCalculate(date('Y-m-d'),($i*-1),'m','Y-m-01');
            $data['mesesPercorridos'][$i]['fim'] = dateCalculate(date('Y-m-d'),($i*-1),'m','Y-m-'.ultimoDiaMes(explode('-',$data['mesesPercorridos'][$i]['ini'])[1],explode('-',$data['mesesPercorridos'][$i]['ini'])[0]));
            $data['mesesPercorridos'][$i]['total'] = $DocumentosGerados->whereBetween('created_at',[$data['mesesPercorridos'][$i]['ini'].' 00:00:00',$data['mesesPercorridos'][$i]['fim'].' 23:59:59'])->count();
        }

        $dados['datatable'] = [
            ['tabela'=>5,'label'=>'#','nome_no_banco_de_dados'=>'contador',],
            ['tabela'=>10,'label'=>'Placa','nome_no_banco_de_dados'=>'placa',],
            ['tabela'=>20,'label'=>'Marca','nome_no_banco_de_dados'=>'montadora',],
            ['tabela'=>10,'label'=>'Modelo','nome_no_banco_de_dados'=>'modelo',],
            ['tabela'=>10,'label'=>'Cor','nome_no_banco_de_dados'=>'cor',],
            ['tabela'=>10,'label'=>'KM','nome_no_banco_de_dados'=>'km',],
            ['tabela'=>10,'label'=>'Ano Fabricação','nome_no_banco_de_dados'=>'ano_fabricacao',],
            ['tabela'=>15,'label'=>'Valor','nome_no_banco_de_dados'=>'valor',],
            ['tabela'=>10,'label'=>'Visualizações','nome_no_banco_de_dados'=>'visualizacoes',],
        ];

        $dados['dados']['rota_geral'] = '/veiculos/painel';
        $dados['dados']['ordem'] = "[8,'desc',0,'asc']";

        return compact('data','dados');
    }

    static function show(){
        $data = Model('Veiculos','Veiculos')::get();
        foreach( $data as $key => $d ){
            $d['contador'] = ($key+1);
            $d['visualizacoes'] = Model('Veiculos','WebsiteEstatisticas')::where('users_id',$d['emp_id'])->where('tipo','detalhes|'.$d['hash_id'])->count();
        }
        return compact('data');
    }
}