<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Contrato;

use App\Repositories\Tratamentos;
use App\Repositories\Componentes;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Veiculos\Contrato\Veiculos_Contrato_Repositorie_Campos;
use Hash;

class Veiculos_Contrato_Repositorie{

    CONST url = Veiculos_Contrato_Repositorie_Campos::url;

    static function index($veiculosID){
        return Veiculos_Contrato_Repositorie_Campos::index($veiculosID);
    }

    static function create($veiculosID){
        return Veiculos_Contrato_Repositorie_Campos::createorEdit($veiculosID);
    }

    static function store($veiculosID, $data){
        $qualVeiculo = Model('Veiculos','Veiculos')::where('hash_id', $veiculosID)->where('ativo',1)->first();

        if( empty($qualVeiculo) ){
            echo exibeToastrAlerta([
                'cor' => 'warning',
                'titulo' => 'Atenção',
                'mensagem' => 'Você deve informar um veículo que seja de sua empresa!',
            ]);
            return trataOperacaoIlegal();
        }

        if( !empty($data['veiculo_troca']) ){
            if( in_array($qualVeiculo['id'],$data['veiculo_troca'])){
                foreach( $data['veiculo_troca'] as $key => $remove ){
                    if( (int)$qualVeiculo['id'] === (int)$remove ){
                        unset($data['veiculo_troca'][$key]);
                    }
                }
                sort($data['veiculo_troca']);
            }
        }

        $verificaCliente = Model('Veiculos','Cadastros')::find((int)$data['cliente']);
        if( empty($verificaCliente) ){
            echo exibeToastrAlerta([
                'cor' => 'warning',
                'titulo' => 'Atenção',
                'mensagem' => 'Você deve informar um cliente que tenha sido cadastrado em sua loja',
            ]);
            return trataOperacaoIlegal();
        }

        $data['valor_veiculo'] = currencyToSystemDefaultBD($qualVeiculo['valor'],8);
        $data['valor_entrada'] = currencyToSystemDefaultBD($data['valor_entrada'],8);
        $data['qdade_parcela'] = (int)($data['qdade_parcela']);
        $data['valor_parcela'] = currencyToSystemDefaultBD(($data['valor_veiculo'] - $data['valor_entrada']) / $data['qdade_parcela'],8);
        
        $documento = Model('Veiculos','DocumentosGerados')::where('hash',$data['ultimoContrato'])->first();

        if( !empty($documento['ultimoContrato']['id']) ){
            $dadosOrigem = json_decode($documento['ultimoContrato']['dados_origem'],true);

            $dataDoContrato = explode(' ',$documento['ultimoContrato']['created_at'])[0];

            if( (int)$dadosOrigem['valor_entrada'] > 0 ){
                Model('Veiculos','Financeiro')::create([
                    'tipo' => 'contas_receber',
                    'root' => 0,
                    'users_id' => Auth()->user()->id,
                    'cli_id' => (int)$dadosOrigem['cliente'],
                    'parcela' => 1,
                    'valor' => $dadosOrigem['valor_entrada'],
                    'total' => $dadosOrigem['valor_entrada'],
                    'vencimento' => $dadosOrigem['data_entrada'],
                    'obs' => trataTraducoes('Entrada de pagamento de veículo referente ao contrato') . ' ' . $documento['ultimoContrato']['hash'] . ' ' . 'gerado em ' . $dataDoContrato,
                    'codigo_transacao' => 'contrato|'.$documento['ultimoContrato']['hash'],
                ]);
            }

            for($i=0; $i < $dadosOrigem['qdade_parcela']; $i++) {
                Model('Veiculos','Financeiro')::create([
                    'tipo' => 'contas_receber',
                    'root' => 0,
                    'users_id' => Auth()->user()->id,
                    'cli_id' => (int)$dadosOrigem['cliente'],
                    'parcela' => $i+1,
                    'valor' => $dadosOrigem['valor_parcela'],
                    'total' => $dadosOrigem['valor_parcela'],
                    'vencimento' => dateCalculate($dadosOrigem['data_entrada'],$i,'m'),
                    'obs' => trataTraducoes('Parcela do contrato') . ' ' . $documento['ultimoContrato']['hash'] . ' ' . 'gerado em ' . $dataDoContrato,
                    'codigo_transacao' => 'contrato|'.$documento['ultimoContrato']['hash'],
                ]);
            }
        }

        $documento->update(['documento' => $data['contrato']]);
        $qualVeiculo->update(['ativo' => 0]);
        $_SESSION['ultimo_contrato'] = $documento;
        $urlCompleta = str_replace('{veiculosID}', $veiculosID, Veiculos_Contrato_Repositorie_Campos::url);

        return direcionaAposConcluir($urlCompleta);
    }

    static function show($veiculosID){
        $data = Veiculos_Contrato_Repositorie_Campos::index($veiculosID);
        return compact('data');
    }

    static function edit($veiculosID, $id){
        return Veiculos_Contrato_Repositorie_Campos::createorEdit($veiculosID, $id);
    }

    static function update($veiculosID, Request $request, $id){
        return 'update';
    }

    static function destroy($veiculosID, $id){
        $data = Model('Veiculos','Veiculos')::where('hash_id',$veiculosID)->first();
        $data = Model('Veiculos','DocumentosGerados')::where('veiculo_id',$data['id'])->where('id',$id)->first();
        return Model('Veiculos','DocumentosGerados')::destroy($data['id']);
    }

    static function mostraChecklist($veiculosID, $hashChecklist){
        $qualVeiculo = Model('Veiculos','Veiculos')::where('hash_id', $veiculosID)->first();
        $buscaChecklist = Model('Veiculos','VeiculosChecklist')::where('veiculo_id', $qualVeiculo['id'])->first();
        $buscaChecklist = json_decode($buscaChecklist['retorno'],true);
        $buscaChecklist = $buscaChecklist['veiculo_id'];

        $checklistOriginal = Model('Veiculos','ChecklistConfiguracoes')::get();

        if( empty($qualVeiculo) ){
            echo exibeToastrAlerta([
                'cor' => 'warning',
                'titulo' => 'Atenção',
                'mensagem' => 'Você deve informar um veículo que seja de sua empresa!',
            ]);
            return trataOperacaoIlegal();
        }

        return compact('qualVeiculo','buscaChecklist','checklistOriginal');
    }

    static function verifica_contrato($veiculosID,$hash_contrato){
        // dd('verifica_contrato');
    }

    static function verifica_contrato_confirma($veiculosID,$hash_contrato,$data){
        // dd('verifica_contrato_confirma');
    }

    static function verificado($veiculosID, $data){
        return Veiculos_Contrato_Repositorie_Campos::verificado($veiculosID, $data);
    }
}