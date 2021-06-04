<?php
namespace Modules\Gerenciamento\Http\Controllers\Configuracoes\Geral;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Gerenciamento\Http\Controllers\Configuracoes\Geral\Geral_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;
use Illuminate\Support\Facades\DB;

class Geral_Repositorie{

    CONST url = Geral_Repositorie_Campos::url;

    static function index(){
        return Geral_Repositorie_Campos::index();
    }

    static function create(){
        return Geral_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Geral_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        if( !empty($data['id']) ){
            Model('Veiculos','Configuracoes')::find($data['id'])->update($data);
        } else {
            $data['emp_id'] = 0;
            Model('Veiculos','Configuracoes')::create($data);
        }

        return direcionaAposConcluir(Geral_Repositorie_Campos::url);
    }

    static function show($url){
        $data = Geral_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Geral_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Veiculos','Configuracoes')::destroy($id);
    }
}