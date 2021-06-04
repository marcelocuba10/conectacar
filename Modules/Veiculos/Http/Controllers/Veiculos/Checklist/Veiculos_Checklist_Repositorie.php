<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Checklist;

use App\Repositories\Tratamentos;
use App\Repositories\Componentes;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Veiculos\Checklist\Veiculos_Checklist_Repositorie_Campos;
use Hash;

class Veiculos_Checklist_Repositorie{

    CONST url = Veiculos_Checklist_Repositorie_Campos::url;

    static function index(){
        return Veiculos_Checklist_Repositorie_Campos::index();
    }

    static function create(){
        return Veiculos_Checklist_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Veiculos_Checklist_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        if( !empty($data['id']) ){
            Model('Veiculos','ChecklistConfiguracoes')::find($data['id'])->update($data);
        } else {
            Model('Veiculos','ChecklistConfiguracoes')::create($data);
        }

        return direcionaAposConcluir(Veiculos_Checklist_Repositorie::url);
    }

    static function show(){
        $data = Veiculos_Checklist_Repositorie_Campos::index();
        return compact('data');
    }

    static function edit($id){
        return Veiculos_Checklist_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Veiculos','ChecklistConfiguracoes')::destroy($id);
    }
}