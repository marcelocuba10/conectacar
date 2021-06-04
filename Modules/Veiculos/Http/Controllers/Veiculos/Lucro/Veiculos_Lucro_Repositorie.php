<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Lucro;

use App\Repositories\Tratamentos;
use App\Repositories\Componentes;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Veiculos\Lucro\Veiculos_Lucro_Repositorie_Campos;
use Hash;

class Veiculos_Lucro_Repositorie{

    CONST url = Veiculos_Lucro_Repositorie_Campos::url;

    static function index($veiculosID){
        return Veiculos_Lucro_Repositorie_Campos::index($veiculosID);
    }

    static function create($veiculosID){
        return Veiculos_Lucro_Repositorie_Campos::createorEdit($veiculosID);
    }

    static function store($veiculosID, $data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Veiculos_Lucro_Repositorie_Campos::createorEdit($veiculosID)['formRequest']);
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

        $novoitem['veiculo_id'] = $qualVeiculo['id'];
        $novoitem['tipo'] = $data['tipo'];
        $novoitem['valor'] = currencyToSystemDefaultBD($data['valor'],2);

        Model('Veiculos','VeiculosValores')::create($novoitem);

        $urlCompleta = str_replace('{veiculosID}', $veiculosID, Veiculos_Lucro_Repositorie_Campos::url);
        return direcionaAposConcluir($urlCompleta);
    }

    static function show($veiculosID){
        $data = Veiculos_Lucro_Repositorie_Campos::index($veiculosID);
        return compact('data');
    }

    static function edit($veiculosID, $id){
        return Veiculos_Lucro_Repositorie_Campos::createorEdit($veiculosID, $id);
    }

    static function update($veiculosID, Request $request, $id){
        return 'update';
    }

    static function destroy($veiculosID, $id){
        $qualVeiculo = Model('Veiculos','Veiculos')::where('hash_id', $veiculosID)->first();
        $qualRegistro = Model('Veiculos','VeiculosValores')::where('veiculo_id', $qualVeiculo['id'])->where('id', $id)->first();
        return Model('Veiculos','VeiculosValores')::destroy($qualRegistro['id']);
    }
}