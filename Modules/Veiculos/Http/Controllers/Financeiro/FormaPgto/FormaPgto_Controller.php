<?php
namespace Modules\Veiculos\Http\Controllers\Financeiro\FormaPgto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Financeiro\FormaPgto\FormaPgto_Repositorie;

class FormaPgto_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>FormaPgto_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>FormaPgto_Repositorie::create()]);
    }

    public function store(Request $request){
        return FormaPgto_Repositorie::store($request->all());
    }

    public function show(){
        return FormaPgto_Repositorie::index(FormaPgto_Repositorie::show());
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>FormaPgto_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = FormaPgto_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
