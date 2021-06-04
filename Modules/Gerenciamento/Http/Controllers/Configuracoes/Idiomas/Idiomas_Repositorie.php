<?php
namespace Modules\Gerenciamento\Http\Controllers\Configuracoes\Idiomas;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Gerenciamento\Http\Controllers\Configuracoes\Idiomas\Idiomas_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;
use Illuminate\Support\Facades\DB;

class Idiomas_Repositorie{

    CONST url = Idiomas_Repositorie_Campos::url;

    static function index(){
        return Idiomas_Repositorie_Campos::index();
    }

    static function create(){
        return Idiomas_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Idiomas_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        if( !empty($data['bandeira']) ){
            $data['bandeira'] = Tratamentos::trataUpload([
                'pasta' => '/temas/inspinia/img/flags',
                'arquivo' => $data['bandeira'],
            ]);
        } else {
            unset($data['bandeira']);
        }

        if( !empty($data['id']) ){
            Model('Gerenciamento','Idiomas')::find($data['id'])->update($data);
        } else {
            Model('Gerenciamento','Idiomas')::create($data);
        }

        return direcionaAposConcluir(Idiomas_Repositorie_Campos::url);
    }

    static function show($url){
        $data = Idiomas_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Idiomas_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Gerenciamento','Idiomas')::destroy($id);
    }
}