<?php
namespace Modules\Veiculos\Http\Controllers\Cadastros\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Cadastros\Usuarios\Usuarios_Repositorie;

class Usuarios_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Usuarios_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Usuarios_Repositorie::create()]);
    }

    public function store(Request $request){
        return Usuarios_Repositorie::store($request->all());
    }

    public function show(){
        return Usuarios_Repositorie::index(Usuarios_Repositorie::show());
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Usuarios_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Usuarios_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
