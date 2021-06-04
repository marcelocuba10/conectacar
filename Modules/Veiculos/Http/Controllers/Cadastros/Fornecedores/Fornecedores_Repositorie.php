<?php
namespace Modules\Veiculos\Http\Controllers\Cadastros\Fornecedores;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Cadastros\Fornecedores\Fornecedores_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;
use Illuminate\Support\Facades\DB;

class Fornecedores_Repositorie{

    CONST url = Fornecedores_Repositorie_Campos::url;

    static function index(){
        return Fornecedores_Repositorie_Campos::index();
    }

    static function create(){
        return Fornecedores_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Fornecedores_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        validaSeEmailJaExiste($data,'Veiculos|Cadastros');

        if( !empty($data['foto']) ){
            $data['foto'] = Tratamentos::trataUpload([
                'pasta' => '/clientes/'.Auth()->user()->emp_id.'/fornecedores/',
                'arquivo' => $data['foto'],
            ]);
        } else {
            unset($data['foto']);
        }

        if( !empty($data['id']) ){
            $qualUsuario = Model('Veiculos','Cadastros')->where('hash_id', $data['id'])->first();
            $data['hash_id'] = Tratamentos::blockchain($data);
            $qualUsuario->update($data);
        } else {
            $data['tipo'] = 'for';
            $data['modulo'] = Auth()->user()->modulo;
            $data['status_cadastro'] = 1;
            $data['emp_id'] = Auth()->user()->emp_id;

            $ultimo = Model('Veiculos','Cadastros')::create($data);
        }
        return direcionaAposConcluir(Fornecedores_Repositorie_Campos::url);
    }

    static function show($url){
        $data = Fornecedores_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Fornecedores_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        $data = Model('Veiculos','Cadastros')::where('hash_id', $id)->first();
        return Model('Veiculos','Cadastros')::destroy($data['id']);
    }
}