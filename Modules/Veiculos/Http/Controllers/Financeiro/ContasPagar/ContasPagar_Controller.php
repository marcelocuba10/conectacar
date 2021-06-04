<?php
namespace Modules\Veiculos\Http\Controllers\Financeiro\ContasPagar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Financeiro\ContasPagar\ContasPagar_Repositorie;

class ContasPagar_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.listagem',['dados'=>ContasPagar_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>ContasPagar_Repositorie::create()]);
    }

    public function store(Request $request){
        return ContasPagar_Repositorie::store($request->all());
    }

    public function show(){
        return ContasPagar_Repositorie::index(ContasPagar_Repositorie::show());
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>ContasPagar_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = ContasPagar_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }

    public function pagar($id){
        return view('temas.inspinia.formulario',['dados'=>ContasPagar_Repositorie::pagar($id)]);
    }

    public function pagar_grava($id, Request $request){
        return ContasPagar_Repositorie::pagar_grava($id, $request->all());
    }

    public function recibo($hash){
        $data = Model('Veiculos','Financeiro')::with('credor')->where('hash_pagamento', $hash)->first();
        $data['tipo'] = trataTraducoes('Comprovante de quitação');
        $documento = [
            'nome' => $data['documento'],
            'arquivo' => 'temas.inspinia.comprovante',
            'conteudo' => $data,
        ];
        return geraPDF($documento);
        $conteudo = $documento['conteudo'];
        return view($documento['arquivo'],compact('conteudo'));
    }
}
