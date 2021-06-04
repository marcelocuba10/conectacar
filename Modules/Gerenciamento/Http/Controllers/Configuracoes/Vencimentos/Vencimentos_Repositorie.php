<?php
namespace Modules\Gerenciamento\Http\Controllers\Configuracoes\Vencimentos;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Gerenciamento\Http\Controllers\Configuracoes\Vencimentos\Vencimentos_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;
use Illuminate\Support\Facades\DB;

class Vencimentos_Repositorie{

    CONST url = Vencimentos_Repositorie_Campos::url;

    static function index(){
        return Vencimentos_Repositorie_Campos::index();
    }

    static function create(){
        return Vencimentos_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Vencimentos_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        if( !empty($data['id']) ){
            Model('Veiculos','Configuracoes')::find($data['id'])->update($data);
        } else {
            $data['chave'] = 'data_vencimento_sistema';
            $data['label'] = 'Data do vencimento no sistema';
            $data['campo_form'] = 'number';

            Model('Veiculos','Configuracoes')::create($data);
        }

        return direcionaAposConcluir(Vencimentos_Repositorie_Campos::url);
    }

    static function show($url){
        $data = Vencimentos_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Vencimentos_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Veiculos','Configuracoes')::destroy($id);
    }
}