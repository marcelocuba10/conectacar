<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Motorizacao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Veiculos\Motorizacao\Motorizacao_Repositorie;

class Motorizacao_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Motorizacao_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Motorizacao_Repositorie::create()]);
    }

    public function store(Request $request){
        return Motorizacao_Repositorie::store($request->all());
    }

    public function show(){
        return Motorizacao_Repositorie::index(Motorizacao_Repositorie::show());
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Motorizacao_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Motorizacao_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
