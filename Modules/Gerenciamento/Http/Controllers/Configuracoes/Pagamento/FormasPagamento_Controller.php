<?php
namespace Modules\Gerenciamento\Http\Controllers\Configuracoes\Pagamento;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Gerenciamento\Http\Controllers\Configuracoes\Pagamento\FormasPagamento_Repositorie;

class FormasPagamento_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>FormasPagamento_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>FormasPagamento_Repositorie::create()]);
    }

    public function store(Request $request){
        return FormasPagamento_Repositorie::store($request->all());
    }

    public function show(){
        return FormasPagamento_Repositorie::show(FormasPagamento_Repositorie::url);
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>FormasPagamento_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = FormasPagamento_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}
