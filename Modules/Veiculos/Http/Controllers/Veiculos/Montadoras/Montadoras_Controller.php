<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Montadoras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Veiculos\Montadoras\Montadoras_Repositorie;

class Montadoras_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Montadoras_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Montadoras_Repositorie::create()]);
    }

    public function store(Request $request){
        return Montadoras_Repositorie::store($request->all());
    }

    public function show(){
        return Montadoras_Repositorie::index(Montadoras_Repositorie::show());
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Montadoras_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Montadoras_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
