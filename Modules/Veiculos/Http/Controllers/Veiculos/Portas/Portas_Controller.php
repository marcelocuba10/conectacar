<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Portas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Veiculos\Portas\Portas_Repositorie;

class Portas_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Portas_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Portas_Repositorie::create()]);
    }

    public function store(Request $request){
        return Portas_Repositorie::store($request->all());
    }

    public function show(){
        return Portas_Repositorie::index(Portas_Repositorie::show());
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Portas_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Portas_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
