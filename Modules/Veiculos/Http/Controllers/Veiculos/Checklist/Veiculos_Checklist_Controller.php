<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Checklist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Veiculos\Checklist\Veiculos_Checklist_Repositorie;

class Veiculos_Checklist_Controller extends Controller{
    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Veiculos_Checklist_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Veiculos_Checklist_Repositorie::create()]);
        // return view('veiculos::formulario_checklist',['dados'=>Veiculos_Checklist_Repositorie::create()]);
    }

    public function store(Request $request){
        return Veiculos_Checklist_Repositorie::store($request->all());
    }

    public function show(){
        return Veiculos_Checklist_Repositorie::index();
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Veiculos_Checklist_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        return Veiculos_Checklist_Repositorie::destroy($id);
    }
}