<?php
namespace Modules\Veiculos\Http\Controllers\Configuracoes\Geral;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Configuracoes\Geral\Geral_Repositorie;

class Geral_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.formulario',['dados'=>Geral_Repositorie::create()]);
    }

    public function create(){
        return redirect('/'.strtolower(Auth()->user()->modulo).'/painel');
    }

    public function store(Request $request){
        return Geral_Repositorie::store($request->all());
    }

    public function show(){
        return Geral_Repositorie::show(Geral_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Geral_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Geral_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
