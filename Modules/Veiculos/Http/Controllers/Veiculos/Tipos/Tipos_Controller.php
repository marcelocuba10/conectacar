<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Tipos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Veiculos\Tipos\Tipos_Repositorie;

class Tipos_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Tipos_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Tipos_Repositorie::create()]);
    }

    public function store(Request $request){
        return Tipos_Repositorie::store($request->all());
    }

    public function show(){
        return Tipos_Repositorie::index(Tipos_Repositorie::show());
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Tipos_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Tipos_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
