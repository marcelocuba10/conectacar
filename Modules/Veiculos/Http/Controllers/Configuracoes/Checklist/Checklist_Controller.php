<?php
namespace Modules\Veiculos\Http\Controllers\Configuracoes\Checklist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Configuracoes\Checklist\Checklist_Repositorie;

class Checklist_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Checklist_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Checklist_Repositorie::create()]);
    }

    public function store(Request $request){
        return Checklist_Repositorie::store($request->except('_token'));
    }

    public function show(){
        return Checklist_Repositorie::show(Checklist_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Checklist_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Checklist_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
