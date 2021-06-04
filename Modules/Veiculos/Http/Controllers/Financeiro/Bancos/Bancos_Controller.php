<?php
namespace Modules\Veiculos\Http\Controllers\Financeiro\Bancos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Financeiro\Bancos\Bancos_Repositorie;

class Bancos_Controller extends Controller{

    public function index(){
        return view('temas.inspinia.Bancos_veiculos',['dados'=>Bancos_Repositorie::index()]);
    }

    public function create(){
        return view('temas.inspinia.formulario',['dados'=>Bancos_Repositorie::create()]);
    }

    public function store(Request $request){
        return Bancos_Repositorie::store($request->all());
    }

    public function show(){
        return Bancos_Repositorie::index(Bancos_Repositorie::show());
    }

    public function edit($id){
        return view('temas.inspinia.formulario',['dados'=>Bancos_Repositorie::edit($id)]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($id){
        $resultado = Bancos_Repositorie::destroy($id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }

    public function pagar($id){
        return view('temas.inspinia.formulario',['dados'=>Bancos_Repositorie::pagar($id)]);
    }

    public function pagar_grava($id, Request $request){
        return Bancos_Repositorie::pagar_grava($id, $request->all());
    }

    public function recibo($hash){
        $data = Model('Veiculos','VeiculosFinanceiro')::where('hash_pagamento', $hash)->first();
        return view('temas.inspinia.comprovante', compact('data'));
    }
}
