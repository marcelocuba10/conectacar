<?php
namespace Modules\Gerenciamento\Http\Controllers\Cadastros\Empresas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Gerenciamento\Http\Controllers\Cadastros\Empresas\Empresas_Repositorie;

class Empresas_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Empresas_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Empresas_Repositorie::create()]);
    }

    public function store(Request $request){
        return Empresas_Repositorie::store($request->all());
    }

    public function show(){
        return Empresas_Repositorie::show(Empresas_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Empresas_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Empresas_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
