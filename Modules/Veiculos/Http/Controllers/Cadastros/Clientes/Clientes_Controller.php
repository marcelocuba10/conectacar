<?php
namespace Modules\Veiculos\Http\Controllers\Cadastros\Clientes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Cadastros\Clientes\Clientes_Repositorie;

class Clientes_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Clientes_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Clientes_Repositorie::create()]);
    }

    public function store(Request $request){
        return Clientes_Repositorie::store($request->all());
    }

    public function show(){
        return Clientes_Repositorie::show(Clientes_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Clientes_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Clientes_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
