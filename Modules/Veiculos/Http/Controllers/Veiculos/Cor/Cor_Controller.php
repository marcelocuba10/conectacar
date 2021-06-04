<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Cor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Veiculos\Cor\Cor_Repositorie;

class Cor_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Cor_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Cor_Repositorie::create()]);
    }

    public function store(Request $request){
        return Cor_Repositorie::store($request->all());
    }

    public function show(){
        return Cor_Repositorie::index(Cor_Repositorie::show());
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Cor_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Cor_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
