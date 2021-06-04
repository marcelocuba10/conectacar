<?php
namespace Modules\Veiculos\Http\Controllers\Configuracoes\ContratoRodape;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Configuracoes\ContratoRodape\Configuracoes_ContratoRodape_Repositorie;

class Configuracoes_ContratoRodape_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.formulario',['dados'=>Configuracoes_ContratoRodape_Repositorie::create()]);
        return view('temas.inspinia.listagem',['dados'=>Configuracoes_ContratoRodape_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Configuracoes_ContratoRodape_Repositorie::create()]);
    }

    public function store(Request $request){
        return Configuracoes_ContratoRodape_Repositorie::store($request->all());
    }

    public function show(){
        return Configuracoes_ContratoRodape_Repositorie::show(Configuracoes_ContratoRodape_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Configuracoes_ContratoRodape_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Configuracoes_ContratoRodape_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
