<?php
namespace Modules\Veiculos\Http\Controllers\Financeiro\Caixa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Financeiro\Caixa\Caixa_Repositorie;

class Caixa_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.caixa_veiculos',['dados'=>Caixa_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Caixa_Repositorie::create()]);
    }

    public function store(Request $request){
        return Caixa_Repositorie::store($request->all());
    }

    public function show(){
        return Caixa_Repositorie::index(Caixa_Repositorie::show());
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Caixa_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Caixa_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }

    public function pagar($id){
        return view('temas.inspinia.formulario',['dados'=>Caixa_Repositorie::pagar($id)]);
    }

    public function pagar_grava($id, Request $request){
        return Caixa_Repositorie::pagar_grava($id, $request->all());
    }

    public function recibo($hash){
        $data = Model('Veiculos','VeiculosFinanceiro')::where('hash_pagamento', $hash)->first();
        return view('temas.inspinia.comprovante', compact('data'));
    }
}
