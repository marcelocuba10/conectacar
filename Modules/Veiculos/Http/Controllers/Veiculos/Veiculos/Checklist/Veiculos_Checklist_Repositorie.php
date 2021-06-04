<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Veiculos\Checklist;

use App\Repositories\Tratamentos;
use App\Repositories\Componentes;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Veiculos\Veiculos\Checklist\Veiculos_Checklist_Repositorie_Campos;
use Hash;

class Veiculos_Checklist_Repositorie{

    CONST url = Veiculos_Checklist_Repositorie_Campos::url;

    static function index($veiculosID){
        return Veiculos_Checklist_Repositorie_Campos::index($veiculosID);
    }

    static function create($veiculosID){
        return Veiculos_Checklist_Repositorie_Campos::createorEdit($veiculosID);
    }

    static function store($veiculosID, $data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Veiculos_Checklist_Repositorie_Campos::createorEdit($veiculosID)['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        $qualVeiculo = Model('Veiculos','Veiculos')::where('hash_id', $veiculosID)->first();

        if( empty($qualVeiculo) ){
            echo exibeToastrAlerta([
                'cor' => 'warning',
                'titulo' => 'Atenção',
                'mensagem' => 'Você deve informar um veículo que seja de sua empresa!',
            ]);
            return trataOperacaoIlegal();
        }

        $itensVerificados = Model('Veiculos','ChecklistConfiguracoes')::get();
        Model('Veiculos','VeiculosChecklist')::create([
            'veiculo_id' => $qualVeiculo['id'],
            'retorno' => json_encode($data),
            
 => Tratamentos::blockchain($data),
        ]);

        $urlCompleta = str_replace('{veiculosID}', $veiculosID, Veiculos_Checklist_Repositorie_Campos::url);
        return direcionaAposConcluir($urlCompleta);
    }

    static function show($veiculosID){
        $data = Veiculos_Checklist_Repositorie_Campos::index($veiculosID);
        return compact('data');
    }

    static function edit($veiculosID, $id){
        return Veiculos_Checklist_Repositorie_Campos::createorEdit($veiculosID, $id);
    }

    static function update($veiculosID, Request $request, $id){
        return 'update';
    }

    static function destroy($veiculosID, $id){
        $data = Model('Veiculos','Veiculos')::where('hash_id',$veiculosID)->first();
        $data = Model('Veiculos','VeiculosChecklist')::where('veiculo_id',$data['id'])->where('id',$id)->first();
        return Model('Veiculos','VeiculosChecklist')::destroy($data['id']);
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























    // static function checklist($id){
    //     return Veiculos_Checklist_Repositorie_Campos::checklist($id);
    // }

    // static function checklist_show($id){
    //     $data = Veiculos_Checklist_Repositorie_Campos::checklist_show($id);
    //     return compact('data');

    // }

    // static function contrato($id){
    //     return Veiculos_Checklist_Repositorie_Campos::contrato($id);
    // }

    // static function contrato_show($id){
    //     $data = Veiculos_Checklist_Repositorie_Campos::contrato_show($id);
    //     return compact('data');
    // }

    // static function lucro($id){
    //     return Veiculos_Checklist_Repositorie_Campos::lucro($id);
    // }

    // static function lucro_show($id){
    //     $data = Veiculos_Checklist_Repositorie_Campos::lucro_show($id);
    //     return compact('data');
    // }
}