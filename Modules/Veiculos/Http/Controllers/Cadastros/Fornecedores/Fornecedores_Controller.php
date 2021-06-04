<?php
namespace Modules\Veiculos\Http\Controllers\Cadastros\Fornecedores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Cadastros\Fornecedores\Fornecedores_Repositorie;

class Fornecedores_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Fornecedores_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Fornecedores_Repositorie::create()]);
    }

    public function store(Request $request){
        return Fornecedores_Repositorie::store($request->all());
    }

    public function show(){
        return Fornecedores_Repositorie::show(Fornecedores_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Fornecedores_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Fornecedores_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
