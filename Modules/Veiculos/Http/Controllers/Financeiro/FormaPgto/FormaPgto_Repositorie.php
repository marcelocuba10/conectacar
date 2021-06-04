<?php
namespace Modules\Veiculos\Http\Controllers\Financeiro\FormaPgto;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Financeiro\FormaPgto\FormaPgto_Repositorie_Campos;

class FormaPgto_Repositorie{

    CONST url = FormaPgto_Repositorie_Campos::url;

    static function index(){
        return FormaPgto_Repositorie_Campos::index();
    }

    static function create(){
        return FormaPgto_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, FormaPgto_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        $data['tipo'] = 'formas_pgto';

        if( !empty($data['id']) ){
            Model('Veiculos','VeiculosFinanceiroTipo')::find($data['id'])->update($data);
        } else {
            Model('Veiculos','VeiculosFinanceiroTipo')::create($data);
        }

        $direciona = ( !empty($data['direciona']) ? '/create' : Null );

        return direcionaAposConcluir(FormaPgto_Repositorie_Campos::url.$direciona);
    }

    static function show(){
        $data = FormaPgto_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return FormaPgto_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Veiculos','VeiculosFinanceiroTipo')::destroy($id);
    }
}