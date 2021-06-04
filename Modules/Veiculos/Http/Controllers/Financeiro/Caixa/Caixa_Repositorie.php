<?php
namespace Modules\Veiculos\Http\Controllers\Financeiro\Caixa;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Financeiro\Caixa\Caixa_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;

class Caixa_Repositorie{

    CONST url = Caixa_Repositorie_Campos::url;

    static function index(){
        return Caixa_Repositorie_Campos::index();
    }

    static function create(){
        return Caixa_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        return direcionaAposConcluir(Caixa_Repositorie_Campos::url);
    }

    static function show(){
        $data = Caixa_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Caixa_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return direcionaAposConcluir(Caixa_Repositorie_Campos::url);
    }

    static function destroy($id){
        return direcionaAposConcluir(Caixa_Repositorie_Campos::url);
    }
}