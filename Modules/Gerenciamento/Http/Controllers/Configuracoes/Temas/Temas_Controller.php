<?php
namespace Modules\Gerenciamento\Http\Controllers\Configuracoes\Temas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Gerenciamento\Http\Controllers\Configuracoes\Temas\Temas_Repositorie;

class Temas_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>Temas_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Temas_Repositorie::create()]);
    }

    public function store(Request $request){
        return Temas_Repositorie::store($request->all());
    }

    public function show(){
        return Temas_Repositorie::show(Temas_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Temas_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Temas_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
