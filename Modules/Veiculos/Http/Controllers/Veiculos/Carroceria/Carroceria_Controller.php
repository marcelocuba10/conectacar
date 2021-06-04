<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Carroceria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Veiculos\Carroceria\Carroceria_Repositorie;

class Carroceria_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Carroceria_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Carroceria_Repositorie::create()]);
    }

    public function store(Request $request){
        return Carroceria_Repositorie::store($request->all());
    }

    public function show(){
        return Carroceria_Repositorie::index(Carroceria_Repositorie::show());
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Carroceria_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Carroceria_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
