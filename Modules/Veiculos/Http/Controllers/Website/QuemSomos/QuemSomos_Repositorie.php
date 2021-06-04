<?php
namespace Modules\Veiculos\Http\Controllers\Website\QuemSomos;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Website\QuemSomos\QuemSomos_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;
use Illuminate\Support\Facades\DB;

class QuemSomos_Repositorie{

    CONST url = QuemSomos_Repositorie_Campos::url;

    static function index(){
        return QuemSomos_Repositorie_Campos::index();
    }

    static function create(){
        return QuemSomos_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, QuemSomos_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        if( !empty($data['foto']) ){
            $data['foto'] = Tratamentos::trataUpload([
                'pasta' => '/clientes/'.Auth()->user()->emp_id.'/fornecedores/',
                'arquivo' => $data['foto'],
            ]);
        } else {
            unset($data['foto']);
        }

        if( !empty($data['id']) ){
            $ultimo = Model('Veiculos','Cadastros')->where('hash_id', $data['id'])->first();
            $ultimo->update($data);
        } else {
            $data['tipo'] = 'cli';
            $data['modulo'] = Auth()->user()->modulo;
            $data['status_cadastro'] = 1;
            $data['emp_id'] = Auth()->user()->emp_id;

            $ultimo = Model('Veiculos','Cadastros')::create($data);
        }
        
        return direcionaAposConcluir(QuemSomos_Repositorie_Campos::url);
    }

    static function show($url){
        $data = QuemSomos_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return QuemSomos_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        $data = Model('Veiculos','Cadastros')::where('hash_id', $id)->first();
        return Model('Veiculos','Cadastros')::destroy($data['id']);
    }
}