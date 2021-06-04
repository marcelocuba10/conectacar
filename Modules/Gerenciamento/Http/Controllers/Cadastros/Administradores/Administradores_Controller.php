<?php
namespace Modules\Gerenciamento\Http\Controllers\Cadastros\Administradores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Gerenciamento\Http\Controllers\Cadastros\Administradores\Administradores_Repositorie;

class Administradores_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Administradores_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Administradores_Repositorie::create()]);
    }

    public function store(Request $request){
        return Administradores_Repositorie::store($request->all());
    }

    public function show(){
        return Administradores_Repositorie::show(Administradores_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Administradores_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Administradores_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
