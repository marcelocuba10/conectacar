<?php
namespace Modules\Veiculos\Http\Controllers\Website\QuemSomos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Website\QuemSomos\QuemSomos_Repositorie;

class QuemSomos_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.website',['dados'=>QuemSomos_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>QuemSomos_Repositorie::create()]);
    }

    public function store(Request $request){
        return QuemSomos_Repositorie::store($request->all());
    }

    public function show(){
        return QuemSomos_Repositorie::show(QuemSomos_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>QuemSomos_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = QuemSomos_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
