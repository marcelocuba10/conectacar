<?php
namespace Modules\Gerenciamento\Http\Controllers\Financeiro\Pagar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Gerenciamento\Http\Controllers\Financeiro\Pagar\ContasPagar_Repositorie;

class ContasPagar_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>ContasPagar_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>ContasPagar_Repositorie::create()]);
    }

    public function store(Request $request){
        return ContasPagar_Repositorie::store($request->all());
    }

    public function show(){
        return ContasPagar_Repositorie::show(ContasPagar_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>ContasPagar_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = ContasPagar_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
