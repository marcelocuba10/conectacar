<?php
namespace Modules\Veiculos\Http\Controllers\Veiculos\Lucro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Veiculos\Http\Controllers\Veiculos\Lucro\Veiculos_Lucro_Repositorie;

class Veiculos_Lucro_Controller extends Controller{
    public function index($veiculosID){
        return view('temas.inspinia.listagem',['dados'=>Veiculos_Lucro_Repositorie::index($veiculosID)]);
    }

    public function create($veiculosID){
        return view('temas.inspinia.formulario',['dados'=>Veiculos_Lucro_Repositorie::create($veiculosID)]);
    }

    public function store($veiculosID, Request $request){
        return Veiculos_Lucro_Repositorie::store($veiculosID, $request->all());
    }

    public function show($veiculosID){
        return Veiculos_Lucro_Repositorie::index($veiculosID);
    }

    public function edit($veiculosID, $id){
        return view('temas.inspinia.formulario',['dados'=>Veiculos_Lucro_Repositorie::edit($veiculosID, $id)]);
    }

    public function update($veiculosID, Request $request, $id){
        $data = $request->all();
        return $data;
    }

    public function destroy($veiculosID, $id){
        $resultado = Veiculos_Lucro_Repositorie::destroy($veiculosID, $id);
        if( $resultado === 1 ){
            return response()->json(['status' => 1]);
        }
    }
}