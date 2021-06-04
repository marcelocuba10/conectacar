<?php
namespace Modules\Veiculos\Http\Controllers\Cadastros\Gerente;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Cadastros\Gerente\Gerente_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;

class Gerente_Repositorie{

    CONST url = Gerente_Repositorie_Campos::url;

    static function index(){
        return Gerente_Repositorie_Campos::index();
    }

    static function create(){
        return Gerente_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Gerente_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        validaSeEmailJaExiste($data);
        verificaSenhaIgual($data);

        if( !empty($data['password']) ){
            $data['password'] = Hash::make($data['password']);
            unset($data['re-password']);
        } else {
            unset($data['password']);
        }

        $data['nivel'] = 'emp';
        $data['modulo'] = Auth()->user()->modulo;
        $data['status_cadastro'] = 1;
        $data['emp_id'] = Auth()->user()->emp_id;

        if( !empty($data['id']) ){
            $qualUsuario = Model('Gerenciamento','UsersSemRelacionamentos')->where('hash_id', $data['id'])->first();
            $qualUsuario->update($data);
            $qualDado = Model('Gerenciamento','UsersDados')::find($qualUsuario['id']);
            unset($data['id']);
            $qualDado->update($data);
        } else {
            $data['hash_id'] = Tratamentos::blockchain($data);
            $ultimo = Model('Gerenciamento','UsersSemRelacionamentos')::create($data);
            Model('Gerenciamento','UsersDados')::find($ultimo['id'])->update($data);
        }

        return direcionaAposConcluir(Gerente_Repositorie_Campos::url);
    }

    static function show($url){
        $data = Gerente_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Gerente_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        $data = Model('Gerenciamento','UsersSemRelacionamentos')::where('hash_id', $id)->first();
        return Model('Gerenciamento','UsersSemRelacionamentos')::destroy($data['id']);
    }
}