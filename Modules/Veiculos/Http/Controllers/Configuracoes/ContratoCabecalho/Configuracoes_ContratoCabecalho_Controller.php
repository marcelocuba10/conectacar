<?php
namespace Modules\Veiculos\Http\Controllers\Configuracoes\ContratoCabecalho;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Configuracoes\ContratoCabecalho\Configuracoes_ContratoCabecalho_Repositorie;

class Configuracoes_ContratoCabecalho_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.formulario',['dados'=>Configuracoes_ContratoCabecalho_Repositorie::create()]);
        return view('temas.inspinia.listagem',['dados'=>Configuracoes_ContratoCabecalho_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Configuracoes_ContratoCabecalho_Repositorie::create()]);
    }

    public function store(Request $request){
        return Configuracoes_ContratoCabecalho_Repositorie::store($request->all());
    }

    public function show(){
        return Configuracoes_ContratoCabecalho_Repositorie::show(Configuracoes_ContratoCabecalho_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Configuracoes_ContratoCabecalho_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Configuracoes_ContratoCabecalho_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
