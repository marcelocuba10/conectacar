<?php
namespace Modules\Veiculos\Http\Controllers\Configuracoes\Configuracoes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Configuracoes\Configuracoes\Configuracoes_Repositorie;

class Configuracoes_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.formulario',['dados'=>Configuracoes_Repositorie::create()]);
    }

    public function create(){
        return '';
    }

    public function store(Request $request){
        return Configuracoes_Repositorie::store($request->except('_token','botaoEnviar'));
    }

    public function show(){
        return Configuracoes_Repositorie::show(Configuracoes_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Configuracoes_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Configuracoes_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
