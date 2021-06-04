<?php
namespace Modules\Veiculos\Http\Controllers\Cadastros\Gerente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Cadastros\Gerente\Gerente_Repositorie;

class Gerente_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Gerente_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Gerente_Repositorie::create()]);
    }

    public function store(Request $request){
        return Gerente_Repositorie::store($request->all());
    }

    public function show(){
        return Gerente_Repositorie::show(Gerente_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Gerente_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Gerente_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
