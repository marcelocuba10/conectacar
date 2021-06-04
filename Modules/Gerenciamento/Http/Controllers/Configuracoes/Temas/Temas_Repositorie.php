<?php
namespace Modules\Gerenciamento\Http\Controllers\Configuracoes\Temas;

use App\Repositories\CamposSistema;
use App\Repositories\FormularioRepositorie;
use App\Repositories\FormularioValidacoes;
use Modules\Gerenciamento\Http\Controllers\Configuracoes\Temas\Temas_Repositorie_Campos;
use App\Repositories\Tratamentos;
use Hash;
use Illuminate\Support\Facades\DB;

class Temas_Repositorie{

    CONST url = Temas_Repositorie_Campos::url;

    static function index(){
        return Temas_Repositorie_Campos::index();
    }

    static function create(){
        return Temas_Repositorie_Campos::createorEdit();
    }

    static function store($data){
        $data = FormularioValidacoes::FormularioValidacoes($data, Temas_Repositorie_Campos::createorEdit()['formRequest']);
        if( is_string($data) ){
            return $data;
        }

        if( !empty($data['pacote']) ){
            $data['pacote'] = Tratamentos::trataUpload([
                'pasta' => '/temas/zip',
                'arquivo' => $data['pacote'],
                'validacoes' => ['zip'],
            ]);

            if( is_string($data['pacote']) ){
                return $data['pacote'];
            }
        }

        if( !empty($data['capa']) ){
            $data['capa'] = Tratamentos::trataUpload([
                'pasta' => '/temas',
                'arquivo' => $data['capa'],
            ]);

            if( is_string($data['capa']) ){
                return $data['capa'];
            }
        }

        dd($data);

        if( !empty($data['id']) ){
            Model('Gerenciamento','Temas')::find($data['id'])->update($data);
        } else {
            Model('Gerenciamento','Temas')::create($data);
        }

        return direcionaAposConcluir(Temas_Repositorie_Campos::url);
    }

    static function show($url){
        $data = Temas_Repositorie_Campos::index()['data'];
        return compact('data');
    }

    static function edit($id){
        return Temas_Repositorie_Campos::createorEdit($id);
    }

    static function update(Request $request, $id){
        return 'update';
    }

    static function destroy($id){
        return Model('Gerenciamento','Temas')::destroy($id);
    }
}