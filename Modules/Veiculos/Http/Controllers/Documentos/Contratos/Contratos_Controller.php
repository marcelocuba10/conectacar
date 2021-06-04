<?php
namespace Modules\Veiculos\Http\Controllers\Documentos\Contratos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Documentos\Contratos\Contratos_Repositorie;

class Contratos_Controller extends Controller{

	public function index(){
        if( !empty($_SESSION['ultimo_recibo']) ){
            $ultimoID = $_SESSION['ultimo_recibo']['id'];
            echo "<script>window.open('/painel/veiculos/documentos/contratos/".$ultimoID."/imprimir', '_blank');</script>";
        }
        return view('temas.inspinia.listagem',['dados'=>Contratos_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Contratos_Repositorie::create()]);
    }

    public function store(Request $request){
        return Contratos_Repositorie::store($request->all());
    }

    public function show(){
        return Contratos_Repositorie::index(Contratos_Repositorie::show());
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Contratos_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Contratos_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }

    public function imprimir($id){
        $data = Model('Veiculos','DocumentosGerados')::find($id);
        $dadosOrigem = json_decode($data['dados_origem'],true);

        if( empty($data) ){
            trataOperacaoIlegal();
        }

        $documento = [
            'nome' => $data['documento'],
            'arquivo' => ( !empty($data) ? 'temas.inspinia.recibo' : '' ),
            'conteudo' => $data,
        ];

        return geraPDF($documento);

        // return view('temas.inspinia.recibo',compact('data'));
    }
}