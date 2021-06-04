<?php
namespace Modules\Veiculos\Http\Controllers\Cadastros\Clientes;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Veiculos\Http\Controllers\Cadastros\Clientes\Clientes_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;
use Illuminate\Support\Facades\DB;

class Clientes_Repositorie{

    CONST url = Clientes_Repositorie_Campos::url;

    static function index(){
        return Clientes_Repositorie_Campos::index();
    }

    static function create(){
        return Clientes_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Clientes_Repositorie_Campos::createorEdit()['formRequest']);
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
            $ultimo = Model('Veiculos','Cadastros')->where('hash_id', $data['id'])->first();
            $ultimo->update($data);
        } else {
            $data['tipo'] = 'cli';
            $data['modulo'] = Auth()->user()->modulo;
            $data['status_cadastro'] = 1;
            $data['emp_id'] = Auth()->user()->emp_id;

            $ultimo = Model('Veiculos','Cadastros')::create($data);
        }
        
        return direcionaAposConcluir(Clientes_Repositorie_Campos::url);
    }

    static function show($url){
        $data = Clientes_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Clientes_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        $data = Model('Veiculos','Cadastros')::where('hash_id', $id)->first();
        return Model('Veiculos','Cadastros')::destroy($data['id']);
    }
}