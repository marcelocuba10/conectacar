<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Veiculos;

use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Veiculos\Veiculos\Veiculos_Repositorie_Campos;
use Hash;

class Veiculos_Repositorie{

    CONST url = Veiculos_Repositorie_Campos::url;

    static function index(){
        return Veiculos_Repositorie_Campos::index();
    }

    static function create(){
        return Veiculos_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Veiculos_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        $moedasDisponiveis = Model('Gerenciamento','MoedasPlataforma')::where('moeda_sigla', configuracoesPadrao()['moeda_padrao'])->first();
        $data['valor'] = currencyToSystemDefaultBD($data['valor'],$moedasDisponiveis['casas_decimais']);
        $data['ativo'] = ( !empty($data['ativo']) ? $data['ativo'] : '0' );

        if( !empty($data['id']) ){
            Model('Veiculos','Veiculos')::where('hash_id', $data['id'])->first()->update($data);
        } else {
            $data = Model('Veiculos','Veiculos')::create($data);
        }

        return direcionaAposConcluir('/veiculos/painel/veiculos/veiculos');
    }

    static function show(){
        $data = Veiculos_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Veiculos_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Veiculos::destroy($id);
    }
}