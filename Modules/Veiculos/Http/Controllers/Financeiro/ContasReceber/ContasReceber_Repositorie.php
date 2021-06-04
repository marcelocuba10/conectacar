<?php
namespace Modules\Veiculos\Http\Controllers\Financeiro\ContasReceber;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Financeiro\ContasReceber\ContasReceber_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;

class ContasReceber_Repositorie{

    CONST url = ContasReceber_Repositorie_Campos::url;

    static function index(){
        return ContasReceber_Repositorie_Campos::index();
    }

    static function create(){
        return ContasReceber_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, ContasReceber_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        $i = 1;

        if( !empty($data['id']) ){
            $dados['cli_id'] = $data['cli_id'];
            $dados['vencimento'] = $data['vencimento'];
            $dados['obs'] = $data['obs'];

            $qualFinanceiro = Model('Veiculos','Financeiro')::where('hash_id',$data['id'])->first();
            $qualFinanceiro->update($dados);
        } else {

            $criacao = now();
            $data['pin'] = Tratamentos::blockchain(compact('data','criacao'));

            $novadata = [];
            while( $i <= $data['parcela'] ){
                $novadata = [
                    'tipo' => 'contas_receber',
                    'root' => 0,
                    'users_id' => Auth()->user()->id,
                    'cli_id' => $data['cli_id'],
                    'parcela' => $i,
                    'valor' => currencyToSystemDefaultBD(currencyToSystemDefaultBD($data['total'],2) / currencyToSystemDefaultBD($data['parcela'],2),2),
                    'total' => currencyToSystemDefaultBD($data['total'],2),
                    // 'formas_pgto_id' => $data['formas_pgto_id'],
                    'status_pgto_id' => 0,
                    'status_transacao' => 0,
                    'vencimento' => dateCalculate($data['vencimento'],$i,'m'),
                    'dias_atraso' => 0,
                    'obs' => str_replace('<p><br></p>','',$data['obs']),
                    'codigo_transacao' => Tratamentos::blockchain($data),
                    'json_transacao' => json_encode($data),
                    'pin' => $data['pin'],
                ];
                Model('Veiculos','Financeiro')::create($novadata);
                $i++;
            }
        }

        return direcionaAposConcluir(ContasReceber_Repositorie_Campos::url);
    }

    static function show(){
        $data = ContasReceber_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return ContasReceber_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        $consulta = Model('Veiculos','Financeiro')::where('hash_id', $id)->first();
        return Model('Veiculos','Financeiro')::destroy($consulta['id']);
    }

    static function pagar($id){
        return ContasReceber_Repositorie_Campos::pagar($id);
    }

    static function pagar_grava($id, $data){
        $consulta = Model('Veiculos','Financeiro')::find($id);
        if( empty($consulta) ){
            return trataOperacaoIlegal();
        }

        $diasAtraso = calculaDiferencaDias( $data['vencimento'], $data['pagamento'] );

        $novaData = [
            'status_pgto_id' => 1,
            'dias_atraso' => ( $diasAtraso > 0 ? 0 : $diasAtraso ),
            'data_pagamento' => $data['pagamento'],
            'status_transacao' => 1,
        ];

        if( $data['valor'] != $data['valor_pago'] ){
            $obs = str_replace('<p>','',$data['obs']);
            $obs = str_replace('</p>','',$obs);
            
            if( strlen($obs) < 10 ){
                echo exibeToastrAlerta([
                    'cor' => 'warning',
                    'titulo' => 'Atenção',
                    'mensagem' => 'Informe o motivo da diferença dos valores.',
                ]);
                dd();
            }
        }

        $criado = $consulta['created_at'];
        $novaData['hash_pagamento'] = Tratamentos::blockchain(compact('data','novaData','criado'));

        Model('Veiculos','Financeiro')::find($id)->update($novaData);
        return direcionaAposConcluir(ContasReceber_Repositorie_Campos::url);
    }
}