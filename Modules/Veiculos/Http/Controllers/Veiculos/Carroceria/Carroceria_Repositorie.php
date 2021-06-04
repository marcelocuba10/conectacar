<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Carroceria;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Veiculos\Carroceria\Carroceria_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;

class Carroceria_Repositorie{

    CONST url = Carroceria_Repositorie_Campos::url;

    static function index(){
        return Carroceria_Repositorie_Campos::index();
    }

    static function create(){
        return Carroceria_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Carroceria_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        $data['tipo'] = 'carroceria';

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

        return direcionaAposConcluir(Carroceria_Repositorie_Campos::url);
    }

    static function show(){
        $data = Carroceria_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Carroceria_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Veiculos','VeiculosVariacoes')::destroy($id);
    }
}