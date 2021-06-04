<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Veiculos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Veiculos\Veiculos\Veiculos_Repositorie;

class Veiculos_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Veiculos_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Veiculos_Repositorie::create()]);
    }

    public function store(Request $request){
        return Veiculos_Repositorie::store($request->all());
    }

    public function show(){
        return Veiculos_Repositorie::index(Veiculos_Repositorie::show());
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Veiculos_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Veiculos_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
