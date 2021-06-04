<?php
namespace Modules\Gerenciamento\Http\Controllers\Configuracoes\Moedas;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Gerenciamento\Http\Controllers\Configuracoes\Moedas\Moedas_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;
use Illuminate\Support\Facades\DB;

class Moedas_Repositorie{

    CONST url = Moedas_Repositorie_Campos::url;

    static function index(){
        return Moedas_Repositorie_Campos::index();
    }

    static function create(){
        return Moedas_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Moedas_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        if( !empty($data['id']) ){
            Model('Gerenciamento','MoedasPlataforma')::find($data['id'])->update($data);
        } else {
            Model('Gerenciamento','MoedasPlataforma')::create($data);
        }

        return direcionaAposConcluir(Moedas_Repositorie_Campos::url);
    }

    static function show($url){
        $data = Moedas_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Moedas_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Gerenciamento','MoedasPlataforma')::destroy($id);
    }
}