<?php
namespace Modules\Veiculos\Http\Controllers\Financeiro\Bancos;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Financeiro\Bancos\Bancos_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;

class Bancos_Repositorie{

    CONST url = Bancos_Repositorie_Campos::url;

    static function index(){
        return Bancos_Repositorie_Campos::index();
    }

    static function create(){
        return Bancos_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        dd($data);
    }

    static function show(){
        $data = Bancos_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Bancos_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return direcionaAposConcluir(Bancos_Repositorie_Campos::url);
    }

    static function destroy($id){
        return direcionaAposConcluir(Bancos_Repositorie_Campos::url);
    }
}