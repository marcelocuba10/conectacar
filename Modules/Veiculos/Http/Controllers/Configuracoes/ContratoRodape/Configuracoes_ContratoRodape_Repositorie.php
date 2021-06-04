<?php
namespace Modules\Veiculos\Http\Controllers\Configuracoes\ContratoRodape;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Configuracoes\ContratoRodape\Configuracoes_ContratoRodape_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;
use Illuminate\Support\Facades\DB;

class Configuracoes_ContratoRodape_Repositorie{

    CONST url = Configuracoes_ContratoRodape_Repositorie_Campos::url;

    static function index(){
        return Configuracoes_ContratoRodape_Repositorie_Campos::index();
    }

    static function create(){
        return Configuracoes_ContratoRodape_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Configuracoes_ContratoRodape_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        Model('Veiculos','Documentos')::where('tipo', 'Rodape')->first()->update(['conteudo' => $data['conteudo']]);
        return direcionaAposConcluir(Configuracoes_ContratoRodape_Repositorie_Campos::url);
    }

    static function show($url){
        $data = Configuracoes_ContratoRodape_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Configuracoes_ContratoRodape_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Veiculos','Documentos')::destroy($id);
    }
}