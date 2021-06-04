<?php
namespace Modules\Veiculos\Http\Controllers\Configuracoes\Contrato;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Configuracoes\Contrato\Configuracoes_Contrato_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;
use Illuminate\Support\Facades\DB;

class Configuracoes_Contrato_Repositorie{

    CONST url = Configuracoes_Contrato_Repositorie_Campos::url;

    static function index(){
        return Configuracoes_Contrato_Repositorie_Campos::index();
    }

    static function create(){
        return Configuracoes_Contrato_Repositorie_Campos::createorEdit();
    }

    static function store($data){

        $contratoAtual = Model('Veiculos','Documentos')::where('tipo', 'contrato')->first();
        if( empty($contratoAtual) ){
            $data['tipo'] = 'contrato';
            Model('Veiculos','Documentos')::create($data);
        } else {
            $contratoAtual->update($data);
        }

        return direcionaAposConcluir(Configuracoes_Contrato_Repositorie_Campos::url);
    }

    static function show($url){
        $data = Configuracoes_Contrato_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Configuracoes_Contrato_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Veiculos','Documentos')::destroy($id);
    }
}