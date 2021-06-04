<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Cambio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Veiculos\Cambio\Cambio_Repositorie;

class Cambio_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Cambio_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Cambio_Repositorie::create()]);
    }

    public function store(Request $request){
        return Cambio_Repositorie::store($request->all());
    }

    public function show(){
        return Cambio_Repositorie::index(Cambio_Repositorie::show());
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Cambio_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Cambio_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
