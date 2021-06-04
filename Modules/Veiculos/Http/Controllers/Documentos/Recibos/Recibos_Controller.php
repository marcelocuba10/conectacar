<?php
namespace Modules\Veiculos\Http\Controllers\Documentos\Recibos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Documentos\Recibos\Recibos_Repositorie;

class Recibos_Controller extends Controller{

	public function index(){
        
        echo "<a href='/veiculos/painel/documentos/recibos/22fe5b49677707a7aea50b9157cfd9ede3efb14ebaea48e694fa4a3c44cbe21c/imprimir' target='_blank'>acessar</a>";
        if( !empty($_SESSION['ultimo_recibo']) ){
            $ultimoID = $_SESSION['ultimo_recibo']['hash'];
            echo "<script>window.open('/veiculos/painel/documentos/recibos/".$ultimoID."/imprimir', '_blank');</script>";
        }
        return view('temas.inspinia.listagem',['dados'=>Recibos_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Recibos_Repositorie::create()]);
    }

    public function store(Request $request){
        return Recibos_Repositorie::store($request->all());
    }

    public function show(){
        return Recibos_Repositorie::index(Recibos_Repositorie::show());
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Recibos_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Recibos_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }

    public function imprimir($id){
        $data = Model('Veiculos','DocumentosGerados')::where('hash',$id)->first();
        $dadosOrigem = json_decode($data['dados_origem'],true);

        if( empty($data) ){
            trataOperacaoIlegal();
        }

        $documento = [
            'nome' => $data['documento'],
            'arquivo' => ( !empty($data) ? 'veiculos::documentos.recibo' : '' ),
            'conteudo' => $data,
        ];
        return geraPDF($documento);
        $conteudo = $documento['conteudo'];
        return view($documento['arquivo'],compact('conteudo'));
    }
}