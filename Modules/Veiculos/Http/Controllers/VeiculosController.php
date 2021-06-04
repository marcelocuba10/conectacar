<?php
namespace Modules\Veiculos\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Veiculos\Http\Controllers\VeiculosRespositorie;

class VeiculosController extends Controller{
    public function index(){
        $data = VeiculosRespositorie::index();
        return view('temas.inspinia.dashboard.dashboard',compact('data'));
    }

    public function show(){
        return VeiculosRespositorie::show();
    }

    public function create(){
        return view('veiculos::create');
    }

    public function store(Request $request){
        //
    }

    public function edit($id){
        return view('veiculos::edit');
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}