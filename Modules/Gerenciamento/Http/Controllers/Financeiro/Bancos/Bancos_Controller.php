<?php
namespace Modules\Gerenciamento\Http\Controllers\Financeiro\Bancos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Gerenciamento\Http\Controllers\Financeiro\Bancos\Bancos_Repositorie;

class Bancos_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Bancos_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Bancos_Repositorie::create()]);
    }

    public function store(Request $request){
        return Bancos_Repositorie::store($request->all());
    }

    public function show(){
        return Bancos_Repositorie::show(Bancos_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Bancos_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Bancos_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
