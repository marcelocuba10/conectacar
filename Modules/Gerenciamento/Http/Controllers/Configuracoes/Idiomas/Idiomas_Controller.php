<?php
namespace Modules\Gerenciamento\Http\Controllers\Configuracoes\Idiomas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Gerenciamento\Http\Controllers\Configuracoes\Idiomas\Idiomas_Repositorie;

class Idiomas_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Idiomas_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Idiomas_Repositorie::create()]);
    }

    public function store(Request $request){
        return Idiomas_Repositorie::store($request->all());
    }

    public function show(){
        return Idiomas_Repositorie::show(Idiomas_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Idiomas_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Idiomas_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
