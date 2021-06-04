<?php
namespace Modules\Veiculos\Http\Controllers\Financeiro\NotaPromissoria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Financeiro\NotaPromissoria\NotaPromissoria_Repositorie;

class NotaPromissoria_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>NotaPromissoria_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>NotaPromissoria_Repositorie::create()]);
    }

    public function store(Request $request){
        return NotaPromissoria_Repositorie::store($request->all());
    }

    public function show(){
        return NotaPromissoria_Repositorie::index(NotaPromissoria_Repositorie::show());
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>NotaPromissoria_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = NotaPromissoria_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }

    public function pagar($id){
        return view('temas.inspinia.formulario',['dados'=>NotaPromissoria_Repositorie::pagar($id)]);
    }

    public function pagar_grava($id, Request $request){
        return NotaPromissoria_Repositorie::pagar_grava($id, $request->all());
    }

    public function recibo($hash){
        $data = Model('Veiculos','VeiculosFinanceiro')::where('hash_pagamento', $hash)->first();
        return view('temas.inspinia.comprovante', compact('data'));
    }

    public function imprimir($codigotransacao){
        $conteudo['data'] = Model('Veiculos','Financeiro')::where('codigo_transacao', $codigotransacao)->where('data_pagamento', Null)->with('credor')->get();
        $conteudo['total_de_parcelas'] = $conteudo['data']->count();
        $conteudo['siteID'] = Model('Gerenciamento','UsersSemRelacionamentos')::with('quaisDados')->find(site_id()['id']);

        $documento = [
            'nome' => $codigotransacao,
            'arquivo' => 'veiculos::documentos.nota_promissoria',
            'conteudo' => $conteudo,
            'pagina' => 'landscape',
        ];

        $conteudo = $documento['conteudo'];

        return geraPDF($documento);
        return view($documento['arquivo'],compact('conteudo'));
    }
}
