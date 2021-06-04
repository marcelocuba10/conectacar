<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Tipos;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Veiculos\Tipos\Tipos_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;

class Tipos_Repositorie{

    CONST url = Tipos_Repositorie_Campos::url;

    static function index(){
        return Tipos_Repositorie_Campos::index();
    }

    static function create(){
        return Tipos_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Tipos_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        $data['tipo'] = 'tipos';

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

        return direcionaAposConcluir(Tipos_Repositorie_Campos::url);
    }

    static function show(){
        $data = Tipos_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Tipos_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Veiculos','VeiculosVariacoes')::destroy($id);
    }
}