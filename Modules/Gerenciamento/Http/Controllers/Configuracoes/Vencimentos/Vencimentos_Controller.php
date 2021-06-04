<?php
namespace Modules\Gerenciamento\Http\Controllers\Configuracoes\Vencimentos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Gerenciamento\Http\Controllers\Configuracoes\Vencimentos\Vencimentos_Repositorie;

class Vencimentos_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Vencimentos_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Vencimentos_Repositorie::create()]);
    }

    public function store(Request $request){
        return Vencimentos_Repositorie::store($request->all());
    }

    public function show(){
        return Vencimentos_Repositorie::show(Vencimentos_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Vencimentos_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Vencimentos_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
