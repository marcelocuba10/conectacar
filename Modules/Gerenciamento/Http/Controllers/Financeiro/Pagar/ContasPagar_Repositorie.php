<?php
namespace Modules\Gerenciamento\Http\Controllers\Financeiro\Pagar;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Gerenciamento\Http\Controllers\Financeiro\Pagar\ContasPagar_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;
use Illuminate\Support\Facades\DB;

class ContasPagar_Repositorie{

    CONST url = ContasPagar_Repositorie_Campos::url;

    static function index(){
        return ContasPagar_Repositorie_Campos::index();
    }

    static function create(){
        return ContasPagar_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, ContasPagar_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        $i = 0;

        if( !empty($data['id']) ){
            $data['total'] = currencyToSystemDefaultBD($data['total'],2);
            $data['valor'] = currencyToSystemDefaultBD($data['valor'],2);
            Model('Gerenciamento','Financeiro')::find($data['id'])->update($data);
        } else {
            $criacao = now();
            $data['pin'] = Tratamentos::blockchain(compact('data','criacao'));

            $novadata = [];
            while( $i < $data['parcela'] ){
                $novadata = [
                    'tipo' => 'contas_pagar',
                    'root' => 0,
                    'users_id' => Auth()->user()->id,
                    'cli_id' => $data['cli_id'],
                    'parcela' => ($i+1),
                    'valor' => currencyToSystemDefaultBD(currencyToSystemDefaultBD($data['total'],2) / currencyToSystemDefaultBD($data['parcela'],2),2),
                    'total' => currencyToSystemDefaultBD($data['total'],2),
                    'status_pgto_id' => 0,
                    'status_transacao' => 0,
                    'vencimento' => dateCalculate($data['vencimento'],$i,'m'),
                    'dias_atraso' => 0,
                    'obs' => str_replace('<p><br></p>','',$data['obs']),
                    'codigo_transacao' => Tratamentos::blockchain($data),
                    'json_transacao' => json_encode($data),
                    'pin' => $data['pin'],
                ];
                Model('Gerenciamento','Financeiro')::create($novadata);
                $i++;
            }
        }

        return direcionaAposConcluir(ContasPagar_Repositorie_Campos::url);
    }

    static function show(){
        $data = ContasPagar_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return ContasPagar_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Gerenciamento','Financeiro')::destroy($id);
    }

    static function pagar($id){
        return ContasPagar_Repositorie_Campos::pagar($id);
    }

    static function pagar_grava($id, $data){
        $consulta = Model('Gerenciamento','Financeiro')::find($id);
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

        $criado = $consulta['created_at'];
        $novaData['hash_pagamento'] = Tratamentos::blockchain(compact('data','novaData','criado'));

        Model('Gerenciamento','Financeiro')::find($id)->update($novaData);
        return direcionaAposConcluir(ContasPagar_Repositorie_Campos::url);
    }
}