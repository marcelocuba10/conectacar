<?php
namespace Modules\Gerenciamento\Http\Controllers\Configuracoes\Moedas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Gerenciamento\Http\Controllers\Configuracoes\Moedas\Moedas_Repositorie;

class Moedas_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Moedas_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Moedas_Repositorie::create()]);
    }

    public function store(Request $request){
        return Moedas_Repositorie::store($request->all());
    }

    public function show(){
        return Moedas_Repositorie::show(Moedas_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Moedas_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Moedas_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
