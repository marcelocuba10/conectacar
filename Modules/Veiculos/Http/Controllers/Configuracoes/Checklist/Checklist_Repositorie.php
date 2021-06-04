<?php
namespace Modules\Veiculos\Http\Controllers\Configuracoes\Checklist;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Configuracoes\Checklist\Checklist_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;
use Illuminate\Support\Facades\DB;

class Checklist_Repositorie{

    CONST url = Checklist_Repositorie_Campos::url;

    static function index(){
        return Checklist_Repositorie_Campos::index();
    }

    static function create(){
        return Checklist_Repositorie_Campos::createorEdit();
    }

    static function store($data){

        $data = FormularioValidacoes::FormularioValidacoes($data, Checklist_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        $data['titulo'] = trataTraducoes($data['titulo']);

        if( !empty($data['id']) ){
            Model('Veiculos','ChecklistConfiguracoes')::find($data['id'])->update($data);
        } else {
            Model('Veiculos','ChecklistConfiguracoes')::create($data);
        }

        return direcionaAposConcluir(Checklist_Repositorie_Campos::url.'/create');
    }

    static function show($url){
        $data = Checklist_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Checklist_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Veiculos','ChecklistConfiguracoes')::destroy($id);
    }
}