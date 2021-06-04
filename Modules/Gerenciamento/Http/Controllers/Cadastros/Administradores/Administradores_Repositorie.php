<?php
namespace Modules\Gerenciamento\Http\Controllers\Cadastros\Administradores;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Gerenciamento\Http\Controllers\Cadastros\Administradores\Administradores_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;
use Illuminate\Support\Facades\DB;

class Administradores_Repositorie{

    CONST url = Administradores_Repositorie_Campos::url;

    static function index(){
        return Administradores_Repositorie_Campos::index();
    }

    static function create(){
        return Administradores_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Administradores_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        if( !empty($data['password']) ){
            $data['password'] = Hash::make($data['password']);
            unset($data['re-password']);
        } else {
            unset($data['password']);
        }

        if( !empty($data['id']) ){
            $qualUsuario = Model('Gerenciamento','Users')->where('hash_id', $data['id'])->first();
            $data['hash_id'] = Tratamentos::blockchain($data);
            $qualUsuario->update($data);
        } else {
            $data['emp_id'] = Auth()->user()->emp_id;
            $data['modulo'] = Auth()->user()->modulo;
            $data['nivel'] = 'adm';
            $data['status_cadastro'] = 1;

            $ultimo = Model('Gerenciamento','Users')::create($data);
            $data['users_id'] = $ultimo['id'];
        }

        return direcionaAposConcluir(Administradores_Repositorie_Campos::url);
    }

    static function show($url){
        $data = Administradores_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Administradores_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Users')::destroy($id);
    }
}