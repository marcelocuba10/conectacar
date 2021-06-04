<?php
namespace Modules\Gerenciamento\Http\Controllers\Cadastros\Empresas;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Gerenciamento\Http\Controllers\Cadastros\Empresas\Empresas_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;
use Illuminate\Support\Facades\DB;

class Empresas_Repositorie{

    CONST url = Empresas_Repositorie_Campos::url;

    static function index(){
        return Empresas_Repositorie_Campos::index();
    }

    static function create(){
        return Empresas_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Empresas_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        if( validaNomeFantasia($data['nome_fantasia'],( !empty($data['id']) ? $data['id'] : Null )) > 0 ){
            echo exibeToastrAlerta([
                'cor' => 'warning',
                'titulo' => 'Atenção',
                'mensagem' => 'Nome externo já está em uso.<br>Escolha um nome diferente e tente novamente',
            ]);
            dd();
        }

        if( !empty($data['re-password']) ){
            unset($data['re-password']);
            $data['password'] = bcrypt($data['password']);
        }

        if( !empty($data['foto']) ){
            $data['foto'] = Tratamentos::trataUpload([
                'pasta' => '/clientes/'.Auth()->user()->emp_id.'/images/',
                'arquivo' => $data['foto'],
            ]);
        }

        $data['root'] = 0;
        $data['nivel'] = 'emp';
        $data['hash_id'] = Tratamentos::blockchain($data);


        if( !empty($data['id']) ){
            Model('Gerenciamento','UsersSemRelacionamentos')->where('hash_id', $data['id'])->first()->update($data);
        } else {
            $data['modulo'] = 'Veiculos';
            $ultimo = Model('Gerenciamento','UsersSemRelacionamentos')::create($data);
            Model('Gerenciamento','UsersDados')::find($ultimo['id'])->update($data);
            
            $ultimo->update(['emp_id' => $ultimo['id']]);
        }

        return direcionaAposConcluir(Empresas_Repositorie_Campos::url);
    }

    static function show($url){
        $data = Empresas_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Empresas_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Gerenciamento','Users')::destroy($id);
    }
}