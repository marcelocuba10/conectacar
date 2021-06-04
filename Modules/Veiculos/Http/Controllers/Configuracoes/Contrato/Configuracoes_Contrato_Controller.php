<?php
namespace Modules\Veiculos\Http\Controllers\Configuracoes\Contrato;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Configuracoes\Contrato\Configuracoes_Contrato_Repositorie;

class Configuracoes_Contrato_Controller extends Controller{

    public function index(){
        // return pegaDadosContrato();
        return view('temas.inspinia.formulario',['dados'=>Configuracoes_Contrato_Repositorie::create()]);
        // return view('temas.inspinia.listagem',['dados'=>Configuracoes_Contrato_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Configuracoes_Contrato_Repositorie::create()]);
    }

    public function store(Request $request){
        return Configuracoes_Contrato_Repositorie::store($request->all());
    }

    public function show(){
        return Configuracoes_Contrato_Repositorie::show(Configuracoes_Contrato_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Configuracoes_Contrato_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Configuracoes_Contrato_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
