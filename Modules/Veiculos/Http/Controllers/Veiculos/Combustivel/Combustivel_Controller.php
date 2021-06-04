<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Combustivel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Veiculos\Combustivel\Combustivel_Repositorie;

class Combustivel_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Combustivel_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Combustivel_Repositorie::create()]);
    }

    public function store(Request $request){
        return Combustivel_Repositorie::store($request->all());
    }

    public function show(){
        return Combustivel_Repositorie::index(Combustivel_Repositorie::show());
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Combustivel_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Combustivel_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
