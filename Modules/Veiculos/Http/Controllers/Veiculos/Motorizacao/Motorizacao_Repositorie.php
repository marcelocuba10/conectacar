<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Motorizacao;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Veiculos\Motorizacao\Motorizacao_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;

class Motorizacao_Repositorie{

    CONST url = Motorizacao_Repositorie_Campos::url;

    static function index(){
        return Motorizacao_Repositorie_Campos::index();
    }

    static function create(){
        return Motorizacao_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Motorizacao_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        $data['tipo'] = 'motorizacao';

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

        return direcionaAposConcluir(Motorizacao_Repositorie_Campos::url);
    }

    static function show(){
        $data = Motorizacao_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Motorizacao_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Veiculos','VeiculosVariacoes')::destroy($id);
    }
}