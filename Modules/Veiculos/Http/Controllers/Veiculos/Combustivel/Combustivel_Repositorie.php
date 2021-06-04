<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Combustivel;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Veiculos\Combustivel\Combustivel_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;

class Combustivel_Repositorie{

    CONST url = Combustivel_Repositorie_Campos::url;

    static function index(){
        return Combustivel_Repositorie_Campos::index();
    }

    static function create(){
        return Combustivel_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Combustivel_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        $data['tipo'] = 'combustivel';

        if( !empty($data['id']) ){
            $consulta = Model('Veiculos','VeiculosVariacoes')::where('emp_id', Auth()->user()->emp_id)->find($data['id']);
            if( empty($consulta) ){
                return trataOperacaoIlegal();
                dd();
            }
            $consulta->update($data);
        } else {
            Model('Veiculos','VeiculosVariacoes')::create($data);
        }

        return direcionaAposConcluir(Combustivel_Repositorie_Campos::url);
    }

    static function show(){
        $data = Combustivel_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Combustivel_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Veiculos','VeiculosVariacoes')::destroy($id);
    }
}