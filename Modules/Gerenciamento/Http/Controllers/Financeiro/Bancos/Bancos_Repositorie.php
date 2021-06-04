<?php
namespace Modules\Gerenciamento\Http\Controllers\Financeiro\Bancos;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Gerenciamento\Http\Controllers\Financeiro\Bancos\Bancos_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;
use Illuminate\Support\Facades\DB;

class Bancos_Repositorie{

    CONST url = Bancos_Repositorie_Campos::url;

    static function index(){
        return Bancos_Repositorie_Campos::index();
    }

    static function create(){
        return Bancos_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Bancos_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        if( !empty($data['id']) ){
            Model('Gerenciamento','Bancos')::find($data['id'])->update($data);
        } else {
            Model('Gerenciamento','Bancos')::create($data);
        }

        return direcionaAposConcluir(Bancos_Repositorie_Campos::url);
    }

    static function show($url){
        $data = Bancos_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Bancos_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Gerenciamento','Bancos')::destroy($id);
    }
}