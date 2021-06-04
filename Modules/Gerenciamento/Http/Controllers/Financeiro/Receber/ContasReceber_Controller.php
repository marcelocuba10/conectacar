<?php
namespace Modules\Gerenciamento\Http\Controllers\Financeiro\Receber;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Gerenciamento\Http\Controllers\Financeiro\Receber\ContasReceber_Repositorie;

class ContasReceber_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>ContasReceber_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>ContasReceber_Repositorie::create()]);
    }

    public function store(Request $request){
        return ContasReceber_Repositorie::store($request->all());
    }

    public function show(){
        return ContasReceber_Repositorie::show(ContasReceber_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>ContasReceber_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = ContasReceber_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
